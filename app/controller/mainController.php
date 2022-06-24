<?php 

class mainController{

    public static function view($method, $data=null){
        
        ob_start();
        if(file_exists($selectFile = PATH_APP."/view/{$method}View.php")){
            $text = require_once $selectFile;
            $text = ob_get_contents();
            ob_end_clean();
            $data = $text;
            require_once PATH_APP."/layout/mainLayout.php";
            

        }else{
            echo "View not found";
        }
       


    }

}