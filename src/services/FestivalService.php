
<?php

class FestivalService {


    public static function getFestival() {
        $params = [
            "select" => ["*"],
            "from" => "event_categories, festival_info"
        ];

        $festivalInfo = App::get("db")->select($params);

        $categories = [];
        foreach ($festivalInfo as $categoryInfo) {
            $category = new FestivalCategory([
                "name" => $categoryInfo["category"],
                "color" => $categoryInfo["color"],
                "slug" => $categoryInfo["slug"]
            ]);
            array_push($categories, $category);
        }

        $festivalInfo = ["start_date" => $festivalInfo[0]["start_date"],
                         "end_date" => $festivalInfo[0]["end_date"],
                         "categories" => $categories];

        $festival = new Festival($festivalInfo);
        return $festival;
    }
}