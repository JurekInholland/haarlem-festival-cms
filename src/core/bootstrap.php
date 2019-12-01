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

    } else if (is_file('../src/core/database/' . $class . '.php')) {
        include_once '../src/core/database/' . $class . '.php';
    }
});

// App::bind("query", new Queries());

$config = parse_ini_file("../src/config.ini", true);
App::bind("db", new QueryBuilder(
    Connection::make($config)
));


// require_once "../src/controllers/IndexController.php";


$greeting = "ASD";

function sayGreeting() {
    var_dump("helloooo");
}