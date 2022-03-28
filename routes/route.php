<?php
include_once "../app/controllers/authentication/RegisterAuthentication.php";
include_once "../app/controllers/authentication/LoginAuthentication.php";
include_once "../app/controllers/authentication/UserVerification.php";
include_once "../app/controllers/authentication/PasswordRecovery.php";
include_once "../app/controllers/authentication/UpdateAuthentication.php";

include_once "../app/controllers/forwardroute.php";
include_once "../app/controllers/ShopClass.php";
include_once "../app/controllers/SingleProduct.php";
include_once "../app/controllers/Cartinfo.php";
include_once "../app/controllers/WishClass.php";
include_once "../app/controllers/Check.php";
include_once "../app/controllers/contact.php";




if ($_POST) {
    if (isset($_POST['register'])) {
        $auth = new  registerAuthentication;
        $auth->register($_POST);
    } elseif (isset($_POST['login'])) {
        $auth = new loginAuthentication;
        $auth->login($_POST);
    }  elseif (isset($_POST['update'])) {
        $auth = new UpdateAuthentication;
        $auth->update($_POST);
    }
    elseif (isset($_POST['verify'])) {
        $auth = new userVerificationAuthentication;
        $auth->verify_post($_POST);
    }
     elseif (isset($_POST['verify-email'])) {
           $auth = new passwordRecovery;
           $auth->verify_email($_POST);
       }
       elseif (isset($_POST['change_password'])) {
           $auth = new passwordRecovery;
           $auth->change_password($_POST);
       }
       elseif (isset($_POST['review'])) {
        $auth = new Singleproduct;
        $auth->Add_comment($_POST);
    }
    elseif (isset($_POST['cart'])) {
        $cart = new Cartinfo;
        $cart->Addcart_item($_POST);
    }
    elseif (isset($_POST['feedback'])) {
        $contact = new Contact;
        $contact->send($_POST);
    }
    else
        header("location:../views/errors/404.php");
} elseif ($_GET) {
    if (isset($_GET['register'])) {
        $auth = new registerAuthentication;
        $auth->register_get();
    } elseif (isset($_GET['logout'])) {
        $auth = new loginAuthentication;
        $auth->logout();
    } elseif (isset($_GET['login'])) {
        $auth = new loginAuthentication;
        $auth->login_get();
    } elseif (isset($_GET['email'])) {
        $auth = new userVerificationAuthentication ;
        $auth->verify_get($_GET);
    }
    elseif (isset($_GET['index'])) {
               $auth = new forwardRoute;
               $auth->index();
           }
           elseif (isset($_GET['account'])) {
                   $auth = new forwardRoute;
                   $auth->account();
               }
       elseif (isset($_GET['forget'])) {
           $auth = new passwordRecovery;
           $auth->forget_password();
       }
       elseif(isset($_GET['forgetpasswordEmail'])){
           $auth = new passwordRecovery;
           $auth->new_password_get($_GET);
       }
       elseif(isset($_GET['shop'])){
        $shop = new Shop;
        $shop->getCategories();
    }
    elseif(isset($_GET['subcategory'])){
        $shop = new Shop;
        $shop->getsubCategoryProduct($_GET);
    }
    elseif(isset($_GET['brand'])){
        $shop = new Shop;
        $shop->getBrandsProduct($_GET);
    }
    elseif(isset($_GET['product_id'])){
        $shop = new Singleproduct;
        $shop->getProduct($_GET);
    }
    elseif(isset($_GET['cart'])){
        $cart = new Cartinfo;
        $cart->getcart();
    }
    elseif(isset($_GET['wish'])){
        $wish = new WishClass;
        if(isset($_GET['productId'])){
            $wish->Addwish_item($_GET);
        }
        else{
            $wish->getwish();
        }
    }
    elseif(isset($_GET['check'])){
        $check = new Check;
        $check->getCheck();
    }
    elseif(isset($_GET['productId'])){
        if(!(isset($_GET['wished'])))
        {
            $cart = new Cartinfo;
            if(isset($_GET['delete'])){
                   $cart->deleteItem($_GET);
            }
            else   $cart->Addcart_item($_GET);
        }
        else{
            $wish=new WishClass;
            $wish->deleteItem($_GET);
        }
    

    }
   
    
   
    else
        header("location:../views/errors/404.php");
} else {
    header("location:../views/errors/405.php");
}
