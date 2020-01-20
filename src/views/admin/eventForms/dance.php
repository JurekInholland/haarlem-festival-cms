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
    height: 2rem;
}

.form section {
    flex:1 1 33%;
    display: flex;
    flex-direction: column;
    padding: 10px 15px;
}
.form .times {
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
    width: calc(50% - 5px);
    min-width: 54px;
}

</style>


<h1>Dance event</h1>

<form action="" class="form" id="event_form">

    <section>
        <label for="name">Artist</label>
        <input class="form-control" name="name" type="text" value="<?=$event->getName();?>">
    </section>

    <section>
        <label for="date">Date</label>
        <select class="form-control" name="date" ></select>
    </section>

    <section >
        <section class="times">
        <label for="time">Time</label>
        <label for="duration">Duration (min)</label>
        </section>

        <section name="time" class="times">
            <input class="form-control" type="time" name="from">
            <input class="form-control" type="number" name="duration">
        </section>
    </section>

    <section>
        <label for="address">Venue</label>
        <input class="form-control" name="address" type="text" value="<?=$event->getAddress();?>">
    </section>

    <section>
        <label for="location">Session</label>
        <input class="form-control" name="location" type="text" value="<?=$event->getLocation();?> Hall">
    </section>

    <section>
        <label for="seats">Tickets</label>
        <input class="form-control" name="seats" type="number" value="<?=$event->getNumberTickets();?>">
    </section>

    <section>
        <label for="price">Price (€)</label>
        <input class="form-control" name="price" type="number" step="0.01" value="<?=$event->getPrice();?>">
    </section>

    <section class="stretch">
        <label for="description">Remarks</label>
        <textarea class="form-control" name="description"><?=$event->getDescription();?></textarea>
    </section>
</form>