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

class UploadController
{
    /**
     *retrieving view
     */
    public static function index()
    {
        Session::startSession();
        View::getView('upload');
    }

    /**
     *Creates directory if needed
     */
    public static function createDir(){

        $path=$_SERVER['DOCUMENT_ROOT']."/uploads";

        if(!is_dir($path)) {
            mkdir($path, 0777, true);
        }
    }

    /**
     *Method that handles file upload
     */
    public static function uploadFile(){

        if(!isset($_SESSION['username'])){
            Redirect::redirectUrl('/home');
        }

        Session::startSession();
        $reference=Hash::createFileCode();
        self::createDir();

        $uploadOk = 1;

        $target_dir = $_SERVER['DOCUMENT_ROOT']."/uploads/";
      //  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $target_file = $target_dir . $reference;
        $target_name=basename($_FILES["fileToUpload"]["name"]);

        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        echo $imageFileType;
        $fileSize=$_FILES["fileToUpload"]["size"];

        $title=htmlentities($_POST['title']);
        $description=htmlentities($_POST['description']);
        $public=$_POST['optionsRadios'];


        // Check if file already exists
        if (file_exists($target_file)) {

            echo "<div class=\"alert alert-danger\"><strong>Sorry, file already exists.</strong></div>";
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 1073741824) {

            echo "<div class=\"alert alert-danger\"><strong>Sorry, your file is too large.</strong></div>";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {

            echo "<div class=\"alert alert-danger\"><strong>Sorry, your file was not uploaded.</strong></div>";

        } else {

            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

                echo "<div class=\"alert alert-info\" style='bottom: 0;'><strong>The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.</strong></div>";

                try{
                    Database::insert_row("insert into asset (asset_id, title, mime_type, size, public, user, downloaded, reference, description) values(
                default,:title,:type,:size,:public,:user,0,:reference,:description)",
                        array('title'=>$title,
                            'type'=>$imageFileType,
                            'size'=>$fileSize,
                            'public'=>$public,
                            'user'=>'7',
                            'reference'=>$reference,
                            'description'=>$description));
                }

                catch (Exception $exception){
                    echo $exception->getMessage();
                    $uploadOk=0;
                }
            } else {

                echo "<div class=\"alert alert-danger\"><strong>Sorry, there was an error uploading your file.</strong></div>";
            }
        }

        Redirect::redirectUrl('/upload');
    }
}