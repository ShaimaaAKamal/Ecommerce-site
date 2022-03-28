<?php
include_once "db/database.php";
include_once "db/operations.php";
class Copoun extends database implements operations{
    private $id;
    private $code;
    private $discount;
    private $discount_type;
    private $minmum_price;
    private $maxDiscountValue;
    private $usageCount;
    private $userUsageCount;
private $start_Date;
private $end_Date;
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
     * Get the value of discount
     */ 
    public function getDiscount()
    {
        return $this->discount;
    }

    /**
     * Set the value of discount
     *
     * @return  self
     */ 
    public function setDiscount($discount)
    {
        $this->discount = $discount;


    }

    /**
     * Get the value of discount_type
     */ 
    public function getDiscount_type()
    {
        return $this->discount_type;
    }

    /**
     * Set the value of discount_type
     *
     * @return  self
     */ 
    public function setDiscount_type($discount_type)
    {
        $this->discount_type = $discount_type;


    }

    /**
     * Get the value of minmum_price
     */ 
    public function getMinmum_price()
    {
        return $this->minmum_price;
    }

    /**
     * Set the value of minmum_price
     *
     * @return  self
     */ 
    public function setMinmum_price($minmum_price)
    {
        $this->minmum_price = $minmum_price;


    }

    /**
     * Get the value of maxDiscountValue
     */ 
    public function getMaxDiscountValue()
    {
        return $this->maxDiscountValue;
    }

    /**
     * Set the value of maxDiscountValue
     *
     * @return  self
     */ 
    public function setMaxDiscountValue($maxDiscountValue)
    {
        $this->maxDiscountValue = $maxDiscountValue;


    }

    /**
     * Get the value of usageCount
     */ 
    public function getUsageCount()
    {
        return $this->usageCount;
    }

    /**
     * Set the value of usageCount
     *
     * @return  self
     */ 
    public function setUsageCount($usageCount)
    {
        $this->usageCount = $usageCount;


    }

    /**
     * Get the value of userUsageCount
     */ 
    public function getUserUsageCount()
    {
        return $this->userUsageCount;
    }

    /**
     * Set the value of userUsageCount
     *
     * @return  self
     */ 
    public function setUserUsageCount($userUsageCount)
    {
        $this->userUsageCount = $userUsageCount;


    }

/**
 * Get the value of start_Date
 */ 
public function getStart_Date()
{
return $this->start_Date;
}

/**
 * Set the value of start_Date
 *
 * @return  self
 */ 
public function setStart_Date($start_Date)
{
$this->start_Date = $start_Date;

return $this;
}

/**
 * Get the value of end_Date
 */ 
public function getEnd_Date()
{
return $this->end_Date;
}

/**
 * Set the value of end_Date
 *
 * @return  self
 */ 
public function setEnd_Date($end_Date)
{
$this->end_Date = $end_Date;

return $this;
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