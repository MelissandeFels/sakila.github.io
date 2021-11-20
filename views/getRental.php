<?php

// get rental films of this customer

require_once('controllers/Checkout.php');
require_once('./views/parts/header.php');

if($rentals != null) { ?>
    
    <?php foreach ($rentals as $row) 
        { ?>
            <tr>
                <td><?php echo $row->getRentalId(); ?></td>
                <td><?php echo $row->getRentalDate(); ?></td>
                <td><?php echo $row->getCustomerFirstName().' '.$row->getCustomerLastName(); ?></td>
                <td><?php echo $row->getTitleFilm(); ?></td>
                <td><?php echo $row->getDescriptionFilm(); ?></td>
                <td><?php echo $row->getRentalRateFilm(); ?></td>
                <td>
                    <a type="button" href="delete?id=<?php echo $row->getRentalId(); ?>" class="btn btn-danger">Delete</a>
                </td>
            </tr>
     <?php   
     }

} else {
    $errorMessage = 'This section is empty';
    ?>
    <tr>
    <td><?php echo $errorMessage; ?></td>
    <td><?php echo $errorMessage; ?></td>
    <td><?php echo $errorMessage; ?></td>
    <td><?php echo $errorMessage; ?></td>
    <td><?php echo $errorMessage; ?></td>
    <td><?php echo $errorMessage; ?></td>
    <td><?php echo 'No action' ?></td>
    </tr>
    <?php
} 
?>





