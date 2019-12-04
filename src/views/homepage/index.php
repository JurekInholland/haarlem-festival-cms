
<style>
.index {
    width: 100vw;
    height: calc(100vh - 61px);
    display: flex;
    justify-content: center;
    align-items: center;
    background-image: url("/img/festival.jpg");
    background-size: cover;
    background-position: center;
    /* overflow: hidden; */
}
.circle {
    border-radius: 50%;
    background-color: rgba(255, 255, 255, 0.55);
    width: calc(100vmin - 75px);
    height: calc(100vmin - 75px);
    margin: 0 auto;
    display: flex;
    flex-flow: column;
    text-align: center;
    justify-content: center;
    font-family: Rockwell, Georgia;
    font-weight: bold;
    min-height: 300px;
    min-width: 300px;
}

#main_headline {
    color: #F59F17;
}

#second_headline {
    color: #169BD5;
}

#demo {
    color: #C32039;
}


</style>

<section class="index">
<figure class="circle">
<h1 id="main_headline">Welcome to Haarlem festival!</h1>

<h3 id="second_headline">Countdown to main event</h3>

<p id="demo"></p>
</figure>
</section>






<script>
// Set the date we're counting down to
var countDownDate = new Date("Jan 5, 2021 15:37:25").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
  document.getElementById("demo").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";

  // If the count down is finished, write some text
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "EXPIRED";
  }
}, 1000);
</script>