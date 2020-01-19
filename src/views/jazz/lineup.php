<style>

.page-title{
  text-align: center;
  font-size: 60px;
  font-style: bold;
}
/*grid design of the tickets"*/
.container-lineup
{
  /*this for grid*/
  /*display: grid;
  grid-template-columns: auto auto auto auto;*/
    /*flex*/
    display: flex;
    flex-wrap: wrap;
    flex-direction: column;
    flex: 1 1 30%;    
  grid-gap: 20px;
  /*padding:400px;*/
}
.box
{
  border: 3px solid black;
}
.orderBtn
{
  border-radius: 8px;
  background-color: skyblue;
  border: none;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
}
/*** when the ticket is zero, change attributes */
.notavailableBtn
{
  border-radius: 8px;
  background-color: grey;
  border: none;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
}

/************the best design logo*******/
.best-deal{
  color: black;
  font-size: 20px;
}
/************navigation******************/
.jazznav
{
  text-align:center;
}
.navlist
{
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  padding: 50px;
}
.jazzdate
{
  display: inline;
  background-color: white;
  border: 1px solid #888;
  padding: 20px 150px;
  font-size: 20px;
  text-decoration: none;
}

.ticket-box
{
  background-image: url('..//.//img/116391.jpg');
  background-repeat: no-repeat;
  position: sticky;
}
.class-header
{
  font-style: bold;
  font-size: 20px;
}

.card-text-center
{
  background: white;
  margin: 20px;
}
</style>
<head>
<!-- bootstrap-->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<!-- title of the page -->
<h1 class= "page-title"> Jazz Line-Up </h1>
<!-- the navigation -->
<nav class = "jazznav">
    <ul class = "navlist">
        <a href ="jazz/events/27"><li class = "jazzdate">Thursday </li></a>
        <a href ="jazz/events/28"><li class = "jazzdate"> Friday </li ></a>
        <a href ="jazz/events/29"><li class = "jazzdate"> Saturday </li></a>
        <a href ="jazz/Sundayevents"><li class = "jazzdate"> Sunday </li></a>
    </ul>
</nav>

<!-- foreach of the tickets of the jazz event make a container and show it -->
<body>
<div class ="ticket-box">
<div class ="row">
  <?php foreach($events as $event):?>
  <div class="container-lineup">
    <div class="card-text-center">
        <?php if ($event->getHall() == "Pass"): ?>
          <div class="card-header bg-danger"> <h1 class = "best-deal">Best Deal </h1></div>
        <?php endif;?>

        <!-- the titile of the ticket-->
        <div class="card-header">
          <?= $event->getBand();?>
        </div>

        <!--this is the information within-->
        <div class="card-body">
          <div class = "card-text">
            <h5><?= $event->getDescription();?></h5>
            <h5>Time: <?= $event->getStartDate();?> - <?= $event->getEndDate();?></h5>
            <h5>Location: <?= $event->getAddress();?></h5>
            <h5>Hall: <?= $event->getHall();?></h5>
            <h5>Price: $<?= $event->getPrice();?></h5>
          </div>

          <!-- the order button of the container -->
          
          <!-- WHEN THE TICKET IS FOR THE SUNDAY EVENT-->
          <?php if ($event->getAddress() == "Grote Markt" ): ?>
            <button class="btn btn-primary ordBtn" > FREE EVENT </button>
          <?php elseif ($event->getAddress() == "Patronaat"): ?>
            <a href ="jazz/order/<?= $event->getId()?>">
              <button class="btn btn-primary ordBtn" > Buy Now </button>
            </a>
          <?php endif;?>
            <!-- different Messages depending on the Hall location of the ticket.-->
            <?php if ($event->getHall() == "Main"): ?>
              <p class="card-text">With this ticket you have access to the main hall event.</p>
            <?php elseif ($event->getHall() == "Second"): ?>
              <p class="card-text">With this ticket you have access to the second hall event.</p>
            <?php elseif ($event->getHall() == "Third"): ?>
              <p class="card-text">With this ticket you have access to the Third hall event.</p>
            <?php endif;?>

        </div>
    </div>
  </div>
  <?php endforeach;?>
</div>
</div>

<!---------------------bootstrap---------------------------->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script></body>

