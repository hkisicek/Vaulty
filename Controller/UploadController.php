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

class UploadController
{
    public static function getInfo(){

        $target_dir = $_SERVER['DOCUMENT_ROOT']."/Vaulty/uploads/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        return $imageFileType;
    }

    public static function checkType($fileType){

        $types=array("html" ,"htm","css","js","jpg","jpeg","gif","png",
            "bmp","tiff","tga","pdf","doc","txt","rtf","csv","xls",
            "ppt", "zip", "rar","gzip");

        foreach ($types as $type){
           if ($type==$fileType){

               return true;
               break;

           }else{
               return false;
           }
        }
    }

    public static function UploadFile(){

        $target_dir = $_SERVER['DOCUMENT_ROOT']."/Vaulty/uploads/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        echo $imageFileType;

        if(self::checkType($imageFileType)==false){

            $uploadOk=0;
        };

        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 1048576) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";

        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";

                $db=new Database();


            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }


}