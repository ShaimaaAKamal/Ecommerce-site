<?php
include_once "SessionConstruct.php";
include_once __DIR__."/../models/Category.php";
include_once __DIR__."/../models/Subcategory.php";
include_once __DIR__."/../models/Brand.php";
include_once __DIR__."/../models/User.php";
include_once __DIR__."/../models/Review.php";


include_once __DIR__."/../models/Product.php";
class Singleproduct extends sess{
    public function getProduct($request){
        if($request['product_id']){
            $product=new Product;
            $product->setId($request['product_id']);
            $productExist=$product->CheckIdExist();
            if($productExist){
                $productData=$productExist->fetch_object();
                $_SESSION['product']=   $productData;
                header("location:../views/product-details.php");
                die;
            }
            else{
                header("location:../views/errors/404.php");
                die;
            }
        }
        else{
            header("location:../views/errors/404.php");
            die;
        }

    }
    public static function getReview($id){
        $product=new Product;
        $product->setId($id);
        $productData=$product->displayReviews();
        if($productData){
           return $productData->fetch_object();        }
        else{
            return [];
        }



    }
    public static function display($id){
        $product=new Product;
        $product->setId($id);
        $productData=$product->getReviewsData();
        if($productData){
            return $productData->fetch_all(MYSQLI_ASSOC);}
         else{
             return [];
         }


    }
    public static function getRecommendedProducts($id,$subId){
        $product=new Product;
        $product->setId($id);
        $product->setSubcategory_id($subId);
        $productData=$product->getRecommended();
        if($productData){
            return $productData->fetch_all(MYSQLI_ASSOC);        }
         else{
             return [];
         }
    }
    public static function increaseview($id){
        $product=new Product;
        $product->setId($id);
        $viewcount= $product->updateview();  
        if($viewcount){
         return true;
        }  
        else{
            header("location:../views/errors/500.php");
            die;
        }

    } 
    public function Add_comment($request){
        if($request['email']){
            $user=new User;
            $user->setEmail($request['email']);
            $userdata=$user->findEmail();
            if($userdata){
                if($request['value']){
                    $userinfo=$userdata->fetch_object();
                    $review=new Review;
                    $review->setProduct_id($request['product_id']);
                    $review->setUser_id($userinfo->id);
                    $review->setValue($request['value']);
                    $review->setComment($request['comment']);
                    $reviewResult=$review->insertReview();
                    if($reviewResult){
                        header("location:route.php?product_id=".$request['product_id']);die;
                    }
                    else{
                        header("location:../views/errors/500.php");
                        die;
                    }
                }
                else{
                    $_SESSION['value']="<div class='alert alert-danger text-center' style='margin-top:5px;'> Please Enter a value between 1 and 5 . </div>";
                    $_SESSION['request']=$request;
                    header("location:route.php?product_id=".$request['product_id']);die;
                }
           
            }
            else{
                $_SESSION['email']="<div class='alert alert-danger text-center' style='margin-top:5px;'> Only registerted users allowed to add comments. </div>";
                $_SESSION['request']=$request;
                header("location:route.php?product_id=".$request['product_id']);die;
            }

        }
        else {
            $_SESSION['email']="<div class='alert alert-danger text-center' style='margin-top:5px;'> Email is required </div>";
            $_SESSION['request']=$request;
            header("location:route.php?product_id=".$request['product_id']);die;
        }

    }
    
}
?>