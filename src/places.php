<?php
class Place
{
    private $location;
    private $date;

    function __construct($location,$date)
    {
        $this->location = $location;
        $this->date = $date;
    }

    function getLocation()
    {
        return $this->location;
    }

    function getDate()
    {
        return $this->date;
    }

    function save()
    {
        array_push($_SESSION['list_of_places'], $this);
    }

    static function getAll()
    {
        return $_SESSION['list_of_places'];
    }

}


?>
