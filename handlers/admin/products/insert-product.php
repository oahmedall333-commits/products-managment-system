<?php
include(__DIR__."/../../../core/config.php");
include(BASE_PATH."core/functions.php");
include(BASE_PATH."core/database.php");
include(BASE_PATH."core/validations.php");
include(BASE_PATH."core/session.php");
if($_SERVER['REQUEST_METHOD'] === "POST"){
    $name = $_POST['Pname'];
    $description = $_POST['Pdescription'];
    $price = $_POST['Pprice'];
    $stock = $_POST['Pstock'];
    $category = $_POST['Pcategory'];
    $image = $_FILES['Pimage'];
    $image_name = $_FILES['Pimage']['name'];
    $image_tmp = $_FILES['Pimage']['tmp_name'];
    $distension = __DIR__."/../../../public/uploadimage/".$image_name;


    $error = validate_product($name,$price,$stock,$category,$image);
    if(!empty($error)){
        set_message("danger",$error);
        header("location:".BASE_URL."views/admin/products/index.php");
        exit;
    }
    move_uploaded_file($image_tmp,$distension);

   if(create_product($conn,$name,$description,$price,$stock,$category,$image_name)){
     set_message("success","Product added successfully");
   }else{
     set_message("danger","failed to added successfully");
   }
        header("location:".BASE_URL."views/admin/products/index.php");
        exit;
}
