<?php  
      include(__DIR__."/../../../core/config.php");
      include(BASE_PATH."inc/header.php");
?>
<div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="card shadow">

                <div class="card-header bg-dark text-white">
                    <h3 class="mb-0">Add New Product</h3>
                </div>

                <div class="card-body">

                    <form action="<?= BASE_URL  ?>./handlers/admin/products/insert-product.php" method="POST" enctype='multipart/form-data'">

                        <!-- Product Name -->
                        <div class="mb-3">
                            <label class="form-label">Product Name</label>
                            <input
                                type="text"
                                name="Pname"
                                class="form-control"
                                placeholder="Enter product name">
                        </div>

                        <!-- Description -->
                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea
                                name="Pdescription"
                                rows="4"
                                class="form-control"
                                placeholder="Enter product description"></textarea>
                        </div>

                        <div class="row">

                            <!-- Price -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Price ($)</label>
                                <input
                                    type="number"
                                    step="0.01"
                                    name="Pprice"
                                    class="form-control"
                                    placeholder="0.00">
                            </div>

                            <!-- Stock -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Stock</label>
                                <input
                                    type="number"
                                    name="Pstock"
                                    class="form-control"
                                    placeholder="Available quantity">
                            </div>

                        </div>

                        <!-- Category -->
                        <div class="mb-3">
                            <label class="form-label">Category</label>

                            <select
                                name="Pcategory"
                                class="form-select">

                                <option selected disabled>Select Category</option>
                                <option value="1">Laptop</option>
                                <option value="2">PC</option>
                                <option value="3">Phones</option>
                                <option value="4">TV</option>

                            </select>
                        </div>

                        <!-- Image -->
                        <div class="mb-4">
                            <label class="form-label">Product Image</label>

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
                                class="btn btn-primary">

                                Add Product

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

<?php include(BASE_PATH."inc/footer.php"); ?>