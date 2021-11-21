<?php

// see customers info and update (in progress)

session_start();
require_once('controllers/CustomerInfo.php');
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

<div class="container-fluid mt-5">
    <div style="color:white;">
        <h2>Customers information</h2>
        <p>Click to add, show, delete or update information of a customer: </p>
    </div>

    <!-- Button add customer -->
    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        +
    </button>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">New customer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <input type="hidden" value="<?php echo $row['store_id']?>">
                        <div class="row">
                            <div class="col d-flex d-grip gap-2">
                                <div class="mb-3">
                                    <label for="first_name" class="form-label">First name</label>
                                    <input type="text" class="form-control" id="first_name" name="first_name" required>
                                </div>
                                <div class="mb-3">
                                    <label for="last_name" class="form-label">Last name</label>
                                    <input type="text" class="form-control" id="last_name" name="last_name" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3">
                                <?php CustomerInfo::address(); ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col d-flex d-grip gap-2">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" name="email" required>
                                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.
                                    </div>
                                </div>
                                <!-- <div class="mb-3">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="text" class="form-control" id="phone" name="phone" required>
                                </div> -->
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="active">Active</label>
                                <select name="active" class="form-select" aria-label="Default select example"
                                    required>
                                    <option value="1" selected>1</option>
                                    <option value="0" selected>0</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                        </div>
                    </form>
                    <?php 
                    // if(isset($_POST['submit'])) {
                    //     Reserve::insertCustomerInfoIntoDB();
                    //     echo 'Your action succed';
                    // }
                ?>
                </div>
            </div>
        </div>
    </div>

    <table class="table table-success table-striped text-center">
        <thead>
            <tr>
                <th id="scope">Customer</th>
                <th id="scope">Email</th>
                <th id="scope">Address</th>
                <th id="scope">Phone</th>
                <th id="scope">Action</th>
            </tr>
        </thead>
        <tbody id="data_table">
            <?php CustomerInfo::customersInfo($row['store_id']);?>
    </table>
</div>
<script>


</script>