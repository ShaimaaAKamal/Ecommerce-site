<?php
include_once "db/database.php";
include_once "db/operations.php";
class Brand extends database implements operations{
    private $id;
    private $name_ar;
    private $name_en;
    private $status;
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
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;


    }

    /**
     * Get the value of name_ar
     */ 
    public function getName_ar()
    {
        return $this->name_ar;
    }

    /**
     * Set the value of name_ar
     *
     * @return  self
     */ 
    public function setName_ar($name_ar)
    {
        $this->name_ar = $name_ar;


    }

    /**
     * Get the value of name_en
     */ 
    public function getName_en()
    {
        return $this->name_en;
    }

    /**
     * Set the value of name_en
     *
     * @return  self
     */ 
    public function setName_en($name_en)
    {
        $this->name_en = $name_en;


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
     * Get the value of image
     */ 
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set the value of image
     *
     * @return  self
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
    public function insert(){

    }
     public function update(){
 
     }
     public function delete(){
 
     }
     public function select(){
        // $query="select * from `productscount` order by `brand_name`";
        $query="select count(`products`.`id`) AS `product_count`,
        `brands`.`name_en` AS `brand_name`,
        `brands`.`id` AS `brand_id`
        from `products` join `brands`
        on `products`.`brand_id` = `brands`.`id`
        group by  `brand_id`
        order by `brand_name`";
        return ($this->runDQL($query));
     }
     public function CheckIdExist(){
        $query="SELECT `id`,`name_en` FROM `brands`  where `brands`.`id` = '$this->id'";
        return ($this->runDQL($query));
    }
    public function Getproductsbyid(){
        // $query="select * from `productspersubcategory` where `productspersubcategory`.`subcategory_id`='$this->id'";
        $query="select
        `products`.`name_en` AS `name_en`,
        `products`.`id` AS `id`,`products`.`price` AS `price`,
        `products`.`image` AS `image`,
        `brands`.`id` AS `brand_id`
        from `products` join `brands`
        on `products`.`brand_id` = `brands`.`id`
        where  `brands`.`id`='$this->id'
        ";
        return ($this->runDQL($query));

    }
}
?>