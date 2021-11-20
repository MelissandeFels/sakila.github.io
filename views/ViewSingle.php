<?php 

// view for one film
// this view appears when you click 'See' button in index.php

require_once('./views/parts/header.php'); 
require_once('controllers/Home.php');

// improve later 
$images[0]="https://cfm.yidio.com/images/tv/28827/poster-193x290.jpg";
$images[1]="https://images.launchbox-app.com/179fe15e-a54a-4aa9-8860-8c21ef2170af.jpg";
$i = rand(0, 1);

?>

<div class="container w-50 d-flex mt-3">
    <div class="col-2"></div>
    <div class="col-8">
        <div class="row bg-light m-3 p-2" style="border-radius:5px;">
            <div class="col-12">
                <div class="row">
                    <div class="text-center">
                        <h3 class="text-uppercase mt-3" style="color:rgb(11, 128, 27);font-family:'Open Sans Condensed',sans-serif;"><span>
                            </span><?php echo $film['title']; ?></h3>
                    </div>
                </div>
                <div class="text-center mt-3">
                    <?php
                        echo '<img src="' .$images[$i]. '" alt="image">';
                    ?>
                </div>
            </div>
            <div class="col-12 mt-3">
                <h3>Storyline</h3>
                <p><?php echo $film['description']; ?></p>
            </div>
            <div class="col-12 text-end">
                <!-- <h6 class="mb-0">Actors</h6> -->
                <?php
                // $firstname = $film['first_name'];
                // $lastname = $film['last_name'];
                // $first = array($firstname);
                // $second = array($lastname);
                // $i = 0;
                // if($first[0] == 0) {
                //     if($second[0] == 0) {
                //         echo $second[0];
                //     } else {
                //         echo $second[$i++];
                //     }
                //     echo $first[0];
                // } else {
                //     echo $first[$i++];
                // }
                ?>
            </div>
            <div class="col-12 mb-3">
                    <button type="button" class="btn btn-warning mt-2" onclick="window.location.href='index.php'">Return
                    </button>
            </div>
        </div>
        </div>
    </div>
    <div class="col-2"></div>
</div>

