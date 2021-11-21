<?php
require_once('controllers/Controller.php');
require_once('classes/Rental.php');

/**
 * Checkout classe extends controller.
 * This class is related with ViewCheckout.
 */
class Checkout extends Controller {

    /**
     * Empty array of rentals.
     */
    public $rentals = [];

    /**
     * Function to get all rentals from db.
     */
    public static function rentalFromDB($storeId) {
        
        // define format date
        $today = date("Y-m-d H:i:s");
        $rentals = null;

        $req = "SELECT DISTINCT rental.rental_id, rental.rental_date, film.title, film.description, film.rental_rate, category.name, customer.first_name, customer.last_name, store.store_id 
        FROM rental JOIN customer ON customer.customer_id = rental.customer_id
        JOIN inventory ON inventory.inventory_id = rental.inventory_id
        JOIN store ON inventory.store_id = store.store_id
        JOIN film ON film.film_id = inventory.film_id
        JOIN film_category ON film_category.film_id = inventory.film_id
        JOIN category ON film_category.category_id = category.category_id
        WHERE store.store_id = '$storeId'
        AND rental.rental_date >= '$today' 
        ORDER BY rental_id desc;";
        $stmt = self::connect()->prepare($req);
        $stmt->execute();
        $values = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        foreach ($values as $key) {
            $rentals[] = new Rental($key['rental_id'],$key['rental_date'], $key['first_name'], $key['last_name'], $key['title'], $key['description'], $key['rental_rate']);
        }
        return $rentals;
    }

    /**
     * Function to calculate rental rate of all rentals.
     */
    public static function sumOfRentalRate($storeId) {

        // define format date
        $today = date("Y-m-d H:i:s");
        $sum = null;

        $req = "SELECT DISTINCT SUM(rental_rate) AS sum FROM rental
        JOIN customer ON customer.customer_id = rental.customer_id
        JOIN staff ON staff.staff_id = rental.staff_id
        JOIN inventory ON inventory.inventory_id = rental.inventory_id
        JOIN store ON inventory.store_id = store.store_id
        JOIN film ON film.film_id = inventory.film_id
        JOIN film_category ON film_category.film_id = inventory.film_id
        JOIN category ON film_category.category_id = category.category_id
        WHERE store.store_id = '$storeId'
        AND rental_date >= '$today'
        ORDER BY rental_id desc";
        $stmt = self::connect()->prepare($req);
        $stmt->execute();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC))
        {
          $sum = $row['sum'];
        }
        echo $sum;
    }

    /**
     * Function to delete a row.
     */
    public static function deleteRowIntoDB($rental_id) {
        $stmt = self::connect()->prepare("DELETE FROM sakila.rental where rental_id = '$rental_id'");
        $stmt->execute();
    }

}