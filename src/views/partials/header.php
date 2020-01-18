<?php


$uri = Request::uri();
$categories = App::get("festival")->getCategories();
// die(var_dump($categories));



?>

<style>
/* NAVIGATION */

.logo {
    height: 64px;
    width: 64px;
    /* justify-self: center; */
    align-self: center;
    margin-left: .5rem;
}


.cart-icon {
    background-image: url("/img/shopping-cart.svg");
}

.calendar-icon {
    background-image: url("/img/calendar.svg");
}

.admin-icon {
    background-image: url("/img/user.svg");
}

.login-icon {
    background-image: url("/img/login.svg");
}

.logout-icon {
    background-image: url("/img/logout.svg");
}


.hNav, .hNav ul {
    display: flex;
    align-items: center;
}




.icon_nav li:hover {
    opacity: 0.75;
}

.icon_nav li {
    width: 36px;
    height: 36px;
    background-size: contain;
    margin-right: .65rem;
}

.icon_nav a {
    display: block;
    height: 100%;
    width: 100%;
}

.nav_links {
    width: 100%;
    display: flex;
    justify-content: space-evenly;
    padding-bottom: 0px;
}


.nav_links a {
    display: block;
    color: black;
    font-size: 1.5rem;
    font-family: Rockwell, Georgia;
    padding: 5px 15px;
    border-radius: 2px;
}

ul {
    margin-bottom: 0px;
}

a.active {
    background-color: #169BD5;
    color: white;
    border-radius: 5px;
    text-decoration: none;
}

.logo_link, .icon_nav {
        align-self: start;
}

.icon_nav {
    justify-content: space-evenly;
    display: none;
    margin-top: .67rem;
    margin-right: 0;
    /* width: 250px; */
}

#toggle_nav {
    margin-top: -1rem;
    margin-left: -.33rem;
    margin-right: 1rem;
    display: none;
}

.nav_links li {
        margin-top: 0px;
}

@media screen and (max-width: 768px) {
    .nav_links {
        flex-flow: column;
        align-items: center;
        margin-top: -255px;
        transition: margin .5s ease;

    }

    .nav_links a {
        padding-bottom: 1rem;
    }

    .nav_links li {
        margin-top: 3px;
    }

    .hNav {
        justify-content: space-between;
        flex-flow: row wrap;
        /* align-items: start; */
    }
    
    #toggle_nav {
        display: block;
    }

    .icon_nav {
        display: flex;
        margin-top: .67rem;
        margin-right: 1rem;
        position: absolute;
        right: 5;
        top: 1;
    }
}

#navmenu {
    position: absolute;
    top: 0;
    right: 0;
}


.menu_active {
    margin-top: -.5rem;
    transition: margin .5s ease;
}


</style>


<script src="/js/navigation.js" type="module"></script>

<body>
    <header>

        <nav class="hNav">
        
            <a class="logo_link" href="/"><img class="logo" src="/img/logo.svg" alt=""></a>
            <ul class="nav_links" id="navigation">

                <!-- <?php foreach ($categories as $key => $category) :
                    if ($category->getSlug() == $uri) {
                        $active = "class='active' style='background-color: #{$category->getColor()};'";
                    } else {
                        $active = "";
                    }
                ?>

                <li><a <?= $active; ?> href="/<?= $category->getSlug(); ?>"><?= $category->getName(); ?></a></li>

                <?php endforeach; ?> -->

                <!-- <li><a class="active" href="/jazz">Haarlem Jazz</a></li>
                <li><a href="/food">Haarlem Food</a></li>
                <li><a href="/dance">Haarlem Dance</a></li> -->
            </ul>
            <ul class="icon_nav">
                <li class="cart-icon"><a href="/cart" data-toggle="tooltip" title="Shopping Cart"></a></li>
                <li class="calendar-icon"><a href="/calendar"></a></li>

                <?php

                if (App::get("user")->isLoggedIn()) {
                    echo '<li class="admin-icon"><a href="/admin"></a></li>';
                    echo '<li class="logout-icon"><a href="/auth/logout"></a></li>';
                } else {
                    // echo '<li class="login-icon"><a href="/auth/login"></a></li>';
                    echo '<li class="login-icon"><a href="#" id="modal_toggle" data-toggle="modal" data-target="#login_modal"></a></li>';
                    
                }
                ?>

                <li id="toggle_nav"><button id="nav_burger" class="hamburger hamburger--collapse" type="button">
            <span class="hamburger-box">
                <span class="hamburger-inner"></span>
            </span>
        </button></li>
            </ul>
        </nav>

    </header>

<script type="text/javascript">
    $(document).ready(function () {
        $('#toggle_nav').on('click', function () {
            $("#nav_burger").toggleClass("is-active");
            $(".nav_links").toggleClass("menu_active");
        });
    });
</script>