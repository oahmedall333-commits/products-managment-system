<?php 

include __DIR__.'/../../../core/config.php';
include BASE_PATH.'core/functions.php';
include BASE_PATH.'core/session.php';

if(!isset($_GET['id'])){
    set_message("danger","Invalid Category Id");
    header("Location:".BASE_URL."views/admin/categories/index.php");
    exit;
}

$id = (int)$_GET["id"];
$category = get_category_by_id($conn,$id);
if(!$category){
    set_message("danger","Category Not Found");
    header("Location:".BASE_URL."views/admin/categories/index.php");
    exit;
}

$result = delete_category($conn,$id);
if($result){
    set_message("success","Category Deleted Successfully");
}else{
    set_message("danger","Error");
}

    header("Location:".BASE_URL."views/admin/categories/index.php");
    exit;