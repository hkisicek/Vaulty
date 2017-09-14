<?php
/**
 * Created by PhpStorm.
 * User: helena
 * Date: 9/13/17
 * Time: 6:16 PM
 */

class Router
{
    protected $urls=array();
    protected $actions=array();
    protected $params=array();
    protected $router='LoginController';
    protected $method='index';

    /**
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

    function breakUri()
    {
        $url=$this->getCurrentUri();
        $splitUrl=explode('/',$url);

        return $splitUrl;
    }
    /**
     *compares predefined routes and current url
     */
    public function dispatch(){

        $url=$this->getCurrentUri();
        $arrayUri=$this->breakUri();
        $numElements=count($arrayUri);

        foreach($this->urls as $key=>$value) {
            if ($value == $url) {

                $action = explode('#', $this->actions[$key]);

                $this->router = $action[0];
                $this->method = $action[1];

                //Call controller and coresponding method

                call_user_func(array($this->router, $this->method));
            } elseif ($numElements>2) {

                $this->router = 'DownloadController';
                $this->method = 'download';

                call_user_func(array($this->router, $this->method));
            }
        }
    }
}