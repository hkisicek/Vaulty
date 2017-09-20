<?php
/**
 * Created by PhpStorm.
 * User: helena
 * Date: 8/11/17
 * Time: 11:24 AM
 */

include_once $_SERVER['DOCUMENT_ROOT'].'/Core/Autoload.php';
error_reporting(E_ALL);
/**
 * Class UploadController
 */
class UploadController
{
    /**
     *Retrieves view
     */
    public static function index()
    {
        Session::startSession();
        View::getView('upload');
    }

    /**
     *Creates directory if needed
     */
    public static function createDirAction(){

        $path=$_SERVER['DOCUMENT_ROOT']."/uploads";

        if(!is_dir($path)) {
            mkdir($path, 0777, true);
        }
    }

    /**
     *Method that handles file upload
     */
    public static function uploadAction(){

        $parameter="";

        Session::startSession();
        if(!isset($_SESSION['username'])){
            Redirect::redirectUrl('/home',$parameter);
        }

        Session::startSession();
        self::createDirAction();

        $uploadOk = 1;

        $target_dir = $_SERVER['DOCUMENT_ROOT']."/uploads/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $target_name=basename($_FILES["fileToUpload"]["name"]);

        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        $fileSize=$_FILES["fileToUpload"]["size"];

        $title=htmlentities($_POST['title']);
        $description=htmlentities($_POST['description']);
        $public=$_POST['optionsRadios'];


        // Check if file already exists
        if (file_exists($target_file)) {
            $uploadOk = 0;
            $parameter="u1";
        }

        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 1073741824) {
            $uploadOk = 0;
            $parameter="u2";
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            $parameter="u3";
        } else {

            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

                try {
                    Database::insert_row("insert into asset (asset_id, title, mime_type, size, public, user, downloaded, reference, description) values(
                default,:title,:type,:size,:public,:user,0,:reference,:description)",
                        array('title' => $title,
                            'type' => $imageFileType,
                            'size' => $fileSize,
                            'public' => $public,
                            'user' => $_SESSION['user_ID'],
                            'reference' => $target_name,
                            'description' => $description));
                    $parameter="u5";
                } catch (Exception $exception) {
                   // echo $exception->getMessage();
                    $parameter="u4";
                    $uploadOk = 0;
                }
            } else {
                $parameter="u4";
            }
        }
        Redirect::redirectUrl('/upload',$parameter);
    }
}