<?php
include(__DIR__ . "/../../../core/config.php");
include(BASE_PATH . "inc/header.php");
?>

<div class="container mt-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Products</h2>

        <a href="create.php" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Add Product
        </a>
    </div>

    <table class="table table-bordered table-hover text-center align-middle">

        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Category</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Image</th>
                <th width="250">Actions</th>
            </tr>
        </thead>

        <tbody>
        <?php  $products = get_all_products(); ?>
        <?php foreach($products as $product):   ?>
             <tr>

                <td><?= $product['id'];  ?></td>



                <td><?= $product['name'];  ?></td>

                <td><?= $product['category_name'];  ?></td>

                <td><?= $product['price'];  ?></td>

                <td><?= $product['stock'];  ?></td>
                <td>
                    <img src="<?= BASE_URL?>public/uploadimage/<?=$product['image']; ?>" width="70" alt="Product Image">
                </td>

                <td>

                    <a href="show.php?id=<?= $product['id'];  ?>" class="btn btn-info btn-sm">
                        View
                    </a>

                    <a href="edit-product.php?id=<?= $product['id']; ?>" class="btn btn-warning btn-sm">
                        Edit
                    </a>

                    <a href="<?= BASE_URL ?>handlers/admin/products/delete-product.php?id=<?= $product['id'];?>" class="btn btn-danger btn-sm">
                        Delete
                    </a>

                </td>

            </tr> 
<?php endforeach ?>
        </tbody>

    </table>

</div>

<?php include(BASE_PATH . "inc/footer.php"); ?>