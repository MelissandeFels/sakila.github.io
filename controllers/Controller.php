<?php
require_once('./classes/Database.php');

/**
 * General controller class extends a connection to db.
 */
class Controller extends Database {

    /**
     * Create views.
     */
    public static function CreateView($viewName) {
        require_once('./views/' .$viewName. '.php');
    }

    /**
     * Authentification form of staff.
     */
    public static function auth() {
        session_start();
        require_once('./views/parts/header.php');

        if(!isset($_SESSION['user_session'])){
            
            echo '<form method="post" id="login-form" action="" class="form_login d-grid gap-2">
                <h2 class="text-center">Sakila</h2>
                <div class="col-auto">
                    <label for="email" class="visually-hidden">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Email" required>
                </div>
                <div class="col-auto">
                    <label for="password" class="visually-hidden">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                </div>
                <div class="col-auto d-grid gap-2">
                    <input type="submit" name="submit" class="btn btn-primary" value="Confirm identity">
                </div>
            </form>';

            if(isset($_POST['submit'])) {

                if($_POST['email'] == "" || $_POST['password'] == "") {
                    echo "<h5>Input text fields cannot be empty !</h5>";
                } else {

                    $email = $_POST['email'];
                    $password = $_POST['password'];

                    $_SESSION['auth']=true;
                    $_SESSION['user_session']= $email; 

                    $user = new Login();
                    $user->staffLogin($email,$password);
                    header("Location:index.php"); 
                }
            }
        }
    }

    /**
     * Films from db in store.
     */
    public static function films($storeId) {
        $films = Home::filmsFromDB($storeId);
        require './views/ViewHome.php';
    }

    /**
     * One film by id.
     */
    public static function onefilm($id){
        $film = Home::filmById($id);
        require './views/ViewSingle.php';
    }

    /**
     * Search films in store.
     */
    public static function searchfilm($storeId) {
        $films = Home::search($storeId);
        require './views/search.php';
    }

    /**
     * Add rental film into db.
     */
    public static function add($id) {
        $film = Home::filmById($id);
        require './views/ViewReserve.php';
    }

    /**
     * Get light staff in a select option.
     */
    public static function staff($store_id) {
        $staffs = Reserve::staffFromDB($store_id);
        require './views/getStaff.php';
    }

    /**
     * Get light customer in a select option.
     */
    public static function customer($store_id) {
        $customers = Reserve::customerFromDB($store_id);
        require './views/getCustomers.php';
    }

    /**
     * Get inventory id in a select option.
     */
    public static function inventory($store_id, $film_id) {
        $inventories = Reserve::inventoryFromDB($store_id, $film_id);
        require './views/getInventory.php';
    }

    /**
     * Get rental from db.
     */
    public static function rental($id) {
        $rentals = Checkout::rentalFromDB($id);
        require './views/getRental.php';
    }

    /**
     * Get rental by date (from..to..) filter in store.
     */
    public static function filter($store_id) {
        $values = RentalFilter::rentalFilterByDate($store_id);
        require './views/getRentalFilter.php';
    }

    /**
     * Get customers info from db.
     */
    public static function customersInfo($store_id) {
        $results = CustomerInfo::customersFromDB($store_id);
        require './views/getCustomersInfo.php';
    }

    /**
     * Get addres from db (in progress).
     */
    public static function address() {
        $addresses = CustomerInfo::addressFromDB();
        require './views/getLightAddress.php';
    }

}