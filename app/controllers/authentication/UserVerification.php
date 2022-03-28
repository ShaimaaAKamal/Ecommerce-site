<?php
include_once __DIR__."/../../models/User.php";
include_once __DIR__."/../SessionConstruct.php";
include_once __DIR__."/../../requests/requestvalidate.php";
class userVerificationAuthentication extends sess{
    const verified = 1;
    const notverified = 0;
    public function verify_get($request)
    {
        $emailverification = new requestValidate;
        $res = $emailverification->verifymail($request);
        if ($res)
        {
        if(isset($request['forgetpage']))
        header("location:../views/verify.php?email=" . $request['email']."&forgetpage=1");
        else
        header("location:../views/verify.php?email=" . $request['email']);
        }
        else
            header("location:../views/errors/404.php");
    }
    public function verify_post($request)
    {
        $emailverification = new requestValidate;
        $res = $emailverification->verifymail($request);
        if ($res) {
            $userData = $res->fetch_object();
                if ($userData->code == $request['code']) {
                    $user = new User;
                    if(!isset($request['forgetpage']))
                 {   $user->setStatus(self::verified);
                    $user->setEmail($request['email']);
                    $updateStatus = $user->updateStatus();
                    if ($updateStatus) {
                        $userData->status = self::verified;
                        $_SESSION['user'] = $userData;
                        header("location:../views/index.php");
                        die;
                    } else {
                        $_SESSION['message']['errors'] = ['something' => "<div class='alert alert-danger'> SomeThing Went wrong </div>"];
                        $_SESSION['request'] = $request;
                        header("location:../views/verify.php?email={$request['email']}");
                        die;
                    }}
                    else{
                        header("location:route.php?forgetpasswordEmail=".$request['email']);
                        die;
                    }
                } else {
                    $_SESSION['message']['errors'] = ['wrong-code' => "<div class='alert alert-danger'> Wrong Code </div>"];
                    $_SESSION['request'] = $request;
                    header("location:../views/verify.php?email={$request['email']}");
                    die;
                }
              
            
        } else
            header("location:../views/errors/404.php");
        die;
    }
}
?>