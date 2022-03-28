<?php
include_once "SessionConstruct.php";
include_once __DIR__."/../models/Product.php";
include_once __DIR__."/../models/Category.php";

class Check extends sess{
    public function getCheck(){
        header("location:../views/checkout.php");
        die;
    }
}