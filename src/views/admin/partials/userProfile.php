<style>

input {
    margin-bottom: 1rem;
}
</style>


<h1>Username: <?= $user->getName(); ?></h1>

<form action="" class="form">
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
<input class="form-control" type="text" name="name" value="<?= $user->getRoleReadable(); ?>">


</div>
</form>