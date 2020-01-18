<style>
.form {
    display: flex;
    flex-flow: column;
}

.form input, .form select    {
    margin-bottom: 1rem;
}
</style>

<?php

$users = UserService::getAll();
$events = EventService::getAll();
?>

<form action="/admin/submitTicket" method="POST" class="form">

    <label for="user">User</label>
    <select name="user" class="form-control">
        <?php foreach ($users as $key => $user) : ?>
            <option value="<?= $user->getId(); ?>"><?= $user->getName() ?></option>                    
        <?php endforeach; ?>
    </select>

    <label for="event">Event</label>
    <select name="event" class="form-control">
        <?php foreach ($events as $key => $event) : ?>
            <option value="<?= $event->getId(); ?>"><?= $event->getName() ?></option>                    
        <?php endforeach; ?>
    </select>



    <label for="amount">Amount</label>
    <input type="number" name="amount" class="form-control">

    <input type="submit" value="Create Ticket" name="submit" class="btn btn-primary">
</form>