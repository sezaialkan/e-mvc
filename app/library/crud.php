<?php

session_start();

class crud{

    private $db;
    private $vthost = VTHOST;
    private $vtuser = VTUSER;
    private $vtpassword = VTPASSWORD;
    private $vtname = VTNAME;

    
    public function __construct(){
        
        try{

            $this->db = new PDO('mysql:host='.$this->vthost.';dbname='.$this->vtname.';charset=utf8', $this->vtuser, $this->vtpassword);

            // echo "Database connect success";

        }catch(Exception $e){

            die('Database connect error : '. $e->getMessage());

        }
        
    }

}