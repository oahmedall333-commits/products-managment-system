<?php 
  include(__DIR__."/../../../core/config.php");
  include (BASE_PATH."inc/header.php");
  admin();
?>

<div class="container mt-5">

    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2>Categories</h2>
            <p class="text-muted mb-0">
                Manage product categories
            </p>
        </div>

        <a href="create.php" class="btn btn-primary">
            <i class="bi bi-plus-lg"></i>
            Create Category
        </a>

    </div>

    <!-- Categories Table -->
    <div class="card shadow-sm" mt-5 mb-5>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover align-middle mb-0">

                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Category Name</th>
                            <th>Created At</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>

                    <tbody>

                        <!-- Category Row -->
                 <?php $categories = get_all_categories($conn);
                       foreach($categories as $category):
                 ?>
                        <tr>

                            <td><?= $category['id'] ?></td>

                            <td>
                                <strong><?= $category['name'] ?></strong>
                            </td>

                            <td>
                                <?= $category['created_at'] ?>
                            </td>

                            <td class="text-center">

                                <a href="show.php?id=<?= $category['id'] ?>"
                                   class="btn btn-sm btn-info text-white">
                                    <i class="bi bi-eye"></i>
                                    Show
                                </a>

                                <a href="edit.php?id=<?= $category['id']; ?>"
                                   class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil"></i>
                                    Edit
                                </a>

                                <a href="<?= BASE_URL?>handlers/admin/categories/delete-category.php?id=<?= $category['id']; ?>"
                                   class="btn btn-sm btn-danger">
                                    <i class="bi bi-trash"></i>
                                    Delete
                                </a>

                            </td>

                        </tr>
                      <?php endforeach; ?>


                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>
<?php    include (BASE_PATH."inc/footer.php"); ?>