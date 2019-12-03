<?php

abstract class GeneralEvent {

    protected $startDate;
    protected $endDate;
    protected $location;
    protected $locationDetail;
    protected $actor;
    protected $slots;
    protected $price;
    


    protected $property;

    public function __construct($property)
    {
        $this->property = $property;
    }


}