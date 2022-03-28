<?php
include_once "db/database.php";
include_once "db/operations.php";

class User extends database implements operations{
    private $id;
    private $name;
    private $phone;
    private $email;
    private $password;
    private $gender;
    private $code;
    private $status;
    private $user_type;
    private $image;
    private $created_at;
    private $updated_at;


    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */ 
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     */ 
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Get the value of phone
     */ 
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set the value of phone
     */ 
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

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
        $this->password = sha1($password);
    }

    /**
     * Get the value of gender
     */ 
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set the value of gender
          */ 
    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    /**
     * Get the value of code
     */ 
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set the value of code
     */ 
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * Get the value of status
     */ 
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     */ 
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * Get the value of user_type
     */ 
    public function getUser_type()
    {
        return $this->user_type;
    }

    /**
     * Set the value of user_type
     */ 
    public function setUser_type($user_type)
    {
        $this->user_type = $user_type;;
    }

    /**
     * Get the value of image
     */ 
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set the value of image
     */ 
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * Get the value of created_at
     */ 
    public function getCreated_at()
    {
        return $this->created_at;
    }

    /**
     * Set the value of created_at
     */ 
    public function setCreated_at($created_at)
    {
        $this->created_at = $created_at;
    }

    /**
     * Get the value of updated_at
     */ 
    public function getUpdated_at()
    {
        return $this->updated_at;
    }

    /**
     * Set the value of updated_at
     */ 
    public function setUpdated_at($updated_at)
    {
        $this->updated_at = $updated_at;

    }
    public function insert(){
        $query="insert into `users`(`name`,`phone`,`password`,`email`,`gender`,`code`) values ('$this->name','$this->phone','$this->password','$this->email','$this->gender','$this->code')";
        $res=$this->runDML($query);
        return $res;
    }
    public function select(){
        $query="select * from `users`;";
        $data=$this->runDQL($query);
         return $data;
    }
    public function findEmail(){
        $query="select * from `users` where email='$this->email';";
        $data=$this->runDQL($query);
         return $data;
    }
    public function findPhone(){
        $query="select * from `users` where phone='$this->phone';";
        $data=$this->runDQL($query);
         return $data;
    }
    public function updateStatus(){
        $query="update `users` set `users`.`status`= $this->status where `users`.`email`='$this->email';";
        $data=$this->runDML($query);
         return $data;
    }
    public function updateCode(){
        $query="update `users` set `users`.`code`= $this->code where `users`.`email`='$this->email';";
        $data=$this->runDML($query);
         return $data;
    }
    public function updatePassword(){
        $query="update `users` set `users`.`password`= '$this->password'where `users`.`email`='$this->email';";
        $data=$this->runDML($query);
         return $data;
    }
   
    public function update(){
        $query="update `users` set `name`='$this->name' ,  `image`='$this->image' ,  `gender`='$this->gender' , `email`='$this->email' where  `id`='$this->id'";
        return ($this->runDML($query));

    }
    public function delete(){

    }
}


?>