<?php
require_once('controllers/Controller.php');
require_once('classes/Film.php');

/**
 * Home class for ViewIndex and ViewHome 
 * using Film class and extends controller.
 * 
 */
class Home extends Controller {

    /**
     * Array of films.
     */
    public $films = [];

    /**
     * Return films by store id.
     * @param $storeId
     *              the id of store
     */
    public static function filmsFromDB($storeId) {

        $films = null;

        $query = "SELECT DISTINCT film.*, store.store_id, category.name FROM film
        JOIN inventory ON inventory.film_id = film.film_id
        JOIN store ON inventory.store_id = store.store_id
        JOIN film_category ON film_category.film_id = film.film_id
        JOIN category ON film_category.category_id = category.category_id
        WHERE store.store_id = '$storeId'
        ORDER BY film.film_id";
        $stmt = self::connect()->prepare($query);
        $stmt->execute();
        $values = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($values as $key) {
            $films[] = new Film($key['film_id'], $key['title'], $key['release_year'], $key['rental_rate'], $key['name'], $key['store_id']);
        }
        return $films;
    }

    /**
     * Return a film by id.
     * @param $id
     *          id of film
     */
    public static function filmById($id) {
        $query = "SELECT film.*, store.store_id, category.name FROM film
        JOIN inventory ON inventory.film_id = film.film_id
        JOIN store ON inventory.store_id = store.store_id 
        JOIN film_category ON film_category.film_id = film.film_id
        JOIN category ON film_category.category_id = category.category_id
        WHERE film.film_id = ?";
        $stmt = self::connect()->prepare($query);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Search films by keywords film title and category name in the store.
     * @param $storeId
     *              the id of store
     */
    public static function search($storeId) {

        $films = null;

        $keyword = $_POST['keyword'];
        $query = "SELECT DISTINCT film.*, store.store_id, category.name FROM film
        JOIN inventory ON inventory.film_id = film.film_id
        JOIN store ON inventory.store_id = store.store_id 
        JOIN film_category ON film_category.film_id = film.film_id
        JOIN category ON film_category.category_id = category.category_id
        WHERE inventory.store_id = '$storeId'
        AND (title LIKE '%$keyword%' OR category.name LIKE '%$keyword%')";
        $stmt = self::connect()->prepare($query);
        $stmt->execute();
        $values = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($values as $key) {
            $films[] = new Film($key['film_id'], $key['title'], $key['release_year'], $key['rental_rate'], $key['name'], $key['store_id']);
        }
        return $films;
    }

}