<?php require "partials/banner.php"; ?>
    
    <div class="container_details">
      <div class="top">
          <h1><?php echo $restaurant->getName(); ?></h1>
          <h3><?php echo $restaurant->getDescription();  ?></h3>
          <p>A reservation fee of €10,- per person is required in order to make a reservation</p>
          <a href="/food/reservation/<?php echo str_replace(" ","-", $restaurant->getName()) ?>"><button type="button" class="btn btn-lg">Make Reservation</button></a>
      </div>

      <div class="restaurant_details">
        <div class="restaurant_image">
          <img src="/image_uploads/<?php echo $restaurant->getImage() ?>"/>
        </div>

        <div class="container-fluid">
          <div class="row">
            <div class="col-xs col-md">First Session:</div>
            <div class="col-xs col-md"><?php echo $restaurant->firstSession();  ?></div>
            <div class="col-xs col-md">Session Duration:</div>
            <div class="col-xs-1 col-md-1"><?php echo $restaurant->duration(); ?>h</div>
            <div class="col-xs col-md">Price</div>
            <div class="col-xs col-md">€<?php echo $restaurant->getPrice(); ?></div>
            <div class="col-xs col-md">
              <img class="ratings" src="/img/<?php echo $restaurant->getRating(); ?>.png"/>
            </div>
          </div>

          <div class="row">
            <div class="col-xs col-md">Session:</div>
            <div class="col-xs col-md"><?php echo $restaurant->getLocationDetail(); ?></div>
            <div class="col-xs col-md">Number of seats:</div>
            <div class="col-xs-1 col-md-1"><?php echo $restaurant->getTickets(); ?></div>
            <div class="col-xs col-md">Kids (-12)</div>
            <div class="col-xs col-md">€<?php echo $restaurant->getKidsPrice() ?></div>
            <div class="col-xs col-md"></div>
          </div>

          <div class="row">
              <div class="col-xs col-md">Address:</div>
              <div class="col-xs-11 col-md-11"><?php echo $restaurant->getAddress() ?></div>
          </div>
        </div>
      </div>
    </div> <!-- end of container_details -->
    