<?php 

// view to return all films from DB

require_once('./views/parts/header.php'); 
require_once('controllers/Home.php');

// improve later 
$images[0]="https://cfm.yidio.com/images/tv/28827/poster-193x290.jpg";
$images[1]="https://images.launchbox-app.com/179fe15e-a54a-4aa9-8860-8c21ef2170af.jpg";
$i = rand(0, 1);

?>

<?php
    if($films != null) { ?>
        <div class="row">
            <?php
        foreach ($films as $film) : ?>
            <div class="col-lg-3 d-flex">
                <div class="card border-light mb-3" style="max-width:15rem;">
                    <div class="card-header text-center">
                        <?php
                            echo '<img src="' .$images[$i]. '" alt="image" width="400" height="300" style="width:200px;height:300px;object-fit:cover;">';
                        ?>
                    </div>
                    <div class="card-body text-center">
                        <p class="card-title film-title"><?php echo $film->getTitle(); ?></p>
                        <p class="card-text mb-0">
                            <span class="film-name">
                                <?php echo $film->getCategoryName(); ?>
                            </span>
                        </p>
                        <p class="card-text"><em style="font-size:10px;">price </em>
                            <span class="film-rental"><?php echo $film->getRentalRate(); ?>
                                $
                            </span>
                        </p>
                    </div>
                    <div class="card-footer text-start d-flex d-grid gap-2">
                        <a href="reserve?id=<?php echo $film->getFilmId(); ?>" type="submit" style="text-decoration: none;">
                            <button type="button" class="btn btn-success mt-2">
                                Reserve
                            </button>
                        </a>
                        <a href="single?id=<?php echo $film->getFilmId(); ?>" type="submit" style="text-decoration: none;">
                            <button type="button" class="btn btn-primary mt-2">
                                See
                            </button>
                        </a>
                        <p><em style="font-size:10px;">store <?php echo $film->getStoreId(); ?></em>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
<?php
    } else {
        echo '<div style="color:white">This section is empty</div>';
    }
    