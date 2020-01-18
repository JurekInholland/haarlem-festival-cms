<?php
abstract class Controller {
    

    // abstract public static function getHead();

    // Prettier redirect
    public static function redirect($path) {
        return header("Location: /{$path}");
    }

    // Controllers 'view' Views... 
    public static function view(string $viewName, array $data = []) {
        // die(var_dump($data));

        // Extract data array to template variables
        extract($data);

        require "../src/views/partials/head.php";

        if (is_file($head)) {
            require $head;
        }

        require "../src/views/modals/loginModal.php";
        require "../src/views/modals/registerModal.php";

        require "../src/views/partials/header.php";
        require "../src/views/partials/breadcrumbs.php";
        require "../src/views/partials/pageContent.php";

        // Require the requested view
        require "../src/views/{$viewName}.php";

        // // Include page footer
        require "../src/views/partials/footer.php";

        session_unset();
    }
}