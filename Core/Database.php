<?php
/**
 * Created by PhpStorm.
 * User: helena
 * Date: 8/11/17
 * Time: 11:24 AM
 */

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once ('config.php');

/**
 * Class Database
 */
class Database
{
    private static $instance = NULL;
    public function __construct() {}
    private function __clone() {}
    /**
     * @return null|PDO
     */
    public static function getInstance() {
        if (!isset(self::$instance)) {
            try {
                $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
                self::$instance = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASS, $pdo_options);
            }
            catch (PDOException $exception){
                throw new Exception( $exception->getMessage( ) , (int)$exception->getCode( ) );
            }
        }
        return self::$instance;
    }

    function __destruct(){}
    /**
     * @param $sql
     * @param $params
     * @return mixed
     */
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
    /**
     * @param $sql
     * @return array
     */
    public function query_execute($sql){

        $db=Database::getInstance();

        $stmt=$db->prepare($sql);

        try{
            $stmt->execute();
        }catch (Exception $e){
            die($e->getMessage());
        }
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    /**
     * @param $sql
     * @param $params
     */
    public function insert_row($sql, $params){

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

