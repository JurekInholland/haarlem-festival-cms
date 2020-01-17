<style>

input {
    margin-bottom: 1rem;
}

.half-width {
    display: flex;
    flex-wrap: wrap;
    flex-flow: row;
    flex-basis: 100%;
    justify-content: space-between;
    margin-top: 1rem;

}

.half-width input {
    flex-basis: 48%;
}

</style>


<?php
if (isset($_GET["delete"])) {
    $modaldata = ["title" => "Confirm deletion",
    "content" => "Are you sure you want to delete {$user->getName()}?",
    "action" => "/admin/users/{$user->getName()}",
    "submit" => "Submit"];
    $modal = new Modal($modaldata);
    $modal->show();
}
?>


<h1>Username: <?= $user->getName(); ?></h1>

<form action="/admin/submituser/<?= $user->getId() ?>" class="form" method="POST">
    <div class="form-group">

    <label for="name">Username</label>
    <input class="form-control" class="form-control" type="text" name="name" value="<?= $user->getName(); ?>">

    <label for="email">Email</label>
    <input class="form-control" type="text" name="email" value="<?= $user->getEmail(); ?>">

    <label for="name">Password</label>
    <input class="form-control" type="text" name="name" value="">

    <label for="name">Retype Password</label>
    <input class="form-control" type="text" name="name" value="">

    <label for="name">Role</label>
    <select class="form-control" type="text" name="name" value="<?= $user->getRole(); ?>">
    <?php foreach ($user->getRoleNames() as $key => $role) : ?>

        <?php if($key == $user->getRole()) {$selected = "selected";} else {$selected = "";} ?>

        <option value="<?= $key; ?>" <?= $selected; ?> ><?= $role; ?> </option>

    <?php endforeach; ?>

    </select>

    <section class="half-width">
        <!-- <button type="button" class="btn btn-secondary">Cancel</button> -->
        <input type="button" onclick="window.history.back();" value="Cancel" class="btn btn-secondary">
        <input type="submit" name="submit" value="Save" class="btn btn-primary">
    </section>

    </div>
</form>