<?php
/**
 * Created by PhpStorm.
 * User: helena
 * Date: 8/11/17
 * Time: 2:28 PM
 */

error_reporting(E_ALL);
ini_set('display_errors', 1);

class test{
    public static $a;
    public $b;
}

$c=new test();
$c::$a="majmun";

$d=new test();
$d::$a="banana";

test::$a="banana";


