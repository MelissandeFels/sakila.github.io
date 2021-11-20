<?php

// checkout rental films of customer

session_start();
require_once('controllers/RentalFilter.php');
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
    <p>Looking for a rental film :</p>
    <form method="POST" action="filter">
        <!--Search input action -->
        <div class="form-inline d-grid gap-2">
            <label for="rental_start">From: </label>
            <input type="date" class="form-control" name="rental_start"
                value="<?php echo isset($_POST['rental_start']) ? $_POST['rental_start'] : '' ?>" required/>
            <label for="rental_end">To: </label>
            <input type="date" class="form-control" name="rental_end"
                value="<?php echo isset($_POST['rental_end']) ? $_POST['rental_end'] : '' ?>" required/>
        </div>
        <input class="btn mt-3 mb-3 search" value="Search" type="submit" name="submit">
    </form>
    <table class="table table-success table-striped text-center">
        <thead>
            <tr>
                <th id="scope">Date of rental</th>
                <th id="scope">Date of return</th>
                <th id="scope">Customer</th>
                <th id="scope">Title</th>
                <th id="scope">Description</th>
                <th id="scope">Category</th>
                <th id="scope">Rental rate</th>
            </tr>
        </thead>
        <tbody id="data_table">
        <?php
        if(isset($_POST['submit'])) {
            Checkout::filter($row['store_id']);
        } 
        ?>
    </table>
</div>