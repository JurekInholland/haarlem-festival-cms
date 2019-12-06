<?php

// Autoload classes
spl_autoload_register(function ($class) {
    if (is_file('../src/controllers/' . $class . '.php')) {
        include_once '../src/controllers/' . $class . '.php';

    } else if (is_file('../src/core/classes/' . $class . '.php')) {
        include_once '../src/core/classes/' . $class . '.php';

    } else if (is_file('../src/' . $class . '.php')) {
        include_once '../src/' . $class . '.php';

    } else if (is_file('../src/models/' . $class . '.php')) {
        include_once '../src/models/' . $class . '.php';

    } else if (is_file('../src/adapters/' . $class . '.php')) {
        include_once '../src/adapters/' . $class . '.php';

    } else if (is_file('../src/services/' . $class . '.php')) {
        include_once '../src/services/' . $class . '.php';

    } else if (is_file('../src/core/database/' . $class . '.php')) {
        include_once '../src/core/database/' . $class . '.php';
    }
});

// Set correct time zone
date_default_timezone_set('Europe/Amsterdam');

// Load sql credentials from config.ini
$config = parse_ini_file("../src/config/config.ini", true);

// From now on, db can be accessed via App::get("db)
App::bind("db", new QueryBuilder(
    Connection::make($config)
));


// Static festival data like start and end dates. This could be stored in database as well..
// App::bind("festival", parse_ini_file("../src/config/festival.ini", true));

$fest = new FestivalService();
$festival = $fest->getFestival();
// die(var_dump($festival));
App::bind("festival", $fest->getFestival());
