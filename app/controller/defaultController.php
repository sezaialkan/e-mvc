<?php 

use Controller\Main\mainController;

class defaultController extends mainController{

    public function index(){
        $this->view("default");
    }

    public function attempt(){
        $this->view('attempt');
    }

    public function parameter($coming){
        $this->view('param', $coming);
    }

}