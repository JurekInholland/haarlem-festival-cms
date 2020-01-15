<style>
.form {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    flex-wrap: wrap;
    margin-left: -15px;
    margin-right: -15px;
}

.form input, .form select {
    min-width: 250px;
}
.form input[type="submit"] {
    width: calc(50% - 10px);
    min-width: 125px;
}

.form section {
    flex:1 1 33%;
    display: flex;
    flex-direction: column;
    padding: 10px 15px;
}
.form .times{
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    padding: 0;
    flex: auto;
    justify-content: space-between;
}

.form .stretch {
    flex-basis: 100%;
}
.form textarea {
    min-height: 90px;
}

.times input {
    width: calc(33% - 5px);
    min-width: 54px;
}

.form-control {
    min-height: 36px;
}

.form .buttons {
    flex-direction: row;
    justify-content: space-between;
}

</style>


<h1>Food event</h1>

<form action="" class="form">

    <section>
        <label for="name">Restaurant</label>
        <input class="form-control" name="name" type="text" value="<?=$event->getName();?>">
    </section>

    <section>
        <label for="date">Date</label>
        <select class="form-control" name="date" ></select>
    </section>

    <section >
        <label for="time">Session duration start</label>

        <section name="time" class="times">
            <input class="form-control" type="time" name="from">
            <input class="form-control" type="time" name="to">
            <input type="time" name="to">
        </section>
    </section>

    <section>
        <label for="address">Address</label>
        <input class="form-control" name="address" type="text" value="<?=$event->getAddress();?>">
    </section>

    <section>
        <label for="rating">Rating</label>
        <input class="form-control" name="rating" type="number" value="<?=$event->getRating();?>">
    </section>





    <section>
        <label for="location">Location</label>
        <input class="form-control" name="location" type="text" value="<?=$event->getLocation();?> Hall">
    </section>

    <section>
        <label for="seats">Seats</label>
        <input class="form-control" name="seats" type="number" value="<?=$event->getNumberTickets();?>">
    </section>

    <section>
        <label for="price">Price (€)</label>
        <input class="form-control" name="price" type="number" step="0.01" value="<?=$event->getPrice();?>">
    </section>

    <section class="stretch">
        <label for="description">Type</label>
        <textarea class="form-control" name="description"><?=$event->getDescription();?></textarea>
    </section>

    <section class="buttons">
        <input name="cancel" type="submit" value="Cancel">
        <input name="submit" type="submit" value="Submit">
    </section>
</form>