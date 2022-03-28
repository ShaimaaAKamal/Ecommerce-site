<?php
include_once "db/database.php";
include_once "db/operations.php";
class Order extends database implements operations{
    private $id;
    private $code;
    private $status;
    private $delivered_at;
    private $created_at;
    private $updated_at;
    private $address_id;
    private $user_id;
    private $copoun_id;


    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;


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
     *
     * @return  self
     */ 
    public function setStatus($status)
    {
        $this->status = $status;


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
     *
     * @return  self
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
     *
     * @return  self
     */ 
    public function setUpdated_at($updated_at)
    {
        $this->updated_at = $updated_at;


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
     *
     * @return  self
     */ 
    public function setCode($code)
    {
        $this->code = $code;


    }

    /**
     * Get the value of delivered_at
     */ 
    public function getDelivered_at()
    {
        return $this->delivered_at;
    }

    /**
     * Set the value of delivered_at
     *
     * @return  self
     */ 
    public function setDelivered_at($delivered_at)
    {
        $this->delivered_at = $delivered_at;


    }

    /**
     * Get the value of address_id
     */ 
    public function getAddress_id()
    {
        return $this->address_id;
    }

    /**
     * Set the value of address_id
     *
     * @return  self
     */ 
    public function setAddress_id($address_id)
    {
        $this->address_id = $address_id;


    }

    /**
     * Get the value of user_id
     */ 
    public function getUser_id()
    {
        return $this->user_id;
    }

    /**
     * Set the value of user_id
     *
     * @return  self
     */ 
    public function setUser_id($user_id)
    {
        $this->user_id = $user_id;


    }

    /**
     * Get the value of copoun_id
     */ 
    public function getCopoun_id()
    {
        return $this->copoun_id;
    }

    /**
     * Set the value of copoun_id
     *
     * @return  self
     */ 
    public function setCopoun_id($copoun_id)
    {
        $this->copoun_id = $copoun_id;


    }
    public function insert(){

    }
     public function update(){
 
     }
     public function delete(){
 
     }
     public function select(){
 
     }
}
?>