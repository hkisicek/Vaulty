<?php
/**
 * Created by PhpStorm.
 * User: helena
 * Date: 8/16/17
 * Time: 1:36 PM
 */

class Redirect{

    /**
     * Redirects to given url
     *
     * @param $url
     */
    public static function redirectUrl($url)
    {
        if (!headers_sent())
        {
            header('Location: '.$url);
            exit;

        }else {

            echo '<script type="text/javascript">';
            echo 'window.location.href="'.$url.'";';
            echo '</script>';
            echo '<noscript>';
            echo '<meta http-equiv="refresh" content="0;url='.$url.'" />';
            echo '</noscript>'; exit;
        }
    }
}