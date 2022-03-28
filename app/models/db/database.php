<?php
class database{
    private $dbname='e-commerce';
    private $hostname='localhost';
    private $user='root';
    private $password='';
    private $connect;

    function __construct(){
        $this->connect=new mysqli($this->hostname,$this->user,$this->password,$this->dbname);
        if($this->connect->connect_error)
            die("Connection to database is faild.Error is " .$this->connect->connect_error);
    }
     
    public function runDML($query){
     $res=$this->connect->query($query);
     if($res) return true;
     else return false;
    }

    public function runDQL($query){
        $res=$this->connect->query($query);
        if($res->num_rows >0) 
        return $res;
        else return [];
    }
}

?>