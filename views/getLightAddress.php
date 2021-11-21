<?php

// get light data of address in this store for ViewCustomersInfo (form add)

require_once('./views/parts/header.php');

?>

<label for="address_id" class="mb-2">Select your address</label>
<select name="address_id" class="form-select" aria-label="Default select example" required>
    <option selected>...</option>
    <?php foreach ($addresses as $address) : ?>
    <option value="<?php echo $address->getId(); ?>">
        <?php echo $address->getAddress().' - '.$address->getCity().' - '.$address->getCountry(); ?>
    </option>
    <?php endforeach; ?>
</select>