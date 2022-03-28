<?php
include_once "SessionConstruct.php";
include_once __DIR__."/../models/Cart.php";
class Cartinfo extends sess
{ 
    public function getcart(){
        header("location:../views/cartPage.php");
        die;
}
public static function cartdetails($userId){
    $cart=new Cart;
    $cart->setUser_id($userId);
    $cartProducts=$cart->getdata();
    if($cartProducts){
        return $cartProducts;
    }
    else {
        return [];
    }
    
}

public function Addcart_item($request){
    $cart=new Cart;
    $cart->setProduct_id($request['productId']);
    $cart->setUser_id($request['user_id']);
    $quan=$cart->getquantityvalue();
    if($quan){
        $value=$quan->fetch_object();
        $qua=$value->quantity;
        if(isset($request['quantity'])){
            $qua=$qua+$request['quantity'];
        }
        elseif(isset($request['pluscheck']) or isset($request['plus'])){
            $qua=$qua+1;
        }
        elseif(isset($request['subtractcheck']) or isset($request['subtract'])){
            $qua=$qua-1;
        }
        else{
            $qua=$qua+1;
        }
        $cart->setQuantity($qua);
        $added=$cart->updated();
    }
    else{
        if(isset($request['quantity'])){
            $cart->setQuantity($request['quantity']);
        }
        elseif(isset($request['subtractcheck']) or isset($request['subtract'])){
            $cart->setQuantity(0);
        }
        else{
            $cart->setQuantity(1);
        }
        $added=$cart->insert();
    }
    if($added){
        if(isset($request['subtractcheck']) or isset($request['pluscheck']))
     {   header("location:../views/checkout.php");die;}
else
{        header("location:../views/cartPage.php");die;
}    
    }
    else{
        header("location:../views/errors/500.php");die;
    }
  
    
    }
             
               public function deleteItem($request){
                $cart=new Cart;
                $cart->setProduct_id($request['productId']);
                $cart->setUser_id($request['user_id']);
                $quan=$cart->getquantityvalue();
                if($quan){
                    $done=$cart->delete();
                    if($done){
                        if(isset($request['carted']))
{                        header("location:../views/cartPage.php");die;
}        
else
{  header("location:../views/checkout.php");die;
    
}            }
                    else{
                        header("location:../views/errors/500.php");die;

                    }

                }else{
                    header("location:../views/errors/500.php");die;
                }

               }

}
?>