<?php
/**
 * Created by PhpStorm.
 * User: helena
 * Date: 8/11/17
 * Time: 11:24 AM
 */

class Database
{
    private static $instance = NULL;

    public function __construct() {}

    private function __clone() {}

    public static function getInstance() {
        if (!isset(self::$instance)) {
            try {
                $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
                self::$instance = new PDO('mysql:host=localhost;dbname=FileVault', 'root', '123456', $pdo_options);
            }
            catch (PDOException $exception){
                throw new MyDatabaseException( $exception->getMessage( ) , (int)$exception->getCode( ) );
            }
        }
        return self::$instance;
    }

    function __destruct(){}

    //ovo isprobati!!!!
    public function execute_query($sql, $params){

        $db=Database::getInstance();

        $stmt=$db->prepare($sql);

        $params=is_array($params) ? $params :[$params];

        try{
            $stmt->execute($params);
        }catch (Exception $e){
            die($e->getMessage());
        }
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function insert_row($sql,$params){

        $db=Database::getInstance();

        $stmt=$db->prepare($sql);

        $params=is_array($params) ? $params : [$params];

        try{
            $stmt->execute($params);
        }catch (Exception $e){
            die($e->getMessage());
        }
    }

}

