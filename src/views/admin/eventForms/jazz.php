<style>


</style>

<?php
// die(var_dump($event));
?>
<h1>Jazz event</h1>

<form action="/admin/submit" method="POST" class="form" id="event_form">
    <input type="hidden" name="event_id" value="<?=$event->getId();?>">
    <input type="hidden" name="type" value="0">

    <section>
        <label for="name">Band</label>
        <input class="form-control" name="name" type="text" required value="<?=$event->getName();?>">
    </section>

    <section>
        <label for="date">Date</label>
        <select class="form-control" name="day" >
            <?php foreach ($festival_days as $key => $day) : ?>
                <?php if($day["string"] == $event->getDayReadable()) {$selected = "selected";} else {$selected = "";} ?>

                <option <?= $selected; ?> value="<?= $key; ?>"><?= $day["string"] ?></option>
            
            <?php endforeach; ?>
</select>
        </select>
    </section>


        <section class="times" id="times">
            <section>
                <label for="time">Start time</label>
                <input class="form-control" id="start" type="time" name="start_time" value="<?=$event->getStartTime()?>">
            </section>

            <section>
                <label for="time">End time</label>
                <input class="form-control" type="time" name="end_time" value="<?=$event->getEndTime()?>">  
            </section>
        </section>

    <section>
        <label for="address">Address</label>
        <input class="form-control" name="address" type="text" value="<?=$event->getAddress();?>">
    </section>

    <section>
        <label for="location">Location</label>
        <input class="form-control" name="location" type="text" value="<?=$event->getLocation();?>">
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
        <label for="description">Description</label>
        <textarea class="form-control" name="description"><?=$event->getDescription();?></textarea>
    </section>

    <section class="buttons">
        <?php
            if ($event->getId() != "") {
                echo "<input name='delete' class='btn btn-danger' type='submit' value='Delete'>";

            }
        ?>
        <input name="cancel" class="btn btn-secondary" type="submit" value="Cancel">
        <input name="submit" class="btn btn-primary" type="submit" value="Submit">
    </section>
</form>
