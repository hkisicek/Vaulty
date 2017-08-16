<?php
/**
 * Created by PhpStorm.
 * User: helena
 * Date: 8/11/17
 * Time: 11:24 AM
 */
if(session_status()===PHP_SESSION_NONE){
    session_start();
}
include_once $_SERVER['DOCUMENT_ROOT'].'/Vaulty/Core/Autoload.php';

class UploadController
{

    public static function UploadFile(){

        $uploadOk = 1;

        $target_dir = $_SERVER['DOCUMENT_ROOT']."/Vaulty/uploads/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $target_name=basename($_FILES["fileToUpload"]["name"]);

        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        echo $imageFileType;
        $fileSize=$_FILES["fileToUpload"]["size"];

        $title=htmlentities($_POST['title']);
        $description=htmlentities($_POST['description']);
        $public=$_POST['optionsRadios'];

        if(self::checkType($imageFileType)==false){
            $uploadOk=0;
        };

        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 1073741824) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {

            echo "Sorry, your file was not uploaded.";

        } else {

            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";

                try{
                    $db=new Database();
                    $db->insert_row("insert into asset (asset_id, title, mime_type, size, public, user, downloaded, reference, description) values(
                default,:title,:type,:size,:public,:user,0,:reference,:description)",
                        array('title'=>$title,
                            'type'=>$imageFileType,
                            'size'=>$fileSize,
                            'public'=>$public,
                            'user'=>$_SESSION['user_ID'],
                            'reference'=>$target_name,
                            'description'=>$description));
                }

                catch (Exception $exception){
                    echo $exception->getMessage();
                    $uploadOk=0;
                }
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
}