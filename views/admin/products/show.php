<?php 
  include(__DIR__."/../../../core/config.php");
  include(BASE_PATH."inc/header.php");

if(!isset($_GET['id'])){
    set_message("danger","Invalid Product ID");
    header("location:index.php");
    exit;
}

$id = (int)$_GET['id'];
$product = show_product($id);
if(!$product){
     set_message('danger',"Product not found");
     header("location:index.php");
     exit;
}

?>

<div class="container py-5">

    <div class="card shadow-lg border-0 rounded-4">

        <div class="card-header bg-primary text-white py-3">
            <h3 class="mb-0">
                <i class="bi bi-box-seam"></i>
                Product Details
            </h3>
        </div>

        <div class="card-body p-4">

            <div class="row">

                <!-- Product Image -->
                <div class="col-md-4 text-center mb-4 mb-md-0">

                    <img src="<?= BASE_URL ?>public/uploadimage/<?= $product['image']; ?>"
                         class="img-fluid rounded shadow"
                         style="max-height:300px;"
                         alt="Product Image">

                </div>

                <!-- Product Information -->
                <div class="col-md-8">

                    <table class="table table-bordered align-middle">

                        <tbody>

                            <tr>
                                <th width="30%">Product Name</th>
                                <td><?= $product['name']; ?></td>
                            </tr>

                            <tr>
                                <th>Category</th>
                                <td><?= $product['category_name']; ?></td>
                            </tr>

                            <tr>
                                <th>Price</th>
                                <td>$<?= $product['price']; ?></td>
                            </tr>

                            <tr>
                                <th>Stock</th>
                                <td>
                                    <span class="badge bg-success fs-6">
                                       <?= $product['stock']; ?> Available
                                    </span>
                                </td>
                            </tr>

                            <tr>
                                <th>Description</th>
                                <td>
                                 <?= $product['description']; ?>
                                </td>
                            </tr>

                        </tbody>

                    </table>

                    <div class="mt-4">
                   <a href="<?= BASE_URL ?>handlers/admin/products/delete-product.php?id=<?= $product['id'];?>" class="btn btn-danger btn-sm">
                        Delete
                    </a>

                        <a href="edit-product.php?id= <?= $product['id']; ?>" class="btn btn-warning">
                            <i class="bi bi-pencil-square"></i>
                            Edit
                        </a>

                        <a href="index.php" class="btn btn-secondary">
                            <i class="bi bi-arrow-left"></i>
                            Back
                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<?php     include(BASE_PATH."inc/footer.php"); ?>