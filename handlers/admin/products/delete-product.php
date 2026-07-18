<?php
include __DIR__.'/../../../core/config.php';
include BASE_PATH.'core/functions.php';

if(!isset($_GET['id'])){
    set_message('danger',"ID Not Exists");
    header("location:".BASE_PATH."views/admin/products/index.php");
    exit;
}

$id = (int)$_GET['id'];

if($id<=0){
    set_message('danger',"ID must be a positive number");
    header("location:".BASE_URL."views/admin/products/index.php");
    exit;
}

$product = show_product($id);
if(!$product){
    set_message('danger',"product not found ");
    header("location:".BASE_URL."views/admin/products/index.php");
    exit;
}

$image = BASE_PATH."public/uploadimage/".$product['image'];

if(file_exists($image)){
    unlink($image);
}

$result = delete_product($conn,$id);
if($result){
    set_message('success',"Product Deleted Successfully");
}else{
    set_message('danger',"Error While Deleting Product");
}

    header("location:".BASE_URL."views/admin/products/index.php");
    exit;