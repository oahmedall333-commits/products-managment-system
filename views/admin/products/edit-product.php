<?php
include(__DIR__ . "/../../../core/config.php");
include(BASE_PATH . "inc/header.php");

if(!isset($_GET['id'])){
    set_message("danger","ID Not Exists");
    header("location:index.php");
    exit;
}

$id = (int)$_GET['id'];
$product = show_product($id);
if(!$product){
    set_message("danger","product not found");
    header("location:index.php");
    exit;
}


?>
<div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="card shadow">

                <div class="card-header bg-warning text-dark">
                    <h3 class="mb-0">Edit Product</h3>
                </div>

                <div class="card-body">

                    <form action="<?= BASE_URL ?>handlers/admin/products/update-product.php" method="POST" enctype="multipart/form-data">

                        <!-- Hidden Product ID -->
                        <input type="hidden" name="id" value="<?= $product['id']; ?>">

                        <!-- Product Name -->
                        <div class="mb-3">
                            <label class="form-label">Product Name</label>
                            <input
                                type="text"
                                name="Pname"
                                value="<?= $product['name']; ?>"
                                class="form-control">
                        </div>

                        <!-- Description -->
                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea
                                name="Pdescription"
                                rows="4"
                                class="form-control"><?= $product['description']; ?></textarea>
                        </div>

                        <div class="row">

                            <!-- Price -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Price ($)</label>
                                <input
                                    type="number"
                                    step="0.01"
                                    value="<?= $product['price']; ?>"
                                    name="Pprice"
                                    class="form-control">
                            </div>

                            <!-- Stock -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Stock</label>
                                <input
                                    type="number"
                                    value="<?= $product['stock']; ?>"
                                    name="Pstock"
                                    class="form-control">
                            </div>

                        </div>

                        <!-- Category -->
                        <div class="mb-3">
                            <label class="form-label">Category</label>

                            <select
                                name="Pcategory"
                                class="form-select">
                                
                                <option>Select Category</option>
                                <option value="1"  <?= $product['cat_id']==1 ? "selected":""; ?>>Laptop</option>
                                <option value="2" <?= $product['cat_id']==2 ? "selected":""; ?>>PC</option>
                                <option value="3" <?= $product['cat_id']==3 ? "selected":""; ?>>Phones</option>
                                <option value="4" <?= $product['cat_id']==4 ? "selected":""; ?>>TV</option>

                            </select>
                        </div>

                        <!-- Current Image -->
                        <div class="mb-3">
                            <label class="form-label">Current Image</label>

                            <div class="border rounded p-2 text-center">
                                <img src="<?= BASE_URL ?>public/uploadimage/<?= $product['image']; ?>" class="img-fluid rounded" style="max-width:150px;">
                            </div>
                            <input type="hidden" name="old_image" value="<?= $product['image']; ?>">
                        </div>

                        <!-- Change Image -->
                        <div class="mb-4">
                            <label class="form-label">Change Image</label>

                            <input
                                type="file"
                                name="Pimage"
                                class="form-control">
                        </div>

                        <div class="d-flex justify-content-between">

                            <a href="index.php" class="btn btn-secondary">
                                Cancel
                            </a>

                            <button
                                type="submit"
                                class="btn btn-warning">
                                Update Product
                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>
<?php include(BASE_PATH . "inc/footer.php"); ?>