<?php
session_start();
include_once("functions.php");
function set_old($key,$value){
  $_SESSION['old'][$key] = $value;
}

function old($key){
    if(isset($_SESSION['old'][$key])){
        $value =  $_SESSION['old'][$key];
        return $value;
    }
    return '';
}

function clear_old(){
    unset($_SESSION['old']);
}

function set_message($type,$message){
    $_SESSION['message']=[
        'type'=>$type,
        'text'=>$message
    ];
}

function show_message(){
    if(isset($_SESSION['message'])){
        $type = $_SESSION['message']['type']; 
        $message = $_SESSION['message']['text']; 
        echo "<div class='alert alert-$type'> $message</div>";
        unset($_SESSION['message']);
    }
}

function login($user){
         $_SESSION['user'] = [
        'id'=>$user['id'],
        'name'=>$user['name'],
        'email'=>$user['email'],
        'role'=>$user['role']
     ];
}

function logout($conn){
    $user_id = $_SESSION['user']['id'];
    delete_user_by_remember_token($conn,$user_id);
    setcookie('remember_token','',time() - 3600,"/");
    unset($_SESSION['user']);
}

// middleware
function is_logged_in(){
     return isset($_SESSION['user']);
 
}

function auth(){
    if(!is_logged_in()){
        set_message('danger',"Please login first");
        header("Location:".BASE_URL."views/auth/login.php");
        exit;
    }
}

function guest(){
    if(is_logged_in()){
        set_message('info',"You are already logged in");
        header("Location:".BASE_URL."index.php");
        exit();
    }
}

function is_admin(){
    return isset($_SESSION['user']) && $_SESSION['user']['role']==="admin";
}

function admin(){
    auth();
    if(!is_admin()){
        set_message('danger', 'Access denied.');
        header("Location: " . BASE_URL . "index.php");
        exit;
    }
}

function auto_login($conn){
    if(!is_logged_in() && isset($_COOKIE['remember_token'])){
        $token = $_COOKIE['remember_token'];
        $user = get_user_by_remember_token($conn,$token);
        if($user){
            login($user);
        }
    }
}