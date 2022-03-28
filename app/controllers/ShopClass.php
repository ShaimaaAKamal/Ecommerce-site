<?php
include_once "SessionConstruct.php";
include_once __DIR__."/../models/Category.php";
include_once __DIR__."/../models/Subcategory.php";
include_once __DIR__."/../models/Brand.php";
include_once __DIR__."/../models/Product.php";
class Shop extends sess {
    public function shop_get(){
        header("location:../views/shop.php");
        die;
    }
    public function getCategories(){
        $category=new Category;
        $AllCategories=$category->select();
        if($AllCategories){
            $_SESSION['categories']=$AllCategories->fetch_all(MYSQLI_ASSOC);
        }
        else{
            $_SESSION['No_Categories']='No Categories';
        }
        $this->shop_get();

    }
   
    public static function getSubCategories($id){
        $category=new Category;
        $category->setId($id);
        $categoriesSubcategory=$category->selectSubcategory();
        if( $categoriesSubcategory){
            return ($categoriesSubcategory->fetch_all(MYSQLI_ASSOC));
        }
        else{
           return [];

        }
    }
        public static function getBrand(){
            $brand=new brand;
            $Allbrands=$brand->select();
            if($Allbrands){
               return ($Allbrands->fetch_all(MYSQLI_ASSOC));
            }
            else{
                return [] ;
            }       
    }
    public static function getProducts(){
        $product=new Product;
        $allproducts=$product->select();
        if($allproducts){
            return ($allproducts->fetch_all(MYSQLI_ASSOC));
        }
        else{
            return [] ;
        }
    }
    public function getsubCategoryProduct($request){
        if($request['subcategory']){
            $subcategory=new Subcategory;
            $subcategory->setId($request['subcategory']);
            $idExist=$subcategory->CheckIdExist();
            if($idExist){
                $subId=$idExist->fetch_object();
                $subcategory->setId($subId->id);
                $prodcustspersub=$subcategory->Getproductsbyid();
                if($prodcustspersub){
                    $_SESSION['subcategorypage']= $prodcustspersub->fetch_all(MYSQLI_ASSOC);
                }
                else{
                    $_SESSION['subcategorypage']=[];
                }
                $this->shop_get();

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
    public function getBrandsProduct($request){
        if($request['brand']){
            $brand=new Brand;
            $brand->setId($request['brand']);
            $idExist=$brand->CheckIdExist();
            if($idExist){
                $brandId=$idExist->fetch_object();
                $brand->setId($brandId->id);
                $prodcustsperbrand=$brand->Getproductsbyid();
                if($prodcustsperbrand){
                    $_SESSION['brands']= $prodcustsperbrand->fetch_all(MYSQLI_ASSOC);
                }
                else{
                    $_SESSION['brands']=[];
                }
                $this->shop_get();

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

}
?>