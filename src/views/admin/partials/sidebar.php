<link rel="stylesheet" href="/css/admin.css">

<div class="wrapper">
    <!-- Sidebar -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <h3>Haarlem Festival</h3>
            <p>Loggin in as <span style="font-weight: bold;">user</span></p>
        </div>

        <ul>
            <li><a href="/admin/create">Create event</a></li>
            <li><a href="/admin/events">Edit event</a></li>
            <!-- <li><a href="/create">New restaurant</a></li> -->
            <li><a href="">Create Restaurant</a></li>
            <li><a href="">Edit Restaurant</a></li>
            <li><a href="/admin/settings">Festival settings</a></li>
            <li><a href="/admin/statistics">View statistics</a></li>

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
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
                $("#sidebarCollapse").toggleClass("is-active");
            });
        });
    </script>