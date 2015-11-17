<?php
class Request
{
    public static function get($key, $default = null)
    {
        if(isset($_GET[$key])){
            return $_GET[$key];
        }
        return $default;
    }
    
    public static function post($key, $default = null)
    {
        if(isset($_POST[$key])){
            return $_POST[$key];
        }
        return $default;
    }
    
    public static function isGet()
    {
        return $_SERVER['REQUEST_METHOD'] === 'GET';
    }
    
    public static function isPost()
    {
        return $_SERVER['REQUEST_METHOD'] === 'POST';
    }
    
    public static function base_url()
    {
        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
        $path = $_SERVER['PHP_SELF'];
        $path_parts = pathinfo($path);
        $directory = $path_parts['dirname'];
        $directory = ($directory == "/") ? "" : $directory;
        $host = $_SERVER['HTTP_HOST'];
        return $protocol . $host . $directory;
    }
    public static function getBasePath()
    {
        $basePath = dirname($_SERVER['SCRIPT_NAME']);
        if(in_array($basePath, array('/', '\\'))){
            $basePath = '';
        }
        return $basePath;
    }
    public static function getURI(){
        $ru= $_SERVER["REQUEST_URI"];
        $uri=str_replace(self::getBasePath(), "", $ru);
        $res=explode("/",preg_replace('{^/|\?.*}', '', $uri));
        return $res;
    }
}
