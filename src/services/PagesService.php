<?php

class PagesService {
    public static function getPages() {
        $sql = "SELECT * FROM static_pages";

        $allPages = App::get("db")->query($sql);
        return $allPages;
    }

    public static function getPageBySlug(string $slug) {
        $sql = "SELECT * FROM static_pages WHERE slug = :slug";
        $params = [":slug" => $slug];

        $page = App::get("db")->query($sql, $params);
        return $page;
    }

}