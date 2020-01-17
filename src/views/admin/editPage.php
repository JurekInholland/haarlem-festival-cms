<!-- View to edit static info pages -->

<style>
    form {
        display: flex;
        flex-flow: column;
    }
    input {
        margin-bottom: 1rem;
    }

    .form textarea {
        margin-bottom: 1rem;
        min-height: 128px;
    }

    .half-width {
        display: flex;
        flex-wrap: wrap;
        flex-direction: row;
        /* flex-basis: 100%; */
        justify-content: space-between;
    }

    .half-width input {
        /* min-width: 200px; */
        flex: 1 300px;
        margin: .5rem;
    }

</style>

<h1>Edit static page</h1>
<?php
    if (isset($_SESSION["staticpageerror"])) {
        echo "<p class='alert alert-danger'>{$_SESSION['staticpageerror']}</p>";
        unset($_SESSION["staticpageerror"]); 
    }
?>

<form action="/admin/pageSubmit" method="POST" class="form">
    <input type="hidden" name="id" value="<?= $page->getId() ?>">
    <input type="hidden" name="oldslug" value="<?=end(Request::uriComponents())?>">
    <label for="slug">Slug</label>
    <input class="form-control" type="text" name="slug" value="<?= $page->getSlug(); ?>">


    <label for="headline">Headline</label>
    <input class="form-control" type="text" name="headline" value="<?= $page->getHeadline(); ?>">

    <label for="content">content</label>
    <textarea class="form-control" name="content"><?= $page->getContent(); ?></textarea>

    <label for="menu">Menu</label>
    <select name="menu" class="form-control">
        <?php foreach ($page->getMenus() as $key => $menu) :
            $selected = "";
            if ($page->getMenu() == $key) {
                $selected = "selected";
            }
        ?>
            <option <?= $selected; ?> value="<?= $key; ?>"><?= $menu ?></option>


                
        <?php endforeach; ?>
    </select>


    <?php if ($page->getEdited() != "") {
        echo "<label for='edited'>Last edited</label>";
        echo "<input type='text' name='edited' readonly class='form-control-plaintext' value='{$page->getEdited()}'>";
    }
    ?>

    <section class="half-width">
        <input name="delete" type="submit" class="btn btn-danger" value="Delete page">
        <input name="view" type="submit" class="btn btn-info" value="View page">
        <input type="button" onclick="window.history.back();" value="Cancel" class="btn btn-secondary">
        <input name="submit" type="submit" class="btn btn-primary" value="Submit">
    </section>
</form>