<?php
include_once __DIR__."/../../models/User.php";
include_once __DIR__."/../SessionConstruct.php";
include_once __DIR__."/../../mails/Verification.php";
include_once __DIR__."/../../requests/requestvalidate.php";

class registerAuthentication extends sess
{
    const verified = 1;
    const notverified = 0;
  
    public function emailValidate($request){
        $validate = new requestValidate;
        $validate->setEmail($request['email']);
        return ($validate->validateEmail());
    }
    public function passwordRegisterValidate($request){
        $validate = new requestValidate;
        $validate->setPassword($request['password']);
        $validate->setConfirm_password($request['confirm-password']);
        return $validate->validatePassword();
    }
    public function setUser($request){
        $user = new user;
        $user->setName($request['name']);
        $user->setPhone($request['phone']);
        $user->setPassword($request['password']);
        $user->setEmail($request['email']);
        $user->setGender($request['gender']);
        $code = rand(10000, 99999);
        $user->setCode($code);
        return $user;
    }
    public function sendVerificationmail($code,$request){
        $subject = "Verification Code";
        $body = "Your verification code is $code";
        $mailVerification = new Verification;
        return ($mailVerification->sendmail($request['email'], $subject, $body));
    }
    public function register_get()
    {
        header("location:../views/register.php");
        die;
    }
    public  function register($request)
    {
        $emailValidation=$this->emailValidate($request);
        if ($emailValidation) {
            $_SESSION['message']['errors']['email'] = $emailValidation['email'];
        }
        $passwordValidation =$this->passwordRegisterValidate($request) ;
        if ($passwordValidation) { {
                $_SESSION['message']['errors']['password'] = $passwordValidation['password'];
            }
        }
        if (isset($_SESSION['message']['errors']) and $_SESSION['message']['errors']) {
            $_SESSION['request'] = $request;
            header("location:../views/register.php");
            die;
        }
        $user=$this->setUser($request);
        $existedUser = $user->findEmail();
        $userFound = $user->findPhone();
        if (empty($existedUser) && empty($userFound)) {
            $res = $user->insert();
            if ($res) {
                $mailSent =$this->sendVerificationmail($user->getCode(),$request) ;
                if ($mailSent) {
                    header("location:route.php?email=" . $request['email']);
                    die;
                } else {
                    $_SESSION['failed-mail'] = "<div class='alert alert-danger text-center'> Somethimg went wrong while sending verification mail </div>";
                }
            } else {
                $_SESSION['failed'] = "<div class='alert alert-danger text-center'> Registeration failed </div>";
            }
        } else {
            if ($existedUser) { {
                    $_SESSION['message']['errors']['mail'] = "<div class='alert alert-danger text-center'> This mail is already registered </div>";
                }
            }
            if ($userFound) {
                $_SESSION['message']['errors']['phone'] = "<div class='alert alert-danger text-center'> This phone is already registered </div>";
            }
        }
        $_SESSION['request'] = $request;
        header("location:../views/register.php");
        die;
    }
}
?>