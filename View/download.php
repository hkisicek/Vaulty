<?php
/**
 * Created by PhpStorm.
 * User: helena
 * Date: 8/13/17
 * Time: 5:12 PM
 */

error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once $_SERVER['DOCUMENT_ROOT'].'/Vaulty/Core/Autoload.php';

$vw=new View();
$vw->getView('download');

$db=new Database();
$result=$db->query_execute("select * from asset");

echo '<table id="files" class="display">';
echo '<thead>';
echo '<tr>';
echo '<th>Title</th><th>Type</th><th>Size</th><th>Description</th><th>Downloads</th><th>Download Link</th>';
echo '</tr>';
echo '</thead>';
echo '<tbody>';
foreach ($result as $item){
    echo '<tr>';
    echo '<td>'.$item['title'].'</td><td>'.$item['mime_type'].'</td><td>'.$item['size'].'</td><td>'.$item['description'].'</td><td>'.$item['downloaded'].'</td><td>Link</td>';
    echo '</tr>';
}
echo '<tbody>';
echo '</table>';