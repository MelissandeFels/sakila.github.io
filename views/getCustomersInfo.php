<?php

// get customers info in this store in ViewCustomersInfo

require_once('controllers/CustomerInfo.php');
require_once('./views/parts/header.php');

if($results != null) { ?>
    
    <?php foreach ($results as $row) 
        { ?>
            <tr>
                <td><?php echo $row->getFirstName().' '.$row->getLastName(); ?></td>
                <td><?php echo $row->getEmail(); ?></td>
                <td><?php echo $row->getAddress().' - PC '.$row->getPostalCode(); ?></td>
                <td><?php echo $row->getPhone(); ?></td>
                <td>
                    <a type="button" href="delete?id=<?php echo $row->getId(); ?>" class="btn btn-danger">X</a>
                    <!-- <a type="button" href="see?id=//echo $row->getId();" class="btn btn-success">¤</a> -->
                    <a type="button" href="update?id=<?php echo $row->getId(); ?>" class="btn btn-info">/..</a>
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
    <td><?php echo 'No action' ?></td>
    </tr>
    <?php
} 
?>