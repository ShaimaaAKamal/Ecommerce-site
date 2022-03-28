<?php
class forwardRoute {
    
    public function account()
    {
        header("location:../views/account.php");
        die;
    }
    public function index()
    {                   
        header("location:../views/index.php");
        die;
    }
}
?>