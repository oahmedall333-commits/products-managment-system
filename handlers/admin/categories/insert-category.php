<?php

include(__DIR__."/../../../core/config.php");
include(BASE_PATH."core/functions.php");
include(BASE_PATH."core/session.php");
include(BASE_PATH."core/validations.php");

if($_SERVER['REQUEST_METHOD'] == "POST"){
    
   $name = trim($_POST['category_name']);

   $error = validate_category_name($name);
   if(!empty($error)){
    set_message("danger",$error);
    header("Location:".BASE_URL."views/admin/categories/index.php");
    exit;
   }

   $category = category_exists($conn,$name);
   if($category){
    set_message("danger","Category Already Exists");
    header("Location:".BASE_URL."views/admin/categories/index.php");
    exit;
   }
   
   if(create_category($conn,$name)){
    set_message("success","Category Added Successfully");
   }else{
    set_message("danger","Error ");
   }

   header("Location:".BASE_URL."views/admin/categories/index.php");
   exit;

}