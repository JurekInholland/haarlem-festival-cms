<?php

if (isset($_GET["delete"])) {
    $modaldata = ["title" => "Confirm deletion",
    "content" => "Are you sure you want to delete {$user->getName()}?",
    "action" => "/admin/users/{$user->getName()}",
    "submit" => "Submit"];
    $modal = new Modal($modaldata);
    $modal->show();
    var_dump($_GET);
}


?>


<?php require "partials/sidebar.php"; ?>
    
    <div id="content">

    <?php require "partials/sidebar-toggle.php"; ?>
    



    <h1>User information</h1>

    <?php
        if  (App::get("user")->getRole() < 1) {
            require "partials/noPermissions.php";
        } else {
            require "partials/userProfile.php";
        }
    ?>
    </div>
</div>
