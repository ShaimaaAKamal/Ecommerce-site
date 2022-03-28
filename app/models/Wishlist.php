<?php
include_once "db/database.php";
include_once "db/operations.php";
class Wishlist extends database implements operations{
    private $user_id;
    private $product_id;


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
    public function getdata(){
        $query="select `products`.`name_en` as product_name ,`products`.`id` as product_id ,`products`.`price`
        from `products` join `wishlist`
        on `wishlist`.`product_id`=`products`.`id`
        WHERE `wishlist`.`user_id`='$this->user_id'
        ";
        return ($this->runDQL($query));
    }
    public function getquantityvalue(){
        $query="select * from `wishlist` where `wishlist`.`product_id`='$this->product_id' and `wishlist`.`user_id`='$this->user_id'";
        return ($this->runDQL($query));
    }
    public function insert(){
        $query="insert into `wishlist` (`product_id`,`user_id`) values('$this->product_id','$this->user_id')";
        return ($this->runDML($query));

    }
    public function delete(){
        $query="delete from `wishlist` where `wishlist`.`product_id`='$this->product_id' and `wishlist`.`user_id`='$this->user_id' ";
        return ($this->runDML($query));

    }
    
     public function update(){
 
     }
     
     public function select(){
 
    }
}