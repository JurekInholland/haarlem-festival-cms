<style>

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



#event_form input {
    width: unset;
}
</style>

<?php
$number_sessions = $event->getLocation();

$start = new DateTime($event->getStartTime());
$end = new DateTime($event->getEndTime());
$interval = $end->diff($start);

// Get total duration in seconds
$hours = $interval->h;
$minutes = $interval->i;
$minutes += $hours*60;
$seconds = $minutes*60;

date_default_timezone_set ("UTC"); // makes sure there is no DST or timezone added to result
$session_duration = date("h:i", $seconds / $number_sessions);

?>


<h1>Food event</h1>

<form action="/admin/submit" method="POST" class="form" id="event_form">
    <input type="hidden" name="event_id" value="<?=$event->getId();?>">
    <input type="hidden" name="type" value="2">

    <section>
        <label for="name">Restaurant</label>
        <input class="form-control" name="name" type="text" value="<?=$event->getName();?>">
    </section>

    <section>
        <label for="address">Address</label>
        <input class="form-control" name="address" type="text" value="<?=$event->getAddress();?>">
    </section>

    <!-- <section>
        <label for="date">Date</label>
        <select class="form-control" name="date" ></select>
    </section> -->

        <section>
            <label for="time">Number of sessions</label>
            <input class="form-control" type="number" name="location" value="<?=$number_sessions?>">
        </section>

        <section class="times" id="times">
            <section>
                <label for="time">First session</label>
                <input class="form-control" type="time" name="first_session" value="<?=$event->getStartTime()?>">  
            </section>

            <section>
                <label for="time">Session duration</label>
                <input class="form-control" id="start" type="time" name="session_duration" value="<?=$session_duration?>">
            </section>
        </section>


    <section>
        <label for="rating">Rating</label>
        <input class="form-control" name="rating" type="number" min=0 max=5 value="<?=$event->getRating();?>">
    </section>





    <!-- <section>
        <label for="location">Location</label>
        <input class="form-control" name="location" type="text" value="<?=$event->getLocation();?>">
    </section> -->

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
        <?php
            if ($event->getId() != "") {
                echo "<input name='delete' class='btn btn-danger' type='submit' value='Delete'>";

            }
        ?>
        <input name="cancel" class="btn btn-secondary" type="submit" value="Cancel">
        <input name="submit" class="btn btn-primary" type="submit" value="Submit">
    </section>
</form>