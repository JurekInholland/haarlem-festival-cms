<?php
abstract class Controller {
    
    protected static $htmlHead;

    // abstract public static function getHead();

    // Prettier redirect
    public static function redirect($path) {
        return header("Location: /{$path}");
    }


    // Controllers 'view' Views... 
    public static function view(string $viewName, array $data = []) {
        
        // Extract data array to template variables
        extract($data);

        // Include category specifc html head
        $customHead = self::$htmlHead;
        
        require "../src/views/partials/head.php";

        require "../src/views/homepage/loginModal.php";
        require "../src/views/homepage/registerModal.php";

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