<!-- <?php require "partials/banner.php"; ?> -->

<section class="reservation">

<div class="reservation_top">
      
        <h3>Make a reservation</h3>
        <p>A reservation fee of €10,- per person is required in order to make a reservation</p>
    </div>

    <section class="containers">

    
    <div class="summary_container">
      <h3>Reservation Details</h3>
      <div class="summary">
        <div class="container-fluid">
          <hr class="top_line">
          <div class="vl"></div> <!-- vertical line --> 

          <div class="row">
            <div class="col-xs col-md"><p>Restaurant</p></div>
            <div class="col-xs col-md"><p><?php echo $restaurant->name ?></p></div>
          </div>
          <div class="row">
            <div class="col-xs col-md"><p>Date</p></div>
            <div class="col-xs col-md"><p id="date"></p></div>
          </div>
          <div class="row">
            <div class="col-xs col-md"><p>Time</p></div>
            <div class="col-xs col-md"><p id="time"></p></div>
          </div>
          <div class="row">
            <div class="col-xs col-md"><p>Adults</p></div>
            <div class="col-xs col-md"><p id="adults"></p></div>
          </div>
          <div class="row">
            <div class="col-xs col-md"><p>Children</p></div>
            <div class="col-xs col-md"><p id="children"></p></div>
          </div>
          <div class="row">
            <div class="col-xs col-md"><p>Allergies</p></div>
            <div class="col-xs col-md"><p id="allergies"></p></div>
          </div>
          <div class="row">
            <div class="col-xs col-md"><p></p>Requests</div>
            <div class="col-xs col-md"><p id="requests"></p></div>
          </div>

        </div>
        <hr>
      </div>
    </div>

    <div class="container_reservation">
      <div id="reservation_form">
          <form name="reservation" action="http://localhost/food/book/<?php echo str_replace(" ","-", $restaurant->name) ?>" method="post">
              <div class="form-row">
                  <div class="col">
                      <label>Date</label>
                      <select class="form-control" name="txtDate" id="first_select" onchange="displaySummary()">
                        <option value="">Select Date</option>
                        <option value="2019-07-25">25-07-2019</option>
                        <option value="2019-07-26">26-07-2019</option>
                        <option value="2019-07-27">27-07-2019</option>
                        <option value="2019-07-28">28-07-2019</option>
                        <option value="2019-07-29">29-07-2019</option>
                      </select>
                  </div>
                  <div class="col">
                      <label>Time</label>
                      <select class="form-control" name="txtTime" onchange="displaySummary()">
                        <option value="">Select Time</option>
                        <?php for ($i=0; $i < count($restaurant->getReservationTimes()) - 1; $i++) { ?>
                          <option value="<?= $restaurant->getReservationTimes()[$i] ?>">
                            <?= $restaurant->getReservationTimes()[$i] ?> -  Session <?= $i+1 ?>
                          </option>
                        <?php }?>
                      </select>
                  </div>
              </div>

              <div class="form-row">
                  <div class="col">
                      <label>Adults</label>
                      <select class="form-control" name="txtAdults" onchange="displaySummary()">
                        <option value="">Amount of Adults</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                      </select>
                  </div>
                  <div class="col">
                      <label>Children</label>
                      <select class="form-control" name="txtChildren" onchange="displaySummary()">
                        <option value="">Amount of Children</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                      </select>
                  </div>
              </div>

              <div class="form-group">
                <label>Allergies</label>
                <input type="text" name="txtAllergies" class="form-control" id="allergy_id" onchange="displaySummary()">
              </div>

              <hr>
              <div class="form-group">
                  <label>Special Requests</label>
                  <textarea class="form-control requests" name="txtRequests" id="request_id"onchange="displaySummary()"></textarea>
              </div>

      </div>

    </div>
    </section>


    
</section>
<hr class="bottom_line">
<section class="pay">
<button type="submit" class="btn">Pay</button>
            </form>
</section>
