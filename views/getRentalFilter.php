<?php

// return result of filter for rental film in ViewRentalFilter

require_once('controllers/RentalFilter.php');
require_once('./views/parts/header.php');

if($values != null) { ?>
    
    <?php foreach ($values as $row) 
        { ?>
            <tr>
                <td><?php echo $row['rental_date']; ?></td>
                <td><?php echo $row['return_date']; ?></td>
                <td><?php echo $row['first_name'].' '.$row['last_name']; ?></td>
                <td><?php echo $row['title']; ?></td>
                <td><?php echo $row['description']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['rental_rate']; ?></td>
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
    <td><?php echo $errorMessage; ?></td>
    </tr>
    <?php
} 
?>