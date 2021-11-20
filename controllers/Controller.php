<?php
require_once('./classes/Database.php');

class Controller extends Database {

    public static function CreateView($viewName) {
        require_once('./views/' .$viewName. '.php');
    }

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

    public static function films($storeId) {
        $films = Home::filmsFromDB($storeId);
        require './views/ViewHome.php';
    }

    public static function onefilm($id){
        $film = Home::filmById($id);
        require './views/ViewSingle.php';
    }

    public static function searchfilm($storeId) {
        $films = Home::search($storeId);
        require './views/search.php';
    }

    public static function add($id) {
        $film = Home::filmById($id);
        require './views/ViewReserve.php';
    }

    public static function staff($store_id) {
        $staffs = Reserve::staffFromDB($store_id);
        require './views/getStaff.php';
    }

    public static function customer($store_id) {
        $customers = Reserve::customerFromDB($store_id);
        require './views/getCustomers.php';
    }

    public static function inventory($store_id, $film_id) {
        $inventories = Reserve::inventoryFromDB($store_id, $film_id);
        require './views/getInventory.php';
    }

    public static function rental($id) {
        $rentals = Checkout::rentalFromDB($id);
        require './views/getRental.php';
    }

    public static function filter($store_id) {
        $values = RentalFilter::rentalFilterByDate($store_id);
        require './views/getRentalFilter.php';
    }

    public static function customersInfo($store_id) {
        $results = CustomerInfo::customersFromDB($store_id);
        require './views/getCustomersInfo.php';
    }

    public static function address() {
        $addresses = CustomerInfo::addressFromDB();
        require './views/getLightAddress.php';
    }

}