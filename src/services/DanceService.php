<?php

class DanceService {


    // Get all 
    public static function getAll() {

        $sql = "SELECT * FROM festival_events WHERE type = :type";
        $params = [":type" => "1"];

        $results = App::get("db")->query($sql, $params);
        //create danceEvent objects and populate em with data and throw it in the following array
        $events = [];
        
        foreach($results as $row) {
            $eventProperties=array();
            $eventProperties['id']=$row['id'];
            $eventProperties['type']=$row['type'];
            $eventProperties['artist']=$row['name'];
            $eventProperties['venue']=$row['address'];
            $eventProperties['session']=$row['location_detail'];
            $eventProperties['start_date']=$row['start_date'];
            $eventProperties['end_date']=$row['end_date'];
            $eventProperties['numberTickets']=$row['tickets'];
            $eventProperties['price']=$row['price'];
            $event=new DanceEvent($eventProperties);
            $events[]=$event;
         }
        return $events;
    }
    
    public static function getAllDancePerDate($date)
    {
        $sql = "SELECT * FROM festival_events WHERE start_date >= '2020-07-".$date." 00:00:00' AND start_date <= '2020-07-".$date." 23:00:00' AND type = :type";
        $params = [":type" => "1"];

        $results = App::get("db")->query($sql, $params);
        //create danceEvent objects and populate em with data and throw it in the following array
        $events = [];
        
        foreach($results as $row) {
            $eventProperties=array();
            $eventProperties['id']=$row['id'];
            $eventProperties['type']=$row['type'];
            $eventProperties['artist']=$row['name'];
            $eventProperties['venue']=$row['address'];
            $eventProperties['session']=$row['location_detail'];
            $eventProperties['start_date']=$row['start_date'];
            $eventProperties['end_date']=$row['end_date'];
            $eventProperties['numberTickets']=$row['tickets'];
            $eventProperties['price']=$row['price'];
            $event=new DanceEvent($eventProperties);
            $events[]=$event;
         }
        return $events;
    }
    public static function getDanceParticularEvent($id) {
        $sql = "SELECT * FROM festival_events WHERE type = '1' AND id = '".$id."' ";

        $result = App::get("db")->query($sql); 
        $row = ($result[0]);
        $eventProperties=array();
        $eventProperties['id']=$row['id'];
        $eventProperties['type']=$row['type'];
        $eventProperties['artist']=$row['name'];
        $eventProperties['venue']=$row['address'];
        $eventProperties['session']=$row['location_detail'];
        $eventProperties['start_date']=$row['start_date'];
        $eventProperties['end_date']=$row['end_date'];
        $eventProperties['numberTickets']=$row['tickets'];
        $eventProperties['price']=$row['price'];
        $event=new DanceEvent($eventProperties);
        return $event;

       
    }
}