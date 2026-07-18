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
    $sql = "SELECT products.* , categories.name AS category_name from products join categories on products.cat_id = categories.id";
    $result = mysqli_query($conn,$sql);
    $products = [];
    while($row = mysqli_fetch_assoc($result)){
        $products[] = $row;
    }
    return $products;
}

function show_product($id){
    global $conn;
    $sql = "SELECT products.*,categories.name AS category_name FROM products  JOIN categories on products.cat_id = categories.id where products.id=$id";
    $result = mysqli_query($conn,$sql);
    if(!$result){
        set_message('danger',"Error in DB");
        return false;
    }
    if($product = mysqli_fetch_assoc($result)){
         return $product;
    }else{
        return false;
    }
}

function update_product($conn,$id,$name,$description,$price,$stock,$category,$image){
  $sql = "UPDATE products SET name='$name', description='$description', price ='$price',stock='$stock',cat_id='$category',image='$image' where id=$id";
  $result = mysqli_query($conn,$sql);
  if(!$result){
        set_message('danger',"Error in DB");
        return false;
  }
  return true;
}

function delete_product($conn,$id){
    $sql = "DELETE FROM products WHERE id=$id";
    $result = mysqli_query($conn,$sql);

    return $result;
}