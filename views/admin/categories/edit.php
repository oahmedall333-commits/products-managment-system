<?php

  include(__DIR__."/../../../core/config.php");
  include (BASE_PATH."inc/header.php");
  admin();

  if(!isset($_GET['id'])){
    set_message("danger","Invalid Category ID");
    header("Location:".BASE_URL."views/admin/categories/index.php");
    exit;
  }

  $id = (int)$_GET['id'];
  $category = get_category_by_id($conn,$id);
  if(!$category){
    set_message('danger',"Category Not Found");
    header("Location:".BASE_URL."views/admin/categories/index.php");
    exit;
  }

?>

<div class="container mt-5 mb-5">

    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2>Edit Category</h2>
            <p class="text-muted mb-0">
                Update category information
            </p>
        </div>

        <a href="index.php" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left"></i>
            Back
        </a>

    </div>

    <!-- Edit Category Card -->
    <div class="row justify-content-center">

        <div class="col-md-8 col-lg-6">

            <div class="card border-0 shadow-lg edit-card">

                <div class="card-header bg-warning text-dark text-center py-4">

                    <div class="edit-icon">
                        <i class="bi bi-pencil-square"></i>
                    </div>

                    <h3 class="mb-0 mt-3">
                        Edit Category
                    </h3>

                </div>

                <div class="card-body p-4">

                    <form action="<?= BASE_URL?>handlers/admin/categories/update-category.php" method="POST">
                        <input type="hidden" value="<?= $category['id']; ?>" name='id' >

                        <!-- Category ID -->
                        <div class="mb-3">

                            <label class="form-label">
                                Category ID
                            </label>

                            <input
                                type="text"
                                class="form-control"
                                value="<?= $category['id'] ?>"
                                disabled
                            >

                        </div>

                        <!-- Category Name -->
                        <div class="mb-4">

                            <label for="category_name"
                                   class="form-label">
                                Category Name
                            </label>

                            <input
                                type="text"
                                name="category_name"
                                id="category_name"
                                class="form-control form-control-lg"
                                value="<?= $category['name'] ?>"
                                placeholder="Enter category name"
                            >

                        </div>

                        <!-- Buttons -->
                        <div class="d-flex justify-content-end gap-2">

                            <a href="index.php"
                               class="btn btn-secondary">

                                <i class="bi bi-x-lg"></i>
                                Cancel

                            </a>

                            <button type="submit"
                                    class="btn btn-warning">

                                <i class="bi bi-check-lg"></i>
                                Update Category

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>


<style>

/* Edit Card Animation */

.edit-card {
    opacity: 0;
    transform: translateY(30px);
    animation: editCardEnter 0.7s ease forwards;
    transition: 0.3s ease;
}

.edit-card:hover {
    transform: translateY(-5px);
}


/* Card Entrance */

@keyframes editCardEnter {

    from {
        opacity: 0;
        transform: translateY(30px);
    }

    to {
        opacity: 1;
        transform: translateY(0);
    }

}


/* Edit Icon */

.edit-icon {

    width: 75px;
    height: 75px;

    margin: auto;

    border-radius: 50%;

    background: rgba(0, 0, 0, 0.08);

    display: flex;

    align-items: center;
    justify-content: center;

    font-size: 34px;

    animation: iconPulse 2s infinite;

}


@keyframes iconPulse {

    0% {
        transform: scale(1);
    }

    50% {
        transform: scale(1.08);
    }

    100% {
        transform: scale(1);
    }

}


/* Input */

.form-control {

    transition: all 0.25s ease;

}


.form-control:focus {

    transform: translateY(-2px);

}


/* Buttons */

.btn {

    transition: all 0.25s ease;

}


.btn:hover {

    transform: translateY(-2px);

}

</style>

<?php include (BASE_PATH."inc/footer.php"); ?>