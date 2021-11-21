<?php
require_once('controllers/Controller.php');
require_once('classes/Customer.php');
require_once('classes/LightAddress.php');

/**
 * CustomerInfo class for ViewCustomerInfo in route 'customers'
 * using Customer class and extends controller.
 * 
 */
class CustomerInfo extends Controller {

    /**
     * Empty array results.
     */
    public $results = [];
    /**
     * Empty array addresses.
     */
    public $addresses = [];

    /**
     * Function to get all customers from db in the store.
     */
    public static function customersFromDB($storeId) {

        $results = null;

        $query = "SELECT DISTINCT customer.customer_id, customer.first_name, customer.last_name, customer.email, address.address, 
        address.district, address.postal_code, address.phone, store.store_id FROM customer
        JOIN address ON address.address_id = customer.address_id
        JOIN store ON store.store_id = customer.store_id
        WHERE store.store_id = '$storeId'";
        $stmt = self::connect()->prepare($query);
        $stmt->execute();
        $values = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($values as $key) {
            $results[] = new Customer($key['customer_id'], $key['first_name'], $key['last_name'], $key['email'], $key['address'], $key['postal_code'], $key['phone']);
        }
        return $results;

    }

    /**
     * Function to get all addresses from db (in progress).
     */
    public static function addressFromDB() {

        $addresses = null;

        $query = "SELECT address.address_id,address.address, city.city,country.country
        FROM sakila.address
        JOIN city ON city.city_id = address.city_id
        JOIN country ON country.country_id = city.country_id";
        $stmt = self::connect()->prepare($query);
        $stmt->execute();
        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($res as $key) {
            $addresses[] = new LightAddress($key['address_id'], $key['address'], $key['city'], $key['country']);
        }
        return $addresses;
    }

    /**
     * Function insert customer into db (in progress).
     */
    public static function insertCustomerInfoIntoDB() {

        $today = date("Y-m-d H:i:s");
        
        $store_id=$_POST['store_id'];
        $first_name=$_POST['first_name'];
        $last_name=$_POST['last_name'];
        $email=$_POST['email'];
        $address_id=$_POST['address_id'];
        $active=$_POST['active'];
        
        $stmt1 = self::connect()->prepare(
            "INSERT INTO sakila.customer (store_id,first_name,last_name,email,address_id,active,create_date)
            VALUES ('$store_id', '$first_name', '$last_name', '$email', '$address_id', '$active','$today')");
        // $stmt2 = self::connect()->prepare(
        //     "INSERT INTO sakila.address (address,district,city_id,phone,location)
        //     VALUES ('')");
        $stmt1->execute();
    }
}