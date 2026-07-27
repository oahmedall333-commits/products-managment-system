<?php
session_start();
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