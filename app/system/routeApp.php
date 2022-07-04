<?php 

namespace System\Route;

class Route{

    protected $royalPath;
    protected $royalMethod;
    protected static $routes=[];

    public function __construct(){
        
        $this->royalPath = $_SERVER ['REQUEST_URI'];
        $this->royalMethod = $_SERVER['REQUEST_METHOD'];
        $this->startRoutes();
    }

    public static function get($link, $path, $auth=false){
        self::$routes[] = ['GET', $link, $path, $auth];
    }

    public static function post($link, $path, $auth=false){
        self::$routes[] = ['POST', $link, $path, $auth];
    }

    public function startRoutes(){
        foreach(self::$routes as $routes){

            // echo "<pre>";
            // print_r($routes);
            // echo "</pre>";

            list($method, $link, $path, $auth) = $routes;
            $methodCheck = $this->royalMethod == $method;
            $pathCheck = preg_match("@^{$link}$@", $this->royalPath, $conclusion);

            if($methodCheck && $pathCheck){

                $royalAction = explode("/", $path);
                array_shift($royalAction);
                // print_r($royalAction);
                list($selectModul, $selectMethod) = $royalAction;

                $controller = $selectModul.'Controller';

                if(($auth == true && isset($_SESSION['user'])) || $auth == false){

                    if(file_exists($file = PATH_APP."/controller/{$controller}.php")){

                        require_once $file;

                        if(class_exists($controller)){

                            $selectClass = new $controller;

                            if(method_exists($selectClass, $selectMethod)){
                                
                                array_shift($conclusion);

                                // print_r($conclusion);
                                
                                return call_user_func_array([$selectClass,$selectMethod], array_values($conclusion));

                            }else{
                                echo "Method not found";
                                exit;
                            }

                        }else{
                            echo "Class not found";
                            exit;
                        }

                    }else{
                        echo "Controller not found";
                        exit;
                    }
                    
                }else{
                    echo "403";
                    exit;
                }
            }

        }
        
        echo "404 Not Found";
        exit;

    }
} 
?>