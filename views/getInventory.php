<?php 

// View to return inventories of this store in a select option in ViewReserve

require_once('controllers/Reserve.php');

?>

<label for="inventory_id" style="color:green;" class="mb-2">Select inventory :</label>
<select name="inventory_id" class="form-select" aria-label="Default select example" required>
    <option selected>...</option>
    <?php foreach ($inventories as $inventory) : ?>
    <option value="<?php echo $inventory->getId(); ?>">
        <?php echo $inventory->getId(); ?>
    </option>
    <?php endforeach; ?>
</select>