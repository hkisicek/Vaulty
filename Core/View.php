<?php
/**
 * Created by PhpStorm.
 * User: helena
 * Date: 8/11/17
 * Time: 11:25 AM
 */

class View
{
    /**
     * @param $name
     */
    public function getView($name)
    {
        if (file_exists($_SERVER['DOCUMENT_ROOT']).'/View/Templates/'.$name.'.phtml');
            include $_SERVER['DOCUMENT_ROOT'].'/View/Templates/'.$name.'.phtml';
    }
}

