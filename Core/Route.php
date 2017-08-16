<?php
/**
 * Created by PhpStorm.
 * User: helena
 * Date: 8/14/17
 * Time: 9:21 AM
 */

abstract class Route
{
    public function __construct()
    {
        Session::startSession();
        $this->view=new View();
        $this->db=Database::getInstance();
    }

    abstract public function index();

    public function redirect($location)
    {
        if(!isset($location)){
            return;
        }

        header('Location'.$location);
    }
}