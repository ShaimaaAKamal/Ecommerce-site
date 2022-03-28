<?php
include_once __DIR__."/../../models/User.php";
include_once __DIR__."/../SessionConstruct.php";
include_once __DIR__."/../../mails/Verification.php";
include_once __DIR__."/../../requests/requestvalidate.php";
include_once __DIR__."/../ErrorHandler.php";


class UpdateAuthentication extends sess{
    public function emailValidate($request){
        $Validation = new requestValidate;
        $Validation->setEmail($request['email']);
        return  ($Validation->validateEmail());
    }
    
 public function update($request){
    //  print_r($request);die;
    //  var_dump($this->emailValidate($request));die;
     if($this->emailValidate($request)){
        $errors['email']=($this->emailValidate($request))['email'];
     }

    if (!(isset($request['email']) and $request['name'])) {
        $errors['name'] = "<div class='text-center alert alert-danger mt-2'> Name is required</div>";
    }
    if (!(isset($request['gender']) and $request['gender'])) {
        $errors['gender'] = "<div class='text-center alert alert-danger mt-2'> gender is required</div>";
    }
    if (empty($errors)) {
        if($_FILES['image']['error'] == 0){
            $maxSize=100000;
            if( $_FILES['image']['size'] > $maxSize) 
            $errors['image']['size']="<div class='text-center alert alert-danger mt-2'> max size shouldn't be greater than 512 byte</div>";
            $allowedExtensions=['jpg','png'];
            if(isset($_FILES['image']['type']))
            {
                $photoextension = pathinfo($_FILES['image']['name'],PATHINFO_EXTENSION);

                if(!(in_array( $photoextension,$allowedExtensions))){
                    echo $photoextension;
                    $errors['image']['type']="<div class='text-center alert alert-danger mt-2'>this extension is not allowed</div>";
                }
            }
            if(empty($errors['image'])){
             $imagePath='../assests/images/users/';
            //  print_R($_SESSION['user']);die;
             $photoName = time() . '-user-id-' . $_SESSION['user']->id . '.' . $photoextension ;
             $fullPath = $imagePath . $photoName;
             move_uploaded_file($_FILES['image']['tmp_name'],$fullPath);
             $_SESSION['user']->image = $photoName;
             $_SESSION['user']->name = $request['name'];
             $_SESSION['user']->email = $request['email'];
             $_SESSION['user']->gender = $request['gender'];
             if($this->updateUser($request, $photoName)){
                $_SESSION['success'] = "<div class='text-center alert alert-success mt-2'> profile has been updated successfully</div>";
             }

            }
            else{
                $_SESSION['errors'] = $errors;
            }
           
            

        }
       
      
    } else {
        $_SESSION['errors'] = $errors;
    }
    // print_r(   $_SESSION['errors']);die;
    header("location:../views/account.php");die;
 }   
 public function updateUser($request, $photoName){
     $user=new User;
     $user->setId($_SESSION['user']->id);
     $user->setName($request['name']);
     $user->setImage($photoName);
     $user->setEmail($request['email']);
     $user->setGender($request['gender']);
     $updated=$user->update();
     if(!$updated){
        header("location:../views/errors/500.php");die; 
     }
     else return true;

 }
}