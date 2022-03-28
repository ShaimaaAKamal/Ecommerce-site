<?php
class errorHandler{
    public static function displayLoginError($key,$value,$page,$request){
        $_SESSION[$key]= $value;
        $_SESSION['request'] = $request;
        header("location:../views/$page");
        die;
    }
    public static function displayMailError($key,$value,$page,$request){
        $_SESSION['message']['errors']['mail'][$key]= $value;
        $_SESSION['request'] = $request;
        header("location:../views/$page");
        die;
    }
    // public static function displayValidationError($key,$value,$page,$request){
    //     $_SESSION['message']['errors'][$key]= $value;
    //     $_SESSION['request'] = $request;
    //     header("location:../views/$page");
    //     die;
    // }
}
?>