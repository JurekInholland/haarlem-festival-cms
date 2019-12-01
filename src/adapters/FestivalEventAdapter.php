<?php

class FestivalEventAdapter {

    public function fromForms($post) {
        // ... TODO implement

        return new FestivalEvent($post);
    }


    public function fromDb($slug) {
        // .. TODO implement

        $params = [
            "select" => ["*"],
            "from" => "events",
            "where" => "slug",
            "target" => $slug
        ];

        $res = App::get("db")->select($params);
        $event = new FestivalEvent($res);

        var_dump($event);
        return $event;
    }
}