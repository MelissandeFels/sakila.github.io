<?php
require_once('controllers/Controller.php');

class RentalFilter extends Controller {

    public static function rentalFilterByDate($storeId) {

        $values = null;

        $rental_start = $_POST['rental_start'];
        $rental_end = $_POST['rental_end'];

        $req = "SELECT DISTINCT rental.rental_date, rental.return_date, film.title, film.description, film.rental_rate, category.name, customer.first_name, customer.last_name, store.store_id FROM rental
        JOIN customer ON customer.customer_id = rental.customer_id
        JOIN staff ON staff.staff_id = rental.staff_id
        JOIN inventory ON inventory.inventory_id = rental.inventory_id
        JOIN store ON inventory.store_id = store.store_id
        JOIN film ON film.film_id = inventory.film_id
        JOIN film_category ON film_category.film_id = inventory.film_id
        JOIN category ON film_category.category_id = category.category_id
        WHERE store.store_id = '$storeId'
        AND rental_date >= '$rental_start'
        AND rental_date <= '$rental_end'
        ORDER BY rental_id";
        $stmt = self::connect()->prepare($req);
        $stmt->execute();
        $values = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $values;
    }

}