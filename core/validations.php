<?php


function validate_required(string $value,string $fieldName){
    return (!empty(trim($value)))? null : "$fieldName is required";
}

function validate_max_length(string $value,int $max){
    return !(strlen(trim($value)) > $max)? null : "name must be less than $max characters";
}

function validate_min_length($value,$min){
    return !(strlen(trim($value))<$min)? null : "name must be greater than $min characters";
}

function validate_price($price){
    $price = trim($price);
    return (is_numeric($price) && $price > 0)? null : "price must be positive number";
}

function validate_stock($stock){
    $stock = trim($stock);
    return (filter_var($stock,FILTER_VALIDATE_INT) !== false && $stock >= 0)? null: "Stock must be a non-negative integer.";
}

function validate_category($category){
    $allowed_category = [1, 2, 3, 4];
    return (in_array($category,$allowed_category))? null : "Please select a valid category.";
}

function validate_image($image){
    $allowed = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
    $extension = strtolower(pathinfo($image['name'],PATHINFO_EXTENSION));
    if($image['error'] ==   UPLOAD_ERR_NO_FILE){
        return "image is required";
    }elseif($image['error'] !== UPLOAD_ERR_OK){
        return "error while uploading image";
    }elseif(!getimagesize($image['tmp_name'])){
        return "must be valid image";
    }elseif(!in_array($extension,$allowed)){
        return "invalid image format";
    }elseif($image['size']> 2 *1024*1024){
        return "image size must be less than 2 MB";
    }
    return null;
}

function validate_product($name,$price,$stock,$category,$image){
    $fields = [
    'name' => $name,
    'price' => $price,
    'stock' => $stock,
    'category' => $category
    ];
    foreach($fields as $fieldname=>$value){
        if($error = validate_required($value,$fieldname)){
            return $error;
        }
    }
    if($error = validate_max_length($name,100)){
        return $error;
    }
    if($error = validate_min_length($name,3)){
        return $error;
    }
    if($error = validate_price($price)){
        return $error;
    }
    if($error = validate_stock($stock)){
        return $error;
    }
    if($error = validate_category($category)){
        return $error;
    }
    if($error = validate_image($image)){
        return $error;
    }
    return null;
}