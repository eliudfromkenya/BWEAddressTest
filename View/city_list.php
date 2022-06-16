<?php include('view/header.php') ?>

<?php if($cities) { ?>

<section id="list" class="list">
    <header class="list__row list__header">
        <h1>
            City List
        </h1>
    </header>

    <?php foreach ($cities as $city) : ?>
    <div class="list__row">
        <div class="list__item">
            <p class="bold"><?= $city['city_name'] ?><br><?= $city['country'] ?></p>
        </div>
        <div class="list__removeItem">
            <form action="." method="post">
                <input type="hidden" name="action" value="delete_city">
                <input type="hidden" name="city_id" value="<?= $city['city_id']; ?>">
                <button class="remove-button">❌</button>
            </form>
        </div>
    </div>
    <?php endforeach; ?>
</section>
<?php } else { ?>
<p>No categories exist yet.</p>
<?php } ?>

<section id="add" class="add">
<form action="." method="post" id="add__form" >
        <input type="hidden" name="action" value="add_city">
        <div class="row">
            <div class="g-3 col-md-4 form-outline">
                <label class="form-label" for="city_name">City Name </label>
                <input type="text" class="form-control" name="city_name" id="city_name">
            </div>
            <div class="g-3  col-md-4 form-outline">
                <label class="form-label" for="county">County </label>
                <input type="text" class="form-control" name="county" id="county">
            </div>
            <div class="g-3 col-md-4 form-outline">
                <label class="form-label" for="country">Country </label>
                <input type="text" class="form-control" name="country" id="country">
            </div>
        <div class="add__addItem">
            <button class="add-button bold">Add</button>
        </div>
    </form>
</section>

<br>
<p><a href=".">View &amp; Add Addresses</a></p>

<?php include('view/footer.php') ?>