<?php 

// View to return customers of this store

require_once('controllers/Reserve.php');

?>

<label for="customer_id" style="color:green;" class="mb-2">Select customer :</label>
<select name="customer_id" class="form-select" aria-label="Default select example" required>
    <option selected>...</option>
    <?php foreach ($customers as $customer) : ?>
    <option value="<?php echo $customer->getId(); ?>">
        <?php echo $customer->getId().' - '.$customer->getFirstName().' '.$customer->getLastName(); ?>
    </option>
    <?php endforeach; ?>
</select>