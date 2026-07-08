<?php
include(__DIR__."/../../core/config.php");
include(BASE_PATH."inc/header.php");
?>

<body>

<div class="container-fluid">

    <div class="row">

        <!-- Sidebar -->
        <div class="col-md-3 col-lg-2 bg-dark text-white min-vh-100 p-3">

            <h3 class="text-center mb-4">Admin</h3>

            <div class="list-group">

                <a href="products/index.php" class="list-group-item list-group-item-action">
                    <i class="bi bi-box-seam"></i>
                    View Products
                </a>

                <a href="products/create.php" class="list-group-item list-group-item-action">
                    <i class="bi bi-plus-square"></i>
                    Add Product
                </a>

                <a href="users/index.php" class="list-group-item list-group-item-action">
                    <i class="bi bi-people"></i>
                    View Users
                </a>

                <a href="users/create.php" class="list-group-item list-group-item-action">
                    <i class="bi bi-person-plus"></i>
                    Add User
                </a>

            </div>

        </div>

        <!-- Content -->
        <div class="col-md-9 col-lg-10 p-5">

            <h2>Dashboard</h2>
            <hr>

            <div class="row g-4">

                <!-- Add Product -->
                <div class="col-md-6">
                    <div class="card shadow h-100">
                        <div class="card-body text-center">

                            <i class="bi bi-plus-square display-3 text-primary"></i>

                            <h4 class="mt-3">Add Product</h4>

                            <a href="products/create.php"
                               class="btn btn-primary mt-3">
                                Add Product
                            </a>

                        </div>
                    </div>
                </div>

                <!-- View Products -->
                <div class="col-md-6">
                    <div class="card shadow h-100">
                        <div class="card-body text-center">

                            <i class="bi bi-box-seam display-3 text-info"></i>

                            <h4 class="mt-3">View Products</h4>

                            <a href="products/index.php"
                               class="btn btn-info text-white mt-3">
                                View Products
                            </a>

                        </div>
                    </div>
                </div>

                <!-- Add User -->
                <div class="col-md-6">
                    <div class="card shadow h-100">
                        <div class="card-body text-center">

                            <i class="bi bi-person-plus display-3 text-success"></i>

                            <h4 class="mt-3">Add User</h4>

                            <a href="users/create.php"
                               class="btn btn-success mt-3">
                                Add User
                            </a>

                        </div>
                    </div>
                </div>

                <!-- View Users -->
                <div class="col-md-6">
                    <div class="card shadow h-100">
                        <div class="card-body text-center">

                            <i class="bi bi-people display-3 text-warning"></i>

                            <h4 class="mt-3">View Users</h4>

                            <a href="users/index.php"
                               class="btn btn-warning text-dark mt-3">
                                View Users
                            </a>

                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

</div>

<?php include(BASE_PATH."inc/footer.php"); ?>

</body>
</html>