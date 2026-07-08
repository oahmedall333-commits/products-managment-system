<?php 

session_start();
include(BASE_PATH."core/database.php");
;
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

function create_product($conn,$name,$description,$price,$stock,$category,$image){
   $sql = "INSERT INTO `products`(name,description,price,stock,cat_id,image)
              values('$name','$description',$price,$stock,'$category','$image') ";
   $result = mysqli_query($conn,$sql);
if($result){
    set_message("success","Product added successfully");
    return true;
}else{
    set_message("danger","failed to added successfully");
    return false;
}
}

function get_all_products(){
    global $conn;
    $sql = "SELECT * FROM `products`";
    $result = mysqli_query($conn,$sql);
    $products = [];
    while($row = mysqli_fetch_assoc($result)){
        $products[] = $row;
    }
    return $products;
}