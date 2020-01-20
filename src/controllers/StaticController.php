<?php

// Controller for static pages like contact, about etc. as well as placeholders
// during development

class StaticController extends Controller {


    // TODO: Implement
    public function indexNew() {
        // get array of static pages
        // if Request::uri() is in static pages
        // view placeholder page with replaced values
    }

    public function index() {

        $pages = PagesService::getPages();

        foreach ($pages as $page) {
            if ($page->getSlug() == Request::uri()) {
                
                return self::view("partials/staticPage", ["page" => $page]);
            }
        }


        switch (Request::uri()) {

            case "":
                return $this->view("homepage/index");
        }

        return self::notFound();

    }

    public static function notFound() {
        return self::view("404");
    }

    public static function notAuthorized() {
        return self::view("admin/partials/noPermissions");
    }

    public static function notLoggedIn() {
        return self::view("partials/notlogged");
    }
    

}