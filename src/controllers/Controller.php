<?php
abstract class Controller {
    

    // Prettier redirect
    public static function redirect($path) {
        return header("Location: /{$path}");
    }

    // 'View a view'... 
    public static function view(string $viewName, array $data = []) {
        
        // Extract data array to template variables
        extract($data);

        // Include html head and navigation
        require "../src/views/partials/head.php";
        require "../src/views/partials/header.php";

        // Require the requested view
        require "../src/views/{$viewName}.php";

        // // Include page footer
        require "../src/views/partials/footer.php";

        session_unset();
    }
}