<?php

// checkout rental films of customer

session_start();
require_once('controllers/Checkout.php');
require_once('controllers/Login.php');

include './views/parts/header.php';
?>
<nav class="navbar navbar-expand-lg navbar-light bg-dark fixed-top">
    <div class="container-fluid">
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <?php
                    $auth_user = new Login();
                    $staff_email = $_SESSION['user_session'];
                    $sql = "SELECT staff.*, store.store_id, store.manager_staff_id FROM sakila.staff 
                    JOIN sakila.store ON store.store_id=staff.store_id
                    AND store.manager_staff_id=staff.store_id WHERE email='$staff_email'";
                    $stmt = $auth_user->runQuery($sql);  
                    $row=$stmt->fetch(PDO::FETCH_ASSOC);
                ?>
            <h6 style="color:white">You're in the store <?php echo $row['store_id']; ?></h6>
            <a href="logout" style="text-decoration:none;color:white;"><button class="btn btn-primary" type="button">Log
                    out</button></a>
            <button type="button" class="btn btn-warning" onclick="window.location.href='index.php'">
                Back home
            </button>
        </div>
    </div>
</nav>
?>

<div class="container-fluid mt-5" style="color:white;">
    <h2>Checkout</h2>
    <p>Choices of customer for rental films this day:</p>
    <table class="table table-success table-striped text-center">
        <thead>
            <tr>
                <th id="scope">ID</th>
                <th id="scope">Date of rental</th>
                <th id="scope">Customer</th>
                <th id="scope">Title</th>
                <th id="scope">Description</th>
                <th id="scope">Rental rate</th>
                <th id="scope">Action</th>
            </tr>
        </thead>
        <tbody id="data_table">
            <?php Checkout::rental($row['store_id']);?>
    </table>
    <div style="color:white;" class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
        <label>Amount of film rentals: </label>
        <input style="text-align:end;" value="<?php Checkout::sumOfRentalRate($row['store_id']); ?>" readonly="true"> $
    </div>
</div>