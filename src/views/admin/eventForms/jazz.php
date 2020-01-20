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

#times input {
    width: calc(50% - 5px);
    min-width: 54px;
}

</style>


<h1>Jazz event</h1>

<form action="" class="form" id="event_form">

    <section>
        <label for="name">Band</label>
        <input name="name" type="text" value="<?=$event->getName();?>">
    </section>

    <section>
        <label for="date">Date</label>
        <select name="date" >
            <?php foreach ($festival_days as $key => $day) : ?>
                <?php if($day["string"] == $event->getDayReadable()) {$selected = "selected";} else {$selected = "";} ?>

                <option <?= $selected; ?> value="<?= $key; ?>"><?= $day["string"] ?></option>
            
            <?php endforeach; ?>
</select>
        </select>
    </section>


        <section class="times" id="times">
            <section>
                <label for="time">Time</label>
                <input type="time" name="from" value="<?=$event->getStartTime()?>">
            </section>

            <section>
                <label for="time">Time</label>
                <input type="time" name="from" value="<?=$event->getStartTime()?>">  
            </section>
        </section>

    <section>
        <label for="address">Address</label>
        <input name="address" type="text" value="<?=$event->getAddress();?>">
    </section>

    <section>
        <label for="location">Location</label>
        <input name="location" type="text" value="<?=$event->getLocation();?> Hall">
    </section>

    <section>
        <label for="seats">Seats</label>
        <input name="seats" type="number" value="<?=$event->getNumberTickets();?>">
    </section>

    <section>
        <label for="price">Price (€)</label>
        <input name="price" type="number" step="0.01" value="<?=$event->getPrice();?>">
    </section>

    <section class="stretch">
        <label for="description">Description</label>
        <textarea name="description"><?=$event->getDescription();?></textarea>
    </section>
</form>