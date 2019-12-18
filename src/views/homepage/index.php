
<style>
.index {
    height: calc(100vh - 65px);
    display: flex;
    justify-content: center;
    align-items: center;
    background-image: linear-gradient(to right top, #169bd5, #d64332, #f59f17);
    /* background-image: url("/img/festival.jpg"); */
    background-size: cover;
    background-position: center;
    /* overflow: hidden; */
}
.circle {
    border-radius: 50%;
    background-color: rgba(255, 255, 255, 0.55);
    width: calc(100vmin - 125px);
    height: calc(100vmin - 125px);
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
    /* color: #F59F17; */
    color: black;
    font-family: Arial, Helvetica, sans-serif;
}

#second_headline {
    color: #169BD5;
}

#demo {
    color: #C32039;
}

#festival_logo {
    width: 65%;
    height: auto;
    background-color: transparent;
    margin: 0 auto;
}

</style>

<section class="index">
<figure class="circle">
<h1 id="main_headline">Welcome to</h1>

<img src="/img/logo-transparent.svg" alt="" id="festival_logo">

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