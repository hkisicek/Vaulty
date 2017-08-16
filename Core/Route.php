<?php
/**
 * Created by PhpStorm.
 * User: helena
 * Date: 8/14/17
 * Time: 9:21 AM
 */

class Route
{
    private $_uri=array();

    public function add($uri){

        $this->_uri[]=$uri;
    }

    public function submit(){

        $uriGetParams=isset($_GET['uri']) ? $_GET['uri']: '/';

        foreach ($this->_uri as $key=>$value){

            echo $value;

            if(preg_match("#^$value$#",$uriGetParams)){

                echo $value;
                echo $uriGetParams;
               // echo "match";
            }
        }
    }
}