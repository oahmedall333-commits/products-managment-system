<?php
include(__DIR__."/../../../core/config.php");
include(BASE_PATH."core/database.php");
include(BASE_PATH."core/functions.php");
include(BASE_PATH."core/validations.php");
include(BASE_PATH."core/session.php");

if($_SERVER['REQUEST_METHOD'] === "POST"){
    $name = trim($_POST['category_name']);
    $id = trim($_POST['id']);

    $error = validate_category_name($name);
    if($error){
        set_message('danger',$error);
        header("Location:".BASE_URL."views/admin/categories/index.php");
        exit;
    }

    $result = Update_category($conn,$name,$id);
    if($result){
        set_message('success',"Category Updated Successfully");
    }else{
        set_message("danger","error while updating");
    }

    header("location:".BASE_URL."views/admin/categories/index.php");
    exit;
}