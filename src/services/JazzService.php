<?php

class JazzService {

    //to show all tickets for jazz
    public static function getAll()
    {
        $sql = "SELECT * FROM festival_events WHERE `type` = 0";

        //$params = [":category" => "0"];

        //$data = App::get("db")->query($sql, $params);

        $data = App::get("db")->query($sql);

        $eventsInfo = [];

        foreach($data as $row)
        {
            //$event = array();
            /*
            $event['id'] = $row['id'];
            $event['start_date'] = $row['start_date'];
            $event['end_date'] = $row['end_date'];
            $event['address'] = $row['address'];
            $event['hall'] = $row['location_detail'];
            $event['band'] = $row['name'];
            $event['ticket'] = $row['tickets'];
            $event['price'] = $row['price'];
            $event['description'] = $row['description'];
            */
            //$jazzevent = new JazzEvent($event);
            //$eventsInfo[] = $jazzevent;
            $jazzevent = new JazzEvent($row);
            array_push($eventsInfo, $jazzevent);
        }

        return $eventsInfo;
    }

    //database method to gather specific ticket with a date.
    public static function getAllJazzPerDate($date)
    {
        $dates = ["thursday" => "27", "friday" => "28", "saturday" => "29"];
        if (array_key_exists($date, $dates)) {
            $date = $dates[$date];
        }
        //$date = 27;
        //date is passed on to be recived when a method is called.
        $sql = "SELECT * FROM festival_events WHERE start_date >= '2020-08-".$date." 18:00:00' AND start_date <= '2020-08-".$date." 22:00:00' AND 'type' = 0";

        //$params = [":category" => "0", ":category"=> "0"];
        
        // to check if sql is working properly.
        //var_dump($sql);
    
        $data = App::get("db")->query($sql);
        
        $eventsInfo = [];

        foreach($data as $row)
        {
            $jazzevent = new JazzEvent($row);
            array_push($eventsInfo, $jazzevent);
        }
        return $eventsInfo;
    }

    public static function SpecificTicket($id = 1)
    {
        // the id = 1 is to prevent errors
        $sql = "SELECT id, type, name, price FROM festival_events WHERE id = '".$id."' ";

        //$params = [":category" => "0"];

        //$data = App::get("db")->query($sql, $params);
        
        $data = App::get("db")->query($sql);

        $jazzevent = new JazzEvent($data[0]);
        
        return $jazzevent;
        //$eventsInfo = [];
        
        /*
        foreach($data as $row)
        {
            $jazzevent = new JazzEvent($row);
            array_push($eventsInfo, $jazzevent);
        }
        return $eventsInfo;
        */
    }
    //this is to show all the ticket for sunday
    public static function sundayTicket()
    {
        $sql = "SELECT * FROM festival_events WHERE address = 'Grote Markt'";

        //$params = [":category" => "0", ":category"=> "0"];
        
        // to check if sql is working properly.
        //var_dump($sql);
    
        $data = App::get("db")->query($sql);
        
        $eventsInfo = [];

        foreach($data as $row)
        {
            $jazzevent = new JazzEvent($row);
            array_push($eventsInfo, $jazzevent);
        }
        return $eventsInfo;
    }
    // when order button is clicked when ordering a ticket
    public static function orderJazzTicket(array $jazzticket){
        //insert to shopping cart.
        $sql = "INSERT INTO TABLE";

        //$params = [":category" => "0", ":category"=> "0"];

        $data = App::get("db")->insertUpdate("jazz", $sql);

        //this needs to change.

    }
    //example
    // public static function getAll() {
    //     $sql = "SELECT * FROM events WHERE category = Jazz OR 1=1";
    //     $params = [":category" => "0"];
    //     $events = App::get("db")->query($sql, $params);
    //     $models = [];
    //     foreach ($events as $event) {
    //         // $jazzEvent = new JazzModel($event);
    //     }
    //     return $events;
    // }
}