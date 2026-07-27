<?php

include(__DIR__."/../../core/config.php");
include(BASE_PATH."core/database.php");
include(BASE_PATH."core/functions.php");
include(BASE_PATH."core/validations.php");
include(BASE_PATH."core/session.php");

if($_SERVER['REQUEST_METHOD'] === 'POST'){


   $name = trim($_POST['name']);
   $email = trim($_POST['email']);
   $password = trim($_POST['password']);
   $confirm_password = trim($_POST['confirm_password']);


   $error = validate_register($name,$email,$password,$confirm_password);
   if(!empty($error)){
    set_old('name',$name);
    set_old('email',$email);
    set_message('danger',$error);
    header("location:".BASE_URL."views/auth/register.php");
    exit;
   }



   $user = get_user_by_email($conn,$email);
   if($user){
    set_old('name',$name);
    set_old('email',$email);
    set_message('danger',"Email already Exists");
    header("location:".BASE_URL."views/auth/register.php");
    exit;
   }

      $password = password_hash($password,PASSWORD_DEFAULT);

  $result = create_user($conn,$name,$email,$password);
  if($result){
    set_message('success','Account created successfully');
    header("Location:".BASE_URL."views/auth/login.php");
    exit;
  }
    set_old('name',$name);
    set_old('email',$email);
    set_message('danger','Something went wrong');
    header("Location:".BASE_URL."views/auth/register.php");
    exit;


}