<?php require "partials/sidebar.php"; ?>
    
    <div id="content">

    <?php require "partials/sidebar-toggle.php"; ?>
    

    <?php 
    if($event->id) {
        $headline = "Edit Event";
    } else {
        $headline = "New Event";
    }
    ?>

    
    <h1><?= $headline; ?></h1>

    <?php require "partials/newEditEvent.php"; ?>
    </div>
</div>
