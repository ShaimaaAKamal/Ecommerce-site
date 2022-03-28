<?php
include_once __DIR__."/../../models/User.php";
include_once __DIR__."/../SessionConstruct.php";
include_once __DIR__."/../../mails/Verification.php";
include_once __DIR__."/../../requests/requestvalidate.php";
include_once __DIR__."/../ErrorHandler.php";


class loginAuthentication extends sess
{
    const verified = 1;
    const notverified = 0;
    public function logout()
    {
        session_unset();
        session_destroy();
        header("location:../views/index.php");
        die;
    }
    public function login_get()
    {
        header("location:../views/login.php");
        die;
    }
    public function emailValidate($request){
        $Validation = new requestValidate;
        $Validation->setEmail($request['email']);
        return  ($Validation->validateEmail());
    }
    public function passwordLoginValidate($request){
        $Validation = new requestValidate;
        $Validation->setPassword($request['password']);
        return ($Validation->validateLoginPassword());
    }
    public function sendVerificationMail($code,$request){
        $subject = "Verification Code";
        $body = "Your verification code is $code";
        $mailVerification = new Verification;
        return ($mailVerification->sendmail($request['email'], $subject, $body));
    }
    public function checkUserCredientials($mailExist,$request){
                $userData = $mailExist->fetch_object();
                if ($userData->password == sha1($request['password'])) {
                    if ($userData->status == self::verified) {
                        $_SESSION['user'] = $userData;
                        header("location:route.php?index=true");
                        die;
                    } else {
                           $mailSent=$this->sendVerificationMail($userData->code,$request);
                            if ($mailSent) {
                                header("location:route.php?email=" . $request['email']);
                                die;
                            } else {
                                header("location:../views/errors/500.php");
                                die;
                            }
                    }
                } else {
                    errorHandler:: displayLoginError('login-failed',"<div class='alert alert-danger text-center'> Invalid credientails can not login</div>",'login.php',$request);
                }
    }
  
    public   function login($request)
    {       
           $emailValidationResult=$this->emailValidate($request);
            $passwordValidationResult=$this->passwordLoginValidate($request);
        if (empty($emailValidationResult) and empty($passwordValidationResult)) {
            $user = new User;
            $user->setEmail($request['email']);
            $mailExist = $user->findEmail();
            if ($mailExist) {
                  $this->checkUserCredientials($mailExist,$request);
            } else {
                $message="<div class='alert alert-danger text-center'> This user is not registered Please go to <a href='../routes/route.php?register=true' style='text-decoration:underline;'>Register Page</a></div>";
                errorHandler::displayMailError('not_exist',$message,'login.php',$request);
            }
        } else {
            if ($emailValidationResult)
                $_SESSION['message']['errors']['email'] = $emailValidationResult['email'];
            if ($passwordValidationResult)
                $_SESSION['message']['errors']['password'] = $passwordValidationResult['password'];
            $_SESSION['request'] = $request;
            header("location:../views/login.php");
            die;
        }
    }
  
}
