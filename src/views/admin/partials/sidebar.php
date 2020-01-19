<link rel="stylesheet" href="/css/admin.css">

<div class="wrapper">
    <!-- Sidebar -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <h3>Haarlem Festival</h3>
            <p>Logged in as <a href="/admin/users/<?=App::get("user")->getName();?>"><?=App::get("user")->getName();?></a></p>
        </div>

        <ul>
            <li><a href="/admin/create">New Event</a></li>
            <li><a href="/admin/event">Events</a></li>
            <!-- <li><a href="/create">New restaurant</a></li> -->
            <li><a href="/admin/location">Locations</a></li>
            <li><a href="/admin/restaurants">Restaurants</a></li>
            <li><a href="/admin/pages">Pages</a></li>
            <hr>
            <!-- <li><a href="">Edit Restaurant</a></li> -->
            <li><a href="/admin/settings">Settings</a></li>
            <li><a href="/admin/statistics">Statistics</a></li>
            <li><a href="/admin/users">Users</a></li>
            <li><a href="/api">Public API</a></li>
            <hr>
            <li><a href="/admin/tickets">Tickets</a></li>
            <li><a href="/admin/scan">Scan Ticket</a></li>
            <li><a href="/admin/invoices">Invoices</a></li>
            <li><a href="/auth/logout">Logout</a></li>
            <li><a href="/payment/make">Payment</a></li>



        </ul>

    </nav>
    <!-- Page Content -->
    <!-- <button id="sidebarCollapse" class="hamburger hamburger--collapse is-active" type="button">
        <span class="hamburger-box">
            <span class="hamburger-inner"></span>
        </span>
    </button> -->




    <script type="text/javascript">
        
        $(document).ready(function () {
        if (document.documentElement.scrollWidth < 500) {
            document.getElementById("sidebar").style.transition = "all 0";

            $('#sidebar').toggleClass('active');
            $("#sidebarCollapse").toggleClass("is-active");
            // $("#sidebarCollapse").addClass("is-active");
        }


            $('#sidebarCollapse').on('click', function () {
                document.getElementById("sidebar").style.transition = "all 0.3s";

                $('#sidebar').toggleClass('active');
                $("#sidebarCollapse").toggleClass("is-active");
            });
        });
    </script>