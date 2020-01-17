<?php

class PagesService {
    public static function getPages() {
        $sql = "SELECT * FROM static_pages ORDER BY slug";

        $allPages = App::get("db")->query($sql);

        $models = [];
        foreach ($allPages as $pagedata) {
            $page = new StaticPage($pagedata);
            array_push($models, $page);
        }
        return $models;
    }

    public static function getPageBySlug(string $slug) {
        $sql = "SELECT * FROM static_pages WHERE slug = :slug";
        $params = [":slug" => $slug];

        $page = App::get("db")->query($sql, $params);
        return new StaticPage($page[0]);
    }

    public static function deletePage($pageId) {
        $sql = "DELETE FROM static_pages WHERE id = :id";
        $params = [":id" => $pageId];
        App::get("db")->query($sql, $params);
    }

    public static function updatePage($pagedata) {
        extract($pagedata);
        $sql = "INSERT INTO static_pages (slug, headline, content, edited, menu)
                VALUES (:slug, :headline, :content, :edited, :menu)
                ON DUPLICATE KEY UPDATE slug=VALUES(slug), headline=VALUES(headline), 
                content=VALUES(content), edited=VALUES(edited), menu=VALUES(menu)";
    
        $params = [":slug" => $slug, ":headline" => $headline, ":content" => $content, ":edited" => date('Y-m-d H:i:s'), "menu" => $menu];

        App::get("db")->query($sql, $params);
}


}