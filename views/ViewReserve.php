<?php

// view when you reserve a film
// this view appears when you click 'Reserve' in index.php

session_start();
require_once('controllers/Home.php');
require_once('controllers/Reserve.php');
require_once('controllers/Login.php');

// improve later 
$images[0]="https://cfm.yidio.com/images/tv/28827/poster-193x290.jpg";
$images[1]="https://images.launchbox-app.com/179fe15e-a54a-4aa9-8860-8c21ef2170af.jpg";
$i = rand(0, 1);

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

<div class="container d-flex mt-5">
    <div class="col-2"></div>
    <div class="col-8">
        <div class="row bg-light m-3 p-2" style="border-radius:5px;">
            <div class="col">
                <div class="text-center mt-3">
                    <?php
                        echo '<img src="' .$images[$i]. '" alt="image">';
                    ?>
                </div>
            </div>
            <div class="col">
                <div class="text-center">
                    <h3 class="text-uppercase mt-3"
                        style="color:rgb(11, 128, 27);font-family:'Open Sans Condensed',sans-serif;"><span>
                        </span><?php echo $film['title']; ?></h3>
                </div>
                <div class="mt-3">
                    <h3>Storyline</h3>
                    <p><?php echo $film['description']; ?></p>
                </div>
                <form method="POST" id="send">
                    <div class="mb-3">
                        <?php Reserve::staff($row['store_id']); ?>
                    </div>
                    <div class="mb-3">
                        <?php Reserve::customer($row['store_id']); ?>
                    </div>
                    <div class="mb-3">
                        <?php Reserve::inventory($row['store_id'], $film['film_id']); ?>
                    </div>
                    <div class="col-12 mb-3 d-flex">
                        <label for="rental_date">Date of rental
                            <input type="date" id="rental_date" name="rental_date" class="form-control" required>
                        </label>
                        <label for="return_date">Date of return
                            <input type="date" id="return_date" name="return_date" class="form-control" required>
                        </label>
                        <!-- not necessary, only concerned information film -->
                        <input type="hidden" name="last_update" value="1900-11-14">
                    </div>
                    <div class="col-12 mb-3 text-center">
                        <button type="submit" class="btn btn-success mt-2" name="submit" id="submit">Submit
                        </button>
                    </div>
                </form>
                <?php 
                    if(isset($_POST['submit'])) {
                        Reserve::insertDataIntoDB();
                        echo 'Your action succed';
                    }
                ?>
            </div>
        </div>
    </div>
</div>
<div class="col-2"></div>
