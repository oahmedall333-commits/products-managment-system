<?php 
    include(BASE_PATH."core/functions.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Shop Homepage - EraSoft PMS Template</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    </head>
    <body>
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
    <div class="container">

        <!-- Logo -->
        <a class="navbar-brand fw-bold" href="index.php">
            Simple E-Commerce
        </a>

        <button class="navbar-toggler" type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse" id="navbarNav">

            <!-- Right Side -->
            <ul class="navbar-nav me-auto">

                <li class="nav-item">
                    <a class="nav-link active" href="index.php">Home</a>
                </li>


                <li class="nav-item">
                    <a class="nav-link" href="about.php">About</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact</a>
                </li>

            </ul>

            <!-- Left Side -->
            <ul class="navbar-nav align-items-center">

                <li class="nav-item me-3">
                    <span class="navbar-text">
                        Hello,  👋
                    </span>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="dashboard.php">
                        User Panel
                    </a>
                </li>

                <li class="nav-item">
                    <a class="btn btn-outline-danger ms-2" href="logout.php">
                        Logout
                    </a>
                </li>

            </ul>

        </div>

    </div>
</nav>
<?php show_message();?>
