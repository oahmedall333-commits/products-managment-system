
<?php
include(__DIR__."/../../core/config.php");
include(BASE_PATH."inc/header.php");
guest();
?>

<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">

            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-body p-4">

                    <h2 class="text-center mb-4">Login</h2>

                    <form action="<?= BASE_URL ?>handlers/auth/login.php" method="POST">

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input
                                type="email"
                                class="form-control"
                                id="email"
                                value="<?= old('email'); ?>";
                                name="email"
                                placeholder="Enter your email">
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input
                                type="password"
                                class="form-control"
                                id="password"
                                name="password"
                                placeholder="Enter your password">
                        </div>

                        <!-- Remember Me -->
                        <div class="form-check mb-3">
                            <input
                                class="form-check-input"
                                type="checkbox"
                                id="remember"
                                name="remember">
                            <label class="form-check-label" for="remember">
                                Remember Me
                            </label>
                        </div>

                        <!-- Login Button -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">
                                Login
                            </button>
                        </div>

                    </form>

                    <hr>

                    <div class="text-center">
                        <p class="mb-0">
                            Don't have an account?
                            <a href="<?= BASE_URL ?>views/auth/register.php" class="text-decoration-none">
                                Register
                            </a>
                        </p>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
<?php clear_old();  ?>
<?php include(BASE_PATH."inc/footer.php"); ?>