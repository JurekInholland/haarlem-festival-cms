<!doctype html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
     
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">

        <title>Dance Page</title>
        <style>
            .bg-danger{
                font-weight: bold;
            }
            .container-fluid{    
       margin-bottom: -60px;
       background-image: url("https://img.static-kl.com/images/media/E95E1F32-A7A4-4FC0-AC0A41A2BC528AE3?aspect_ratio=1:1&min_width=912");
       background-position: center;
       background-attachment: fixed;
       background-size: cover;
}
            .row{
            margin: 60px 60px;
            
}
            .buy-butt{
            margin: 0 20 40 0 ;
}
            .dance-ticket {
            opacity: 0.8;
            filter: alpha(opacity=10);
            height: 400px;
            
}
          .dance-ticket:hover {
            opacity: 1.0;
            filter: alpha(opacity=100);
}
.danceDays:active,.danceDays:hover {
    color:#C32039;
}
.danceDays{
   text-decoration: none;
   color: black;
   font-weight: bold;
}
        </style>
    </head>

    <body class="danceBody">
    <div class="container-fluid">
    <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link danceDays"  href="http://localhost:6789/dance" role="tab" aria-controls="AllDays" aria-selected="false">All days</a>
                    </li>
                    <li class="nav-item ">
                      <a class="nav-link danceDays"  href="http://localhost:6789/dance/perdate/27" role="tab" aria-controls="THU" aria-selected="false">THU 27 AUG</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link danceDays" href="http://localhost:6789/dance/perdate/28" role="tab" aria-controls="FRI" aria-selected="false">FRI 28 AUG</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link danceDays"  href="http://localhost:6789/dance/perdate/29" role="tab" aria-controls="SAT" aria-selected="false">SAT 29 AUG</a>
                    </li>
            </ul>
    <div class="row">
            <?php $count=1;
             foreach ($Events as $event): ?>
                <div class="col-md-6 col-sm-6 col-lg-4">
                    <div class="card col-md-12 dance-ticket"  >
                <?php if($event->getVenue()=='pass') : ?>
                        <div class="card-header bg-danger text-center">Best Deal</div>
                <?php endif; ?>                
                        <div class="card-body">
                            <h5 class="card-title"> <?= $event->getArtist(); ?>  </h5>
                            <p class="card-text">
                                Date: <?= $event->getStart_date();?> <br> 
                                Price: <?= $event->getPrice();?> <br> 
                                Duration: <?= $event->getDuration();?> <br>
                                Place: Haarlem City <br>
                                Session: <?= $event->getSession();?> <br>
                                Venue: <?= $event->getVenue();?> <br>
                                Time: <?= $event->getStartTime()?> <br>
                            </p>
                        </div>
                        <div class="buy-butt text-right"> 
                                <a href= "http://localhost:6789/dance/order/<?= $event->getId();?>" class="btn btn-danger">Get Ticket </a>
                        </div>
                    </div>
                </div>
                    <?php if($count%3==0) {
                    echo('</div> <div class="row">') ;}?>
        
        <?php $count++;  endforeach; ?>
    

        <!-- required bootstrap js properties -->
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
            integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
        </script>
        </div>
    </body>
