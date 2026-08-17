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
    set_message("danger","Category Not Found");
    header("Location:".BASE_URL."views/admin/categories/index.php");
    exit;
  }
?>


<div class="container mt-5 pb-5">
        <!-- Back Button -->
    <div class="mb-4">
        <a href="index.php" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left"></i>
            Back to Categories
        </a>
    </div>

    <!-- Category Details -->
    <div class="row justify-content-center">

        <div class="col-md-7 col-lg-6">

            <div class="card border-0 shadow-lg category-card">

                <!-- Header -->
                <div class="card-header bg-primary text-white text-center py-4">

                    <div class="category-icon">
                        <i class="bi bi-folder2-open"></i>
                    </div>

                    <h3 class="mb-0 mt-3">
                        Category Details
                    </h3>

                </div>

                <!-- Body -->
                <div class="card-body p-4">

                    <div class="info-item">

                        <div class="info-icon">
                            <i class="bi bi-hash"></i>
                        </div>

                        <div>
                            <small class="text-muted">
                                Category ID
                            </small>

                            <h5 class="mb-0">
                                <?= $category['id'] ?>
                            </h5>
                        </div>

                    </div>

                    <div class="info-item">

                        <div class="info-icon">
                            <i class="bi bi-tag"></i>
                        </div>

                        <div>
                            <small class="text-muted">
                                Category Name
                            </small>

                            <h5 class="mb-0">
                                <?= $category['name'] ?>
                            </h5>
                        </div>

                    </div>

                    <div class="info-item">

                        <div class="info-icon">
                            <i class="bi bi-calendar3"></i>
                        </div>

                        <div>
                            <small class="text-muted">
                                Created At
                            </small>

                            <h5 class="mb-0">
                                <?= $category['created_at'] ?>
                            </h5>
                        </div>

                    </div>

                </div>

                <!-- Footer -->
                <div class="card-footer bg-white border-0 p-4">

                    <div class="d-flex justify-content-center gap-2">

                        <a href="edit.php"
                           class="btn btn-warning">
                            <i class="bi bi-pencil"></i>
                            Edit
                        </a>

                        <a href="index.php"
                           class="btn btn-secondary">
                            <i class="bi bi-arrow-left"></i>
                            Back
                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>


<style>

/* Card Animation */

.category-card {
    opacity: 0;
    transform: translateY(30px);
    animation: cardEnter 0.7s ease forwards;
    transition: 0.3s ease;
}

.category-card:hover {
    transform: translateY(-6px);
}


/* Card Entrance */

@keyframes cardEnter {

    from {
        opacity: 0;
        transform: translateY(30px);
    }

    to {
        opacity: 1;
        transform: translateY(0);
    }

}


/* Category Icon */

.category-icon {

    width: 75px;
    height: 75px;

    margin: auto;

    border-radius: 50%;

    background: rgba(255,255,255,0.15);

    display: flex;

    align-items: center;
    justify-content: center;

    font-size: 35px;

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


/* Info Items */

.info-item {

    display: flex;

    align-items: center;

    gap: 15px;

    padding: 18px;

    margin-bottom: 12px;

    border-radius: 12px;

    background: #f8f9fa;

    opacity: 0;

    transform: translateX(-20px);

    animation: itemEnter 0.6s ease forwards;

    transition: 0.3s ease;

}


.info-item:nth-child(1) {
    animation-delay: 0.2s;
}

.info-item:nth-child(2) {
    animation-delay: 0.35s;
}

.info-item:nth-child(3) {
    animation-delay: 0.5s;
}


.info-item:hover {

    transform: translateX(6px);

    background: #eef3ff;

}


@keyframes itemEnter {

    from {
        opacity: 0;
        transform: translateX(-20px);
    }

    to {
        opacity: 1;
        transform: translateX(0);
    }

}


/* Info Icons */

.info-icon {

    width: 45px;
    height: 45px;

    border-radius: 10px;

    background: #e9ecef;

    display: flex;

    align-items: center;
    justify-content: center;

    font-size: 20px;

}


/* Buttons */

.btn {
    transition: 0.25s ease;
}

.btn:hover {
    transform: translateY(-2px);
}

</style>

<?php  include (BASE_PATH."inc/footer.php");  ?>