<?php
include_once __DIR__."/../models/User.php";
class requestValidate{
    private $email;
    private $password;
    private $confirm_password;
    private $errors;

    
    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
          */ 
    public function setEmail($email)
    {
        $this->email = $email;

    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     */ 
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * Get the value of confirm_password
     */ 
    public function getConfirm_password()
    {
        return $this->confirm_password;
    }

    /**
     * Set the value of confirm_password
     */ 
    public function setConfirm_password($confirm_password)
    {
        $this->confirm_password = $confirm_password;
    }

  public function validateEmail(){
      $pattern ="/^(?:(?:[\w\.\-_]+@[\w\d]+(?:\.[\w]{2,6})+)[,;]?\s?)+$/";
      if(empty($this->email))
        $this->errors['email']['required']="<div class='alert alert-danger text-center'>Email is required</div>";
     elseif(!preg_match($pattern,$this->email))
     $this->errors['email']['format']="<div class='alert alert-danger text-center'>This Email has wrong format</div>";
    return $this->errors;
  }
 public function validatePassword(){
     $pattern="/(?-i)(?=^.{8,}$)((?!.*\s)(?=.*[A-Z])(?=.*[a-z]))(?=(1)(?=.*\d)|.*[^A-Za-z0-9])^.*$/";
     if(empty($this->password))
     $this->errors['password']['required']="<div class='alert alert-danger text-center'>Password is required</div>";
     if(empty($this->confirm_password))
     $this->errors['password']['confirm-required']="<div class='alert alert-danger text-center'>Confirm-Password is required</div>";
     if(empty($this->errors)){
        if($this->password != $this->confirm_password)
        $this->errors['password']['equal']="<div class='alert alert-danger text-center'>Both Passwords doesn't match</div>";
        elseif(!preg_match($pattern,$this->password))
        $this->errors['password']['format']="<div class='alert alert-danger text-center'>This Password has wrong format</div>";
        
     }
    
   return $this->errors;
 }

 public function validateLoginPassword(){
    $pattern="/(?-i)(?=^.{8,}$)((?!.*\s)(?=.*[A-Z])(?=.*[a-z]))(?=(1)(?=.*\d)|.*[^A-Za-z0-9])^.*$/";
    if(empty($this->password))
    $this->errors['password']['required']="<div class='alert alert-danger text-center'>Password is required</div>";
    if(empty($this->errors)){
       if(!preg_match($pattern,$this->password))
       $this->errors['password']['format']="<div class='alert alert-danger text-center'>Invalid login please try again</div>";
      
    }
  return $this->errors;
}

public function verifymail($request){
 if($request){
    if(isset($request["email"])){
        if($request["email"]){
$user=new User;
$user->setEmail($request["email"]);
$res=$user->findEmail();
return $res;
        }
else return [];
    }
   else return [];

 }
 else return [];
}
}
?>
