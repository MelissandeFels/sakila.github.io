<?php

// entry point, index.php (or home)

require_once('controllers/Login.php');

session_start();

include './views/parts/header.php';
?>
<nav class="navbar navbar-expand-lg navbar-light bg-dark fixed-top">
    <div class="container-fluid">
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <?php
      if(!isset($_SESSION['user_session']) && $_SESSION['auth'] == false): ?>
            <a href="#" style="text-decoration:none;color:white;"><button
                    class="btn btn-primary" type="button">Sign up</button></a>
            <?php else: ?>                  
                <h3 style="color:white">Hello <?php echo $_SESSION['user_session']; ?></h3>
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
            <?php endif ?>
            <a href="logout" style="text-decoration:none;color:white;"><button
                    class="btn btn-primary" type="button">Log out</button></a>
            <a href="checkout" style="text-decoration:none;color:white;"><button
                    class="btn btn-outline-warning" type="button">Rental of customer</button></a>
            <a href="filter" style="text-decoration:none;color:white;"><button
                    class="btn btn-outline-secondary" type="button">Search a rental</button></a>
            <a href="customers" style="text-decoration:none;color:white;"><button
                    class="btn btn-outline-danger" type="button">Customers information</button></a>
        </div>
    </div>
</nav>

<h1 class="text-center title">Welcome to <span>Sakila</span>
</h1>

<div class="col-md-3"></div>
<div class="container-fluid pt-3 h-mini-60">
    <div class="row">
        <div class="col-sm-12 col-lg-4 p-5 rounded-start" style="color:#fffffc;font-family:tahoma;">
            <h5 class="mb-2" style="font-family: 'Raleway', sans-serif;">Search your film</h5>
            <p style="font-family: 'Open Sans Condensed', sans-serif;font-size:15px;">Make your research by taping a keyword or category name</br>
                <form method="POST" action="index.php">
                    <!--Search input action -->
                    <div class="form-inline">
                        <input type="text" class="form-control" name="keyword"
                            value="<?php echo isset($_POST['keyword']) ? $_POST['keyword'] : '' ?>"
                            placeholder="Ex : horror, love, bird.." required="" />
                        <input class="btn mt-3 search" value="Search" type="submit" name="search">
                    </div>
                </form>
        </div>
        <div class="col-8">
            <h2 class="text-end mb-5" style="color:white;font-family:'Open Sans Condensed',sans-serif;">
                DVD / Blu-Ray
            </h2>

            <?php
    if(isset($_POST['search']))
{ ?>
        <?php
            Home::searchfilm($row['store_id']);
        ?>
        <?php
}  else { ?>
        <?php
            Home::films($row['store_id']);
        ?> 
        <?php
} ?>
        </div>
    </div>
</div>