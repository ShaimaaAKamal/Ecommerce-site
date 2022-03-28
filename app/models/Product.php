<?php
include_once "db/database.php";
include_once "db/operations.php";
class Product extends database implements operations{
    private $id;
    private $brand_id;
    private $subcategory_id;
    private $name_ar;
    private $name_en;
    private $status;
    private $code;
    private $view;
    private $cond;
    private $image;
    private $price;
    private $amount;
    private $details_ar;
    private $details_en;
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
     *     */ 
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * Get the value of brand_id
     */ 
    public function getBrand_id()
    {
        return $this->brand_id;
    }

    /**
     * Set the value of brand_id
     *
     
     */ 
    public function setBrand_id($brand_id)
    {
        $this->brand_id = $brand_id;

    }

    /**
     * Get the value of subcategory_id
     */ 
    public function getSubcategory_id()
    {
        return $this->subcategory_id;
    }

    /**
     * Set the value of subcategory_id
     *
     */ 
    public function setSubcategory_id($subcategory_id)
    {
        $this->subcategory_id = $subcategory_id;
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
     *     */ 
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
     *     */ 
    public function setStatus($status)
    {
        $this->status = $status;
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
     * Get the value of price
     */ 
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set the value of price
     *
     */ 
    public function setPrice($price)
    {
        $this->price = $price;
    }
     /**
     * Get the value of view
     */ 
    public function getView()
    {
        return $this->view;
    }

    /**
     * Set the value of view
     *
     * @return  self
     */ 
    public function setView($view)
    {
        $this->view = $view;

    }
     /**
     * Get the value of cond
     */ 
    public function getCond()
    {
        return $this->cond;
    }

    /**
     * Set the value of cond
     *
     * @return  self
     */ 
    public function setCond($cond)
    {
        $this->cond = $cond;

    }

    /**
     * Get the value of amount
     */ 
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set the value of amount
     *     */ 
    public function setAmount($amount)
    {
        $this->amount = $amount;
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
     * Get the value of details_ar
     */ 
    public function getDetails_ar()
    {
        return $this->details_ar;
    }

    /**
     * Set the value of details_ar
     *
     * @return  self
     */ 
    public function setDetails_ar($details_ar)
    {
        $this->details_ar = $details_ar;

    }

    /**
     * Get the value of details_en
     */ 
    public function getDetails_en()
    {
        return $this->details_en;
    }

    /**
     * Set the value of details_en
     *
     * @return  self
     */ 
    public function setDetails_en($details_en)
    {
        $this->details_en = $details_en;

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
   
    public function select(){
         $query="select `name_en` , `id`, `price` ,`image` from `products`";
         return ($this->runDQL($query));
    }
    public function CheckIdExist(){
        // $query="SELECT * FROM `productbrands`  where `productbrands`.`id` = '$this->id'";
        $query="select `products`.*,
        `brands`.`name_en` AS `brand_name` 
        from  `products` join `brands`
         on`brands`.`id` =`products`.`brand_id`
         WHERE  `products`.`id`='$this->id'";
        return ($this->runDQL($query));
    }

    public function displayReviews(){
        // $query="SELECT * FROM `productsreview`  where `productsreview`.`product_id` = '$this->id'";
        $query="select count(`products`.`id`) AS `review_number`,
        round(Avg(`reviews`.`value`)) AS `review_value`,
        `products`.`name_en` AS `product_name`,
        `products`.`id` AS `product_id`
        from `products` join `e-commerce`.`reviews`
        on `products`.`id` = `reviews`.`product_id` 
        where `products`.`id` ='$this->id'
        group by `e-commerce`.`products`.`id`";
        return ($this->runDQL($query));
    }
    public function getReviewsData(){
        // $query="SELECT `reviewsdata`.`username`,`reviewsdata`.`comment`,`reviewsdata`.`created_at`,`reviewsdata`.`value` from `reviewsdata` WHERE `reviewsdata`.`product_id`='$this->id'";
        $query="select `reviews`.`comment` AS `comment`,
        `reviews`.`value` AS `value`,
        `reviews`.`created_at` AS `created_at`,
        `products`.`name_en` AS `name_en`,
        `products`.`image` AS `image`,
        `products`.`id` AS `product_id`,
        `products`.`price` AS `price`,
        `users`.`name` AS `username`
        from `e-commerce`.`reviews` join `e-commerce`.`products` join `e-commerce`.`users` 
        on `products`.`id` = `reviews`.`product_id` and `reviews`.`user_id` = `users`.`id`
        where `product_id`='$this->id'";
        return ($this->runDQL($query));
    }

    public function getRecommended(){
            $query="select `products`.* from `products` JOIN `subcatogries` on `products`.`subcategory_id`=`subcatogries`.`id` where `products`.`id` <> $this->id and `subcatogries`.`id`=$this->subcategory_id;";
        return ($this->runDQL($query));
    }
    public function getRecent(){
        $query="SELECT * FROM `products` ORDER BY `products`.`created_at` DESC,`products`.`id` DESC LIMIT 4";
        return ($this->runDQL($query));
    }
    public function getRated(){
        $query="select `products`.`id` as `product_id`,
        `products`.`image`,
        `products`.`price`,
        `products`.`name_en`,
        count(`products`.`id`)as reviews_count,round(AVG(`reviews`.`value`))as reviews_value 
        from `products` 
        join `reviews` on 
        `reviews`.`product_id`=`products`.`id` 
        group by `products`.`id` order by reviews_count DESC,reviews_value DESC limit 4 ";
        return ($this->runDQL($query));
    }
    public function getOrdered(){
        $query="select `products`.`id` as product_id,`products`.`image`,`products`.`price` ,`products`.`name_en` ,COUNT(`products`.`id`) as order_count 
        from `products` join `orders_products`
        on `orders_products`.`product_id`= `products`.`id`
        group by `products`.`id`
        order by order_count DESC,`products`.`id` Desc
        limit 4";
        return ($this->runDQL($query));

    }
    public function getIndexrecommended(){
        $query="select `name_en` , `id`, `price` ,`image` from `products` limit 4";
        return ($this->runDQL($query));
    }
    public function updateview(){
        $query="update `products` set `products`.`view`=`products`.`view` +1 
        where `products`.`id`='$this->id'";
        return ($this->runDML($query));

    }
    public function getviewed(){
        $query="select `products`.`id` ,
        `products`.`image`,
        `products`.`price`,
        `products`.`name_en`,
        `products`.`view`
        from `products` order by `products`.`view` Desc,`products`.`id` Desc limit 4";
        return ($this->runDQL($query));
    }

    public function insert(){

    }
     public function update(){
 
     }
     public function delete(){
 
     }
   
   

   
}
?>