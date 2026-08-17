<?php include(__DIR__."/../../../core/config.php");
      include(BASE_PATH."inc/header.php");
      admin();
?>
<div class="container mt-5 mb-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Create Category</h2>

        <a href="index.php" class="btn btn-secondary">
            Back
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">

            <form action="<?= BASE_URL ?>handlers/admin/categories/insert-category.php" method="POST">

                <div class="mb-3">
                    <label for="category_name" class="form-label">
                        Category Name
                    </label>

                    <input
                        type="text"
                        name="category_name"
                        id="category_name"
                        class="form-control"
                        placeholder="Enter category name"
                    >
                </div>

                <button type="submit" class="btn btn-primary">
                    Create Category
                </button>

            </form>

        </div>
    </div>

</div>
<?php include(BASE_PATH."inc/footer.php");  ?>