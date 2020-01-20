<style>
#event_form {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    flex-wrap: wrap;
    margin-left: -15px;
    margin-right: -15px;
}

#event_form input, #event_form select {
    min-width: 250px;
}
#event_form input[type="submit"] {
    width: calc(50% - 10px);
    min-width: 125px;
}

#event_form section {
    flex:1 1 33%;
    display: flex;
    flex-direction: column;
    padding: 10px 15px;
    overflow: hidden;
}
#event_form .times{
    display: flex;
    flex-direction: row;
    align-items: center;
    flex-wrap: wrap;
    /* padding: 10px 15px;
    flex: auto; */
    justify-content: space-between;
}

#event_form .stretch {
    flex-basis: 100%;
}
#event_form textarea {
    min-height: 90px;
}

.times input {
    flex-basis: 45%;
    /* width: calc(33% - 5px); */
    min-width: 54px;
}

#event_form-control {
    min-height: 36px;
}

#event_form .buttons {
    flex-direction: row;
    justify-content: space-between;
}

#event_form input {
    width: unset;
}
</style>


<h1>Food event</h1>

<form action="" class="form" id="event_form">

    <section>
        <label for="name">Restaurant</label>
        <input class="form-control" name="name" type="text" value="<?=$event->getName();?>">
    </section>

    <!-- <section>
        <label for="date">Date</label>
        <select class="form-control" name="date" ></select>
    </section> -->

        <section>
            <label for="time">Session duration start</label>
            <input class="form-control" type="time" name="from">
        </section>

        <section class="times">
            <input class="form-control" type="time" name="to">
            <input class="form-control" type="time" name="to">
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