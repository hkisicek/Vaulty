<?php
/**
 * Created by PhpStorm.
 * User: helena
 * Date: 8/11/17
 * Time: 11:25 AM
 */

error_reporting(E_ALL);
ini_set('display_errors', 1);

class Hash
{
    /**
     * @param $password
     * @return bool|string
     */
    public static function createHash($password){

        $pass = password_hash($password, PASSWORD_BCRYPT);
        return $pass;
    }
    /**
     * @param $qtd
     * @return null|string
     */
    public static function generateCode($qtd){

        $caracteres = 'ABCDEFGHIJKLMOPQRSTUVXWYZ0123456789/()?=!"$%&*';
        $quantidadeCaracteres = strlen($caracteres);
        $quantidadeCaracteres--;
        $hash = NULL;

        for ($x = 1; $x <= $qtd; $x++) {
            $posicao = rand(0, $quantidadeCaracteres);
            $hash .= substr($caracteres, $posicao, 1);
        }

        return $hash;
    }
    /**
     * @param $password
     * @param $hash
     * @return bool
     */
    public static function verifyHash($password, $hash){

        return password_verify($password,$hash);
    }

    public static function createFileCode()
    {
        $date = (string)date('YmdHis');
        $code=self::generateCode(5);
        $result=$date.$code;

        return $result;
    }
}
