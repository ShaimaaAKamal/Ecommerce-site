<?php
include_once "SessionConstruct.php";
include_once __DIR__."/../models/Product.php";
include_once __DIR__."/../models/Category.php";
include_once __DIR__."/../mails/Verification.php";

class Contact extends sess{
    public function send($request){
        if(empty($request['name']))
        $_SESSION['data']['name']="<div class='alert alert-danger text-center '>Name is required</div>";
        if(empty($request['subject']))
        $_SESSION['data']['subject']="<div class='alert alert-danger text-center '>Subject is required is required</div>";
        if(empty($request['email']))
        $_SESSION['data']['email']="<div class='alert alert-danger text-center'>Email is required</div>";
        if(empty($request['message']))
        $_SESSION['data']['messag']="<div class='alert alert-danger text-center'>Message is required</div>";

        if(empty( $_SESSION['data'])){
            $subject = $request['subject'];
            $body="User (". $request['name'].") has sent that feedback message:( " ;
            $body .= $request['message'].") and you can contact with him via that Email: ( ".$request['email'].")";
            $mailVerification = new Verification;
            $feed=$mailVerification->sendfeed($subject, $body);
            if($feed){
                $_SESSION['success'] = "<div class='alert alert-success text-center'>Your feedback has been sent</div>";
            }
            else{
                $_SESSION['failed'] = "<div class='alert alert-danger text-center'>Your feedback has not been sent</div>";
    
            }
        }
     
        header("location:../views/contact_us.php");die;
       
    }
}