<style>


</style>

<?php
$duration = 0;
if ($event->getId) {
    $start = new DateTime($event->getStartTime());
    $end = new DateTime($event->getEndTime());
    $interval = $end->diff($start);
    
    // Get total duration in seconds
    $hours = $interval->h;
    $minutes = $interval->i;
    $minutes += $hours*60;
    $seconds = $minutes*60;
    
    date_default_timezone_set ("UTC"); // makes sure there is no DST or timezone added to result
    $duration = date("h:i", $seconds);
    
}


?>
<h1>Dance event</h1>

<form action="/admin/submit" method="POST" class="form" id="event_form">
    <input type="hidden" name="event_id" value="<?=$event->getId();?>">
    <input type="hidden" name="type" value="1">

    <section>
        <label for="name">Artist</label>
        <input class="form-control" name="name" type="text" value="<?=$event->getName();?>">
    </section>

    <section>
        <label for="date">Day</label>
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
                <label for="time">Duration (aprox.)</label>
                <input class="form-control" type="time" name="duration" value="<?=$duration?>">  
            </section>
        </section>

    <section>
        <label for="address">Venue</label>
        <input class="form-control" name="address" type="text" value="<?=$event->getAddress();?>">
    </section>

    <section>
        <label for="location">Session</label>
        <input class="form-control" name="location" type="text" value="<?=$event->getLocation();?>">
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
