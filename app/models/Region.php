<?php
include_once "db/database.php";
include_once "db/operations.php";
class Region extends database implements operations{
    private $id;
    private $city_id;
    private $name_ar;
    private $name_en;
    private $lat;
    private $long;
    private $radius;
    private $status;
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
     /**
     * Get the value of city_id
     */ 
    public function getCity_id()
    {
        return $this->city_id;
    }

    /**
     * Set the value of city_id
     *
     * @return  self
     */ 
    public function setCity_id($city_id)
    {
        $this->city_id = $city_id;


    }

    /**
     * Get the value of lat
     */ 
    public function getLat()
    {
        return $this->lat;
    }

    /**
     * Set the value of lat
     *
     * @return  self
     */ 
    public function setLat($lat)
    {
        $this->lat = $lat;


    }

    /**
     * Get the value of long
     */ 
    public function getLong()
    {
        return $this->long;
    }

    /**
     * Set the value of long
     *
     * @return  self
     */ 
    public function setLong($long)
    {
        $this->long = $long;


    }

    /**
     * Get the value of radius
     */ 
    public function getRadius()
    {
        return $this->radius;
    }

    /**
     * Set the value of radius
     *
     * @return  self
     */ 
    public function setRadius($radius)
    {
        $this->radius = $radius;


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