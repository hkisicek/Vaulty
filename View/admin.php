<?php
/**
 * Created by PhpStorm.
 * User: helena
 * Date: 8/14/17
 * Time: 12:57 PM
 */
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once $_SERVER['DOCUMENT_ROOT'].'/Vaulty/Core/Autoload.php';
session_start();

$vw=new View();
$vw->getView('admin');

$db=new Database();
$result=$db->query_execute("select * from user");

echo '<table id="users" class="display">';
echo '<thead>';
echo '<tr>';
echo '<th>';

