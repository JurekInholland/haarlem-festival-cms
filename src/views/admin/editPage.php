<!-- View to edit static info pages -->

<style>
    form {
        display: flex;
        flex-flow: column;
    }
    input {
        margin-bottom: 1rem;
    }
</style>

<?php require "partials/sidebar.php"; ?>
    
    <div id="content">

        <?php require "partials/sidebar-toggle.php"; ?>
        

        <h1>Edit static page</h1>

        <form action="" class="form">
            <label for="slug">Slug</label>
            <input type="text" name="slug" value="<?= $page["slug"]; ?>">


            <label for="headline">Headline</label>
            <input type="text" name="headline">

            <label for="content">content</label>
            <input type="text" name="content">


            <input type="submit">
        </form>

    </div>
</div>
