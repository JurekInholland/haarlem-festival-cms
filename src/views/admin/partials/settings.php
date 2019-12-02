<style>
select {
    width: 200px;
}

input[type=submit] {
    width: 200px;
}

input[type=button] {
    width: 70px;
}

.color {
    width: 70px;
}

h3 {
    margin-bottom: .5rem;
}

</style>

<h3>Locations</h3>
<form action="/admin">
    <?php foreach ($locations as $key => $location):?>
        <label for="<?= $key; ?>">#<?= $key+1; ?></label>
        <input name="<?= $key; ?>" type="text" value="<?= $location; ?>">
        <input type="button" value="Delete">
        <!-- <select multiple name="cat">
            <?php foreach ($categories as $key => $category):?>
                <option value="<?= $category["category"]; ?>"><?= $category["category"]; ?></option>
            <?php endforeach; ?>
        </select> -->
        <br>
    <?php endforeach; ?>
    <label for="new_category">#<?= $key+3; ?></label>
    <input name="new_category" type="text" value="">
    <input type="button" value="Add">


<hr>
<h3>Categories</h3>
    <?php foreach ($categories as $key => $category):?>

        <input name="<?= $key; ?>" type="text" value="<?= $category["category"]; ?>">
        
        <label for="color">#</label>
        <input name="color" class="color" style="background-color: #<?= $category["color"]; ?>" name="<?= $key; ?>" type="text" value="<?= $category["color"]; ?>">
        <input type="button" value="Delete">
        <br>
    <?php endforeach; ?>

    <input name="new_category" type="text" value="">
    <label for="color">#</label>
    <input name="color" class="color" name="new_color" type="text" value="">
    <input type="button" value="Add">
<hr>
<h3>Festival Dates</h3>

<label for="start_date">First day: </label>
<input name="start_date" type="date">

<label for="end_date">Last day: </label>
<input name="end_date" type="date">
<hr>
<input type="submit" name="confirm">
</form>
<!-- <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
Collapse
</a>
<section class="collapse" id="collapseExample">
<p>collapse text.....</p>
</section> -->