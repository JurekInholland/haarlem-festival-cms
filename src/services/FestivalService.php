
<?php

class FestivalService {


    public static function getFestival() {

        $sql = "SELECT * FROM event_categories, festival_info";
        $festivalInfo = App::get("db")->query($sql);

        $categories = [];
        foreach ($festivalInfo as $categoryInfo) {
            $category = new FestivalCategory([
                "name" => $categoryInfo["category"],
                "color" => $categoryInfo["color"],
                "slug" => $categoryInfo["slug"],
                "id" => $categoryInfo["id"]
            ]);
            array_push($categories, $category);
        }

        $festivalInfo = ["start_date" => $festivalInfo[0]["start_date"],
                         "end_date" => $festivalInfo[0]["end_date"],
                         "categories" => $categories
                        //  "locations" => $locations
                        ];

        $festival = new Festival($festivalInfo);
        return $festival;
    }


    public static function getLocations() {
        $sql = "SELECT * FROM event_locations";

        $locations = App::get("db")->query($sql);

        $result = [];
        foreach ($locations as $key => $location) {
            $eventLocation = new EventLocation($location);
            array_push($result, $eventLocation);
        }
        return $result;
    }
}