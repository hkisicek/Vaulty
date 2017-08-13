<?php
/**
 * Created by PhpStorm.
 * User: helena
 * Date: 8/11/17
 * Time: 2:28 PM
 */

error_reporting(E_ALL);
ini_set('display_errors', 1);

// the message
$msg = "First line of text\nSecond line of text";

// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,70);

// send email
mail("someone@example.com","My subject",$msg);

