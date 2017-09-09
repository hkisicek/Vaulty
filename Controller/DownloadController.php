<?php
/**
 * Created by PhpStorm.
 * User: helena
 * Date: 8/11/17
 * Time: 11:24 AM
 */

include_once $_SERVER['DOCUMENT_ROOT'].'/Core/Autoload.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

class DownloadController
{
    /**
     * @param $file
     */
    public static function countDownloads($file)
    {
        try {
            $db=new Database();
            $db->insert_row("update asset set downloaded=downloaded+1 where reference=:file", array('file'=>$file));

        } catch (Exception $e){
            $e->getMessage();
        }
    }
    /**
     * @param $file
     */
    public static function forceDownload($file)
    {
        $targetFile = $_SERVER['DOCUMENT_ROOT']."/uploads/".$file;
        if (!file_exists($targetFile)) {
            die("Sorry, file doesn't exist. :(");
        }

        ignore_user_abort(true);
        set_time_limit(0);

        $path = $_SERVER["DOCUMENT_ROOT"] . "/uploads/";
        $dl_file = preg_replace("([^\w\s\d\-_~,;:\[\]\(\).]|[\.]{2,})", '', $file);
        $dl_file = filter_var($dl_file, FILTER_SANITIZE_URL);
        $fullPath = $path . $dl_file;

        try{
        if ($fd = fopen($fullPath, "r")) {

            $fsize = filesize($fullPath);
            $path_parts = pathinfo($fullPath);
            $extension = strtolower($path_parts["extension"]);

            switch ($extension) {
                case "pdf":
                    header("Content-type: application/pdf");
                    header("Content-Disposition: attachment; filename=\"" . $path_parts["basename"] . "\"");
                    break;
                // add more headers for other content types here
                default;
                    header("Content-type: application/octet-stream");
                    header("Content-Disposition: filename=\"" . $path_parts["basename"] . "\"");
                    break;
            }

            header("Content-length: $fsize");
            header("Cache-control: private");

            while (!feof($fd)) {
                $buffer = fread($fd, 2048);
                echo $buffer;
            }
        }
        fclose($fd);
        exit;

        }catch (Exception $e){
            $e->getMessage();
        }
    }
}
