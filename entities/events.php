<?php
/**
 * Created by PhpStorm.
 * User: macbook
 * Date: 3/27/18
 * Time: 12:11
 */
class event {
    private $eventname;
    private $date;
    private $duration;
    private $starttime;
    private $endtime;
    private $category;
    public function __construct($eventname , $date , $duration , $starttime , $endtime ,$category){
        $this->setEventname($eventname);
        $this->setDate($date);
        $this->setDuration($duration);
        $this->setStarttime($starttime);
        $this->setEndtime($endtime);
        $this->setCategory($category);
    }
    public function __construct2($eventname ){

        $this->setEventname($eventname);

    }
    public function getCategory(){
        return $this->category;
    }
    public function setCategory($category){
        $this->category = $category;
    }
    public function getEventname(){
        return $this->eventname;
    }
    public function setEventname($eventname){
        $this->eventname = $eventname;
    }
    public function getDate(){
        return $this->date;
    }
    public function setDate($date){
        $this->date = $date;
    }
    public function getDuration(){
        return $this->duration;
    }
    public function setDuration($duration){
        $this->duration = $duration;
    }
    public function getStarttime(){
        return $this->starttime;
    }
    public function setStarttime($starttime){
        $this->starttime = $starttime;
    }

    public function getEndtime(){
        return $this->endtime;
    }

    public function setEndtime($endtime)
    {
        $this->endtime = $endtime;
    }

}