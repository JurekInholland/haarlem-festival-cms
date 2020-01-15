<style>

input {
    margin-bottom: 1rem;
}
</style>


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


    <input type="submit" name="cancel" value="Cancel" class="btn btn-secondary">
    <input type="submit" name="submit" value="Save" class="btn btn-primary">

    </div>
</form>