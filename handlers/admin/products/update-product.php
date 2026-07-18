<?php

include(__DIR__."/../../../core/config.php");
include(BASE_PATH."core/database.php");
include(BASE_PATH."core/functions.php");
include(BASE_PATH."core/validations.php");

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $id = $_POST['id'];
    $name = $_POST['Pname'];
    $description = $_POST['Pdescription'];
    $price = $_POST['Pprice'];
    $stock = $_POST['Pstock'];
    $category = $_POST['Pcategory'];
    $old_image = $_POST['old_image'];
    $new_image = $_FILES["Pimage"];

    $error = validate_product($name,$price,$stock,$category,$new_image,false);
    if($error){
           set_message('danger',$error);
           header("location:".BASE_URL."views/admin/products/edit-product.php?id=$id");
           exit;
    }

    if($_FILES['Pimage']['error'] == UPLOAD_ERR_NO_FILE){
        $image = $old_image;
    }else{
        $image = $_FILES['Pimage']['name'];
        $image_tmp = $_FILES['Pimage']['tmp_name'];
        $destination = BASE_PATH."public/uploadimage/".$image;
        if(!move_uploaded_file($image_tmp,$destination)){
            set_message('danger',"Error Uploading Image");
            header("location:".BASE_URL."views/admin/products/edit-product.php?id=$id");
            exit;
        }
        move_uploaded_file($image_tmp,$destination);
        $old = BASE_PATH."public/uploadimage/".$old_image;
        if(file_exists($old)){
        unlink($old);
    }
}

$result = update_product($conn,$id,$name,$description,$price,$stock,$category,$image);

if($result){
    set_message('success',"Product Updated Successfully");
}else{
    set_message('danger',"Error updating product");

}
    header("location:".BASE_URL."views/admin/products/index.php");
    exit;
}