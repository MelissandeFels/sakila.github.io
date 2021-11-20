<?php

// create routes

require_once('classes/Route.php');
require_once('controllers/Home.php');
require_once('controllers/Index.php');
require_once('controllers/Reserve.php');
require_once('controllers/Checkout.php');
require_once('controllers/RentalFilter.php');
require_once('controllers/CustomerInfo.php');
require_once('controllers/Login.php');
require_once('controllers/Logout.php');

Route::set('index.php', function() {
    Index::CreateView('ViewIndex');
});
Route::set('authentification', function() {
    Login::auth();
});
Route::set('home', function() {
    Index::CreateView('ViewIndex');
});
Route::set('single', function() {
    Home::onefilm($_GET['id']);
});
Route::set('reserve', function() {
    Home::add($_GET['id']);
});
Route::set('checkout', function() {
    Checkout::CreateView('ViewCheckout');
});
Route::set('delete', function() {
    if (isset($_GET['id'])) {
        $delete = Checkout::deleteRowIntoDB($_GET['id']);

        if($delete) {
            header('location:checkout');
        } else {
            echo '<script> alert("Data not deleted !"); </script>';
            header('location:checkout');
        }
    }
});
Route::set('filter', function() {
    RentalFilter::CreateView('ViewRentalFilter');
});
Route::set('customers', function() {
    CustomerInfo::CreateView('ViewCustomerInfo');
});
Route::set('logout', function() {
    Logout::CreateView('ViewLogout');
});
 