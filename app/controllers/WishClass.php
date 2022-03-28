<?php
include_once "SessionConstruct.php";
include_once __DIR__."/../models/User.php";
include_once __DIR__."/../models/Wishlist.php";
include_once __DIR__."/../models/Product.php";
class WishClass extends sess{
    public function getwish(){
        header("location:../views/wish.php");
        die;
}
    public static function wishdetails($userId){
        $wish=new Wishlist;
        $wish->setUser_id($userId);
        $wishProducts=$wish->getdata();
        if($wishProducts){
            return $wishProducts;
        }
        else {
            return [];
        }
        
    }
    public function Addwish_item($request){
        $wish=new Wishlist;
        $wish->setProduct_id($request['productId']);
        $wish->setUser_id($request['user_id']);
        $quan=$wish->getquantityvalue();
        if($quan){
            header("location:../views/wish.php");die;
        }
        else{
           
            $added=$wish->insert();
        }
        if($added){
            header("location:../views/wish.php");die;
        
        }
        else{
            header("location:../views/errors/500.php");die;
        }
        }
        public function deleteItem($request){
            $wish=new Wishlist;
            $wish->setProduct_id($request['productId']);
            $wish->setUser_id($request['user_id']);
            $quan=$wish->getquantityvalue();
            if($quan){
                $done=$wish->delete();
                if($done){ 
                    header("location:../views/wish.php");die;
          }
                else{
                    header("location:../views/errors/500.php");die;

                }

            }else{
                header("location:../views/errors/500.php");die;
            }

           }
    
    
}