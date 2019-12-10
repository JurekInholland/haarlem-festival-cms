<?php
// die(var_dump($festival_days));

?>

<script src="/js/cleave.js"></script>

<style>

.hidden {
    display: none;
}

.wrapper {
    /* margin-top: 2rem; */
    /* margin: 1rem; */
}

textarea {
    max-height: 100vh;
    min-height: 480px;
}

input, textarea {
    border: 1px solid #777;
    border-radius: 6px;
}

form {
    display: grid;
    grid-auto-columns: 1fr;
    grid-template-areas:
        'left left right1'
        'left left right2'
        'left left right3'
        'left left right4'
        'left left right6'
        'left left right7'
        'left left right8';
    grid-gap: 15px;
    align-items: start;
    margin-bottom: 2rem;
    width: 100%;
    max-width: 1500px;
    margin: 0 auto;
}



form textarea {
    /* margin-top: 1.5rem; */
    grid-area: left;
    height: calc(100vh - 260px);
    width: 100%;
}


form input, select {
    grid-area: right;
    height: 35px;
    width: 100%;
    /* margin-top: 1.5rem; */
}

form input[type=submit] {
    width: 50%;
}


.input0 {
    grid-area: left;
}

.input1 {
    grid-area: right1;
}

.input2 {
    grid-area: right2;
}
.input3 {
    grid-area: right3;
}
.input4 {
    grid-area: right4;
}
.input5 {
    grid-area: right5;
}
.input6 {
    grid-area: right6;
}
.input7 {
    grid-area: right7;
}

form section:last-of-type {
    align-self: end;
}

label {
    margin: 0;
}


@media screen and (max-width: 930px) {
    form {
        grid-template-areas:
        'right1'
        'left'
        'right2'
        'right3'
        'right4'
        'right6'
        'right7'
        'right8';
    }

    form textarea {
        height: 300px;
        min-height: 100px;
    }  
}

form {
    margin: 20px auto;
    /* width: 420px; */
}
.form-row {
    padding: 5px 10px;
}
label {
    display: block;
    margin: 3px 0;
}
.form-row input {
    padding: 3px 1px;
    width: 100%;
}
input.currency {
    text-align: right;
    padding-right: 15px;
}
.input-group .form-control {
    float: none;
}
.input-group .input-buttons {
    position: relative;
    z-index: 3;
}

input[type=time] {
    display: block;
    grid-area: auto;
    /* align-self: start; */
    /* align-self: end; */
    /* width: 100%; */
    /* margin: 0 auto; */
}

.timeframe {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    grid-template-rows: auto;
}

</style>
<section class="wrapper">
    
    <form action="/admin/submit" method="POST">
        <section class="input0">
            <label for="descr" >Event description</label>
            <textarea name="description"><?php echo $event->getDescription(); ?></textarea>
        </section>
        
        <section class="input1">
            <label for="category">Event Type</label>
            <select name="category"  value="<?= $event->getCategoryId(); ?>">
                <?php foreach ($event_types as $key => $type) : 
                ?>
                    <?php if($key == $event->getCategoryId()) {$selected = "selected";} else {$selected = "";} ?>

                    <option <?= $selected; ?> value="<?= $key; ?>"><?= $type->getName() ?></option>
                    
                <?php endforeach; ?>
            </select>
        </section>

        <section class="input2">
            <label for="event_artist">Artist</label>
            <input name="artist" type="text" value="<?= $event->getArtist(); ?>">
        </section>

        

        <section class="input3">
            <label for="input3">Date</label>
            <select name="day">
                <?php foreach ($festival_days as $key => $day) :
                ?>
                    <?php if($day["string"] == $event->getDateString()) {$selected = "selected";} else {$selected = "";} ?>

                    <option <?= $selected; ?> value="<?= $key; ?>"><?= $day["string"] ?></option>
                <?php endforeach; ?>
            </select>
        </section>

        <section class="input4 timeframe">
            <label for="event_start_time">From</label>
            <label for="event_end_time">To</label>

            <input type="time" name="start_time" id="time" value="<?= $event->getStartTime(); ?>">            
            <input type="time" name="end_time" value="<?= $event->getEndTime(); ?>">
        </section>

        

        <section class="input6">
            <label for="input6">Ticket Price</label>
            <input step="1" class="input-1" value="<?= $event->getPrice(); ?>" name="price"/>
        </section>

        <section class="input7">
            <label for="input7">Location</label>
            <?php
            require "../src/views/admin/partials/editLocation.php";
            ?>
            <!-- <select name="location" >
                <?php foreach ($locations as $key => $location) : 
                ?>
                    <?php if($key == $event->getLocationId()) {$selected = "selected";} else {$selected = "";} ?>

                    <option <?= $selected; ?> value="<?= $location->getId(); ?>"><?= $location->toString() ?></option>
                    
                <?php endforeach; ?>
            </select> -->

        </section>

        <section class="input8">
            <input name="cancel" type="submit" value="Cancel"><input name="submit" type="submit" value="Submit">
        </section>

    </form>
</section>

<script>
$(function () {
    new Cleave('.input-1', {
        numeral: true,
        prefix: '€',
    });

});
</script>