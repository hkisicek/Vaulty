<?php
/**
 * Created by PhpStorm.
 * User: helena
 * Date: 9/13/17
 * Time: 6:16 PM
 */
include_once $_SERVER['DOCUMENT_ROOT'].'/config.php';

/**
 * Class Router
 *
 * Handles routing
 */
class Router
{
    protected $urls=array();
    protected $actions=array();
    protected $params=array();
    protected $router='LoginController';
    protected $method='index';

    /**
     * Adds routes
     *
     * @param $url
     * @param $action
     */
    public function add($url, $action)
    {
       $this->urls[]=$url;

        if(null !== $action){
            $this->actions[]=$action;
        }
    }
    /**
     * Gets the current uri
     *
     * @return bool|string
     */
    function getCurrentUri()
    {
        $basepath = implode('/', array_slice(explode('/', $_SERVER['SCRIPT_NAME']), 0, -1)) . '/';
        $uri = substr($_SERVER['REQUEST_URI'], strlen($basepath));

        if (strstr($uri, '?')) {
            $uri = substr($uri, 0, strpos($uri, '?'));
        }

        $uri = '/' . trim($uri, '/');
        return $uri;
    }

    /**
     * Explodes current uri
     *
     * @return array
     */
    function breakUri()
    {
        $url=$this->getCurrentUri();
        $splitUrl=explode('/',$url);

        return $splitUrl;
    }
    /**
     *Compares predefined routes and current url
     */
    public function dispatch(){

        $url=$this->getCurrentUri();

        foreach($this->urls as $key=>$value) {
            if ($value == $url) {

                $action = explode('#', $this->actions[$key]);

                $this->router = $action[0];
                $this->method = $action[1];

                //Call controller and coresponding method
                call_user_func(array($this->router, $this->method));
            } elseif (isset($_GET['file'])) {

                $this->router = 'DownloadController';
                $this->method = 'download';

                call_user_func(array($this->router, $this->method));
            }
        }
    }
}