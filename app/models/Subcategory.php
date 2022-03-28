<?php
include_once "db/database.php";
include_once "db/operations.php";
class Subcategory extends database implements operations{
    private $id;
    private $name_ar;
    private $name_en;
    private $status;
    private $image;
    private $categories_id;
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
     * Get the value of categories_id
     */ 
    public function getCategories_id()
    {
        return $this->categories_id;
    }

    /**
     * Set the value of categories_id
     *
     * @return  self
     */ 
    public function setCategories_id($categories_id)
    {
        $this->categories_id = $categories_id;


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
 
     }
     public function CheckIdExist(){
        $query="SELECT `id`,`name_en` FROM `subcatogries`  where `subcatogries`.`id` = '$this->id'";
        return ($this->runDQL($query));
    }
    public function Getproductsbyid(){
        // $query="select * from `productspersubcategory` where `productspersubcategory`.`subcategory_id`='$this->id'";
        $query="select
        `products`.`name_en` AS `name_en`,
        `products`.`id` AS `id`,`products`.`price` AS `price`,
        `products`.`image` AS `image`,
        `subcatogries`.`id` AS `subcategory_id`
        from `products` join `subcatogries`
        on `products`.`subcategory_id` = `subcatogries`.`id`
        where  `subcatogries`.`id`='$this->id'
        ";
        return ($this->runDQL($query));

    }
}
?>