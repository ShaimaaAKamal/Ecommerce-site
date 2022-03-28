<?php
include_once __DIR__."/../../models/User.php";
include_once __DIR__."/../SessionConstruct.php";
include_once __DIR__."/../../mails/Verification.php";
include_once __DIR__."/../../requests/requestvalidate.php";
class passwordRecovery extends sess{

    public function forget_password(){
        header("location:../views/forget_password.php");
        die;
      }
      public function new_password_get($request){
        header("location:../views/new_password.php?email=".$request['forgetpasswordEmail']);
        die;  
      }
      public function change_password($request){
        $emailverification = new requestValidate;
        $res = $emailverification->verifymail($request);
        if($res){
            $validate = new requestValidate;
            $validate->setPassword($request['password']);
            $validate->setConfirm_password($request['confirm-password']);
            $passwordValidation = $validate->validatePassword();
            if(empty($passwordValidation )){
                $user=new User;
                $user->setEmail($request['email']);
                $userData=$user->findEmail();
                if($userData){
                    $userDataResult=$userData->fetch_object();
                    $user->setPassword($request['password']);
                    if($user->getPassword() != $userDataResult->password){
                        $passwordupdate=$user->updatePassword();
                        if($passwordupdate){
                           header("location:route.php?login=true");die;
                        }
                        else{
                            header("location:../views/errors/500.php");die;
                        }
                    }
                    else{
                        $_SESSION['same'] = "<div class='alert alert-danger text-center'> The new password can not be the same old one </div>";
                        $_SESSION['request']=$request;
                        header("location:../views/new_password.php?email=".$request['email']);die;
                    }
                  
                }
                else{
                    header("location:../views/errors/500.php");die;
    
                }
              
            }
            else{
                $_SESSION['message']['errors'] = $passwordValidation;
                $_SESSION['request']=$request;
                header("location:../views/new_password.php?email=".$request['email']);die;
    
    
            }
        }
        else{
            header("location:../views/errors/500.php");die;
        }
      }
      public function verify_email($request){
        $Validation = new requestValidate;
        $Validation->setEmail($request['email']);
        $emailValidationResult = $Validation->validateEmail();
        if(empty($emailValidationResult)){
            $user=new User;
            $user->setEmail($request['email']);
            $userexist=$user->findEmail();
            if($userexist){
                $code = rand(10000, 99999);
                $user->setCode($code);
                $updatedUser = $user->updateCode();
                if ($updatedUser) {
                    $subject = "Verification Code";
                    $body = "Your verification code is $code";
                    $mailVerification = new Verification;
                    $mailSent = $mailVerification->sendmail($request['email'], $subject, $body);
                    if ($mailSent) {
                        header("location:route.php?email=" . $request['email']."&forgetpage=1");
                        die;
                    } else {
                        header("location:../views/errors/500.php");
                        die;
                    }
                } else {
                    header("location:../views/errors/500.php");
                    die;
                }
            }
            else{
                $_SESSION['message']['errors']['mail']['not_exist'] = "<div class='alert alert-danger text-center'>This mail doesn't exist</div>";
                $_SESSION['request'] = $request;
                header("location:../views/forget_password.php");
                die;
            }
           
        }
        else{
            $_SESSION['message']['errors'] = $emailValidationResult;
            $_SESSION['request']=$request;
            header("location:../views/forget_password.php");die;
        }
      }
}
?>