<?php
/**
 * Created by PhpStorm.
 * User: helena
 * Date: 8/11/17
 * Time: 11:24 AM
 */

error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once $_SERVER['DOCUMENT_ROOT'].'/Vaulty/Core/Autoload.php';
class DownloadController
{
    public static function countDownloads($file){

        try{
            $db=new Database();
            $db->insert_row("update asset set downloaded=downloaded+1 where reference=:file", array('file'=>$file));

        }catch (Exception $e){
            echo $e->getMessage();
        }
    }

    public static function forceDownload($file)
    {

        ignore_user_abort(true);
        set_time_limit(0); // disable the time limit for this script

        $path = $_SERVER["DOCUMENT_ROOT"] . "/Vaulty/uploads/"; // change the path to fit your websites document structure

        $dl_file = preg_replace("([^\w\s\d\-_~,;:\[\]\(\).]|[\.]{2,})", '', $file); // simple file name validation
        $dl_file = filter_var($dl_file, FILTER_SANITIZE_URL); // Remove (more) invalid characters
        $fullPath = $path . $dl_file;

        if ($fd = fopen($fullPath, "r")) {
            $fsize = filesize($fullPath);
            $path_parts = pathinfo($fullPath);
            $extension = strtolower($path_parts["extension"]);
            switch ($extension) {
                case "pdf":
                    header("Content-type: application/pdf");
                    header("Content-Disposition: attachment; filename=\"" . $path_parts["basename"] . "\""); // use 'attachment' to force a file download
                    break;
                // add more headers for other content types here
                default;
                    header("Content-type: application/octet-stream");
                    header("Content-Disposition: filename=\"" . $path_parts["basename"] . "\"");
                    break;
            }
            header("Content-length: $fsize");
            header("Cache-control: private"); //use this to open files directly
            while (!feof($fd)) {
                $buffer = fread($fd, 2048);
                echo $buffer;
            }
        }
        fclose($fd);
        exit;
    }

}
