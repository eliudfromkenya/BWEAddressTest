<?php include('view/header.php') ?>
<?php $address_id = -1; ?>
<section id="list" class="list">
    <header class="list__row list__header">
        <h1>
            Addresses
        </h1>
        <form action="." method="get" id="list__header_select" class="list__header_select">
            <input type="hidden" name="action" value="list_addresses">
            <select name="city_id" required>
                <option value="0">View All</option>
                <?php foreach ($cities as $city) : ?>
                <?php if ($city_id == $city['city_id']) { ?>
                <option value="<?= $city['city_id'] ?>" selected>
                    <?php } else { ?>
                <option value="<?= $city['city_id'] ?>">
                    <?php } ?>
                    <?= $city['city_name'] ?>
                </option>
                <?php endforeach; ?>
            </select>
            <?php 
                if(isset($_POST['export_to_json'])){
                    echo "cthfhf";
                }else  if(isset($_POST['export_to_xml'])){
                    echo "cthfhf";
                }
            ?>
            <button class="add-button bold">Go</button>
            <button name="export_to_json"  class="add-button bold">JSON</button>
            <button  name="export_to_xml"  class="add-button bold">XML</button>
        </form>
    </header>
    <?php if($addresses) { ?>
    <?php foreach ($addresses as $address) : ?>
    <div class="list__row">
        <div class="list__item">
            <p class="bold"><?= "{$address['name']}" ?></p>
            <p><?= $address['first_name']; ?><br><?= $address['email']; ?><br><?= $address['street']; ?></p>
        </div>
        <div class="list__updateItem">
            <form action="." method="post">
                <input type="hidden" name="action" value="update_address">
                <input type="hidden" name="address_id" value="<?= $address['address_id']; ?>">
                <button class="remove-button">✔</button>
            </form>
        </div>
        <div class="list__removeItem">
            <form action="." method="post">
                <input type="hidden" name="action" value="delete_address">
                <input type="hidden" name="address_id" value="<?= $address['address_id']; ?>">
                <button class="remove-button">❌</button>
            </form>
        </div>       
    </div>
    <?php endforeach; ?>
    <?php } else { ?>
    <br>
    <?php if ($city_id) { ?>
    <p>No addresses exist for this city yet.</p>
    <?php } else { ?>
    <p>No addresses exist yet.</p>
    <?php } ?>
    <br>
    <?php } ?>
</section>

<section id="add" class="add">
    <h2>Add address</h2>
    <form action="." method="post" id="add__form" >   
        <input type="hidden" name="action" value="save_address">
        <input type="hidden" value=" <?php $address_id > 0 ? undefined: $address_id;  ?>"  name="address_id" id="address_id">
        <div class="row">
            <div class="g-3 col-md-4 form-outline">
                <label class="form-label" for="name">Name </label>
                <input type="text" class="form-control" name="name" id="name">
            </div>
            <div class="g-3  col-md-4 form-outline">
                <label class="form-label" for="first_name">First Name </label>
                <input type="text" class="form-control" name="first_name" id="first_name">
            </div>
            <div class="g-3 col-md-4 form-outline">
                <label class="form-label" for="email">Email </label>
                <input type="email" class="form-control" name="email" id="email">
            </div>
            <div class="g-3  col-md-4 form-outline">
                <label class="form-label" for="street">Street </label>
                <input type="text" class="form-control" name="street" id="street">
            </div>
            <div class="g-3 col-md-4 form-outline">
                <label class="form-label" for="zip_code">Zip Code </label>
                <input type="text" class="form-control" name="zip_code" id="zip_code">
            </div>
            <div class="g-3  col-md-4 form-outline">
                <label class="form-label" for="city_id">City </label>
                <select class="form-control" name="city_id" id="city_id" required>
                    <option value="">Please select</option>
                    <?php foreach ($cities as $city) : ?>
                    <option value="<?= $city['city_id']; ?>">
                        <?= $city['city_name']; ?>
                    </option>
                    <?php endforeach; ?>
                </select>
            </div>
         </div>

         <div class="add__addItem">
            <button class="add-button bold">Add</button>
        </div>
    </form>
</section>
<br>
<p><a href=".?action=list_cities">View/Edit Cities</a></p>
<?php include('view/footer.php') ?>