<?php 

// View to return staff of this store in a select option in ViewReserve

require_once('controllers/Reserve.php');

?>

<label for="staff_id" style="color:green;" class="mb-2">Select staff :</label>
<select name="staff_id" class="form-select" aria-label="Default select example" required>
    <option selected>...</option>
    <?php foreach ($staffs as $staff) : ?>
    <option value="<?php echo $staff->getId(); ?>">
        <?php echo $staff->getId().' - '.$staff->getFirstName().' '.$staff->getLastName(); ?>
    </option>
    <?php endforeach; ?>
</select>