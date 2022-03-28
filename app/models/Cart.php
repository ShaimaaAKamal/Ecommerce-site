<?php
include_once "db/database.php";
include_once "db/operations.php";
class Cart extends database implements operations{
    private $user_id;
    private $product_id;
    private $quantity;


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
     * Get the value of product_id
     */ 
    public function getProduct_id()
    {
        return $this->product_id;
    }

    /**
     * Set the value of product_id
     *
     * @return  self
     */ 
    public function setProduct_id($product_id)
    {
        $this->product_id = $product_id;

    }

    /**
     * Get the value of quantity
     */ 
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set the value of quantity
     *
     * @return  self
     */ 
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

    }
    public function getdata(){
        $query="select `products`.`name_en` as product_name ,`products`.`id` as product_id ,`products`.`price`,
        `cart`.`quantity`,`cart`.`user_id`,`products`.`price` * `cart`.`quantity` as total_price
        from `products` join `cart`
        on `cart`.`product_id`=`products`.`id`
        WHERE `cart`.`user_id`='$this->user_id'
        ";
        return ($this->runDQL($query));
    }
    public function insert(){
        $query="insert into `cart` (`product_id`,`user_id`,`quantity`) values('$this->product_id','$this->user_id','$this->quantity')";
        return ($this->runDML($query));

    }
    public function delete(){
        $query="delete from `cart`where `cart`.`product_id`='$this->product_id' and `cart`.`user_id`='$this->user_id' ";
        return ($this->runDML($query));

    }
    public function getquantityvalue(){
        $query="select * from `cart` where `cart`.`product_id`='$this->product_id' and `cart`.`user_id`='$this->user_id'";
        return ($this->runDQL($query));
    }
     public function updated(){
         $query="update `cart` set `cart`.`quantity` = '$this->quantity' where `cart`.`product_id`='$this->product_id' and `cart`.`user_id`='$this->user_id' ";
         return ($this->runDML($query));
     }
     public function update(){
         
     }
     
     public function select(){
 
     }
}