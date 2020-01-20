<style>
.category_form {
    position: absolute;
    right: 20px;
}
</style>
<?php
$festival = App::get("festival");
$categories = $festival->getCategories();

$festival_days = $festival->festivalDays();


// Selected event category depends on passed event unless user changes it
if (isset($_POST["category"])) {
    $id = $_POST["category"];
} else {
    $id = $event->getCategoryId();
}

foreach ($categories as $category) {

}

?>
<form action="/admin/newedit" method="POST" class="category_form">
<select name="category" onchange="this.form.submit()" value="<?= $id; ?>">
    <?php foreach ($categories as $key => $type) : 
    ?>
        <?php if($key == $id) {$selected = "selected";} else {$selected = "";} ?>

        <option <?= $selected; ?> value="<?= $key; ?>"><?= $type->getName() ?></option>
        
    <?php endforeach; ?>
</select>
</form>
<?php
        if (isset($_POST["category"])) {

        }

        if (is_file("../src/views/admin/eventForms/{$categories[$id]->getSlug()}.php")) {
            include "../src/views/admin/eventForms/{$categories[$id]->getSlug()}.php";
        } else {
            echo "No form for event type found.";
        }
?>