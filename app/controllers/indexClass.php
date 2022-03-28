<?php
include_once "SessionConstruct.php";
include_once __DIR__."/../models/Product.php";
include_once __DIR__."/../models/Category.php";

class index extends sess{
    public static function  getCategories(){
        $category=new Category;
        $AllCategories=$category->select();
        if($AllCategories){
            $_SESSION['categories']=$AllCategories->fetch_all(MYSQLI_ASSOC);
        }
        else{
            $_SESSION['No_Categories']='No Categories';
        }
    }
    public static function getNewProducts(){
        $product=new Product;
        $products=$product->getRecent();
        if($products){
            return ($products->fetch_all(MYSQLI_ASSOC));
        }
        else return [];
    }
    public static function getMostRatedProducts(){
        $product=new Product;
        $products=$product->getRated();
        if($products){
            return ($products->fetch_all(MYSQLI_ASSOC));
        }
        else return [];

    }
    public static function getMostOrderedProducts(){
        $product=new Product;
        $products=$product->getOrdered();
        if($products){
            return ($products->fetch_all(MYSQLI_ASSOC));
        }
        else return [];

    }
    public static function getRecommendProducts(){
        $product=new Product;
        $allproducts=$product->getIndexrecommended();
        if($allproducts){
            return ($allproducts->fetch_all(MYSQLI_ASSOC));
        }
        else{
            return [] ;
        }
    }
    public static function getMostViewedproducts(){
        $product=new Product;
        $products=$product->getviewed();
        if($products){
            return ($products->fetch_all(MYSQLI_ASSOC));
        }
        else return [];
    }
}
?>