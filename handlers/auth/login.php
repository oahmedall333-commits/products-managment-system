<?php
 
include (__DIR__."/../../core/config.php");
include (BASE_PATH."core/functions.php");
include (BASE_PATH. "core/validations.php");
include (BASE_PATH. "core/session.php");
if($_SERVER['REQUEST_METHOD'] === "POST"){
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $error = validate_login($email,$password);
    if(!empty($error)){
        set_old('email',$email);
        set_message('danger',$error);
        header("Location:".BASE_URL."views/auth/login.php");
        exit;
    }
    $user = get_user_by_email($conn,$email);

    if(!$user){
        set_old('email',$email);
        set_message('danger',"Invalid Email or Password");
        header("Location:".BASE_URL."views/auth/login.php");
        exit;
    }
  
    if(!password_verify($password,$user['password'])){
        set_old('email',$email);
        set_message('danger',"Invalid Email or Password");
        header("Location:".BASE_URL."views/auth/login.php");
        exit;
    }

    $remember = isset($_POST['remember']);
    if($remember){
        $token = bin2hex(random_bytes(32));
        update_remember_token($conn,$user['id'],$token);
        setcookie('remember_token',$token, time()+86400 * 7,"/");
    }

   login($user);

     set_message('success','Logged in successfully.');
     if($user['role'] == 'admin'){
        header("Location:".BASE_URL."views/admin/mystore.php");
        exit;
     }    
     header("Location:".BASE_URL."index.php");
     exit;
 }
