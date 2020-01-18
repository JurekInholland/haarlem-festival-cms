<style>
.form {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    flex-wrap: wrap;
}

.form section {
    flex:1 1 33%;
    display: flex;
    flex-direction: column;
    padding: 10px 15px;
}

.form input, .form select {
    min-width: 250px;
}
</style>

<?php

$users = UserService::getAll();
$events = EventService::getAll();
?>

<form action="/admin/submitTicket" method="POST" class="form">

    <section>
        <label for="user">User</label>
        <select name="user" class="form-control">
            <?php foreach ($users as $key => $user) : ?>
                <option value="<?= $user->getId(); ?>"><?= $user->getName() ?></option>                    
            <?php endforeach; ?>
        </select>
    </section>

    <section>
        <label for="event">Event</label>
        <select name="event" class="form-control">
            <?php foreach ($events as $key => $event) : ?>
                <option value="<?= $event->getId(); ?>"><?= $event->getName() ?></option>                    
            <?php endforeach; ?>
        </select>
    </section>


    <section>
        <label for="amount">Amount</label>
        <input type="number" name="amount" class="form-control">
    </section>


    <section class="stretch">
        <input type="submit" value="Create Ticket" name="submit" class="btn btn-primary">
    </section>
</form>