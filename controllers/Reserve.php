<?php
require_once('controllers/Controller.php');
require_once('classes/LightStaff.php');
require_once('classes/LightCustomer.php');
require_once('classes/LightInventory.php');

class Reserve extends Controller {

    public $staffs = [];
    public $customers = [];
    public $inventory = [];

    public static function staffFromDB($storeId) {
        $req = "SELECT staff.staff_id, staff.first_name, staff.last_name, store.store_id, store.manager_staff_id FROM staff
        JOIN store ON store.store_id = staff.store_id
        WHERE staff.store_id = '$storeId'";
        $stmt = self::connect()->prepare($req);
        $stmt->execute();
        $values = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        foreach ($values as $key) {
            $staffs[] = new LightStaff($key['staff_id'], $key['first_name'], $key['last_name']);
        }
        return $staffs;
    }

    public static function customerFromDB($storeId) {
        $req = "SELECT customer.*, store.store_id FROM sakila.customer
        JOIN store ON store.store_id = customer.store_id
        WHERE customer.store_id = '$storeId'";
        $stmt = self::connect()->prepare($req);
        $stmt->execute();
        $values = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        foreach ($values as $key) {
            $customers[] = new LightCustomer($key['customer_id'], $key['first_name'], $key['last_name']);
        }
        return $customers;
    }

    public static function inventoryFromDB($storeId, $filmId) {
        $req = "SELECT DISTINCT inventory.inventory_id, film.film_id, store.store_id FROM inventory
        JOIN film ON film.film_id = inventory.film_id
        JOIN store ON store.store_id = inventory.store_id 
        WHERE film.film_id = '$filmId'
        AND store.store_id = '$storeId'";
        $stmt = self::connect()->prepare($req);
        $stmt->execute();
        $values = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        foreach ($values as $key) {
            $inventory[] = new LightInventory($key['inventory_id']);
        }
        return $inventory;
    }

    public static function insertDataIntoDB() {
           
        $rental_date=$_POST['rental_date'];
        $inventory_id=$_POST['inventory_id'];
        $customer_id=$_POST['customer_id'];
        $return_date=$_POST['return_date'];
        $staff_id=$_POST['staff_id'];
        
        $stmt = self::connect()->prepare(
            "INSERT INTO sakila.rental (rental_date,inventory_id,customer_id,return_date,staff_id)
            VALUES ('$rental_date', '$inventory_id', '$customer_id', '$return_date', '$staff_id')");
        $stmt->execute();
    }
    
}