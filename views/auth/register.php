<?php
include(__DIR__."/../../core/config.php");
include(BASE_PATH."inc/header.php");
guest();

?>
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow">
                <div class="card-header text-center">
                    <h3>Register</h3>
                </div>

                <div class="card-body">

                    <form action="<?= BASE_URL ?>handlers/auth/register.php" method="POST">

                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input
                                type="text"
                                name="name"
                                value="<?= old('name'); ?>"
                                class="form-control"
                                placeholder="Enter your name">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input
                                type="email"
                                name="email"
                                value="<?= old('email'); ?>"
                                class="form-control"
                                placeholder="Enter your email">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input
                                type="password"
                                name="password"
                                class="form-control"
                                placeholder="Enter your password">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Confirm Password</label>
                            <input
                                type="password"
                                name="confirm_password"
                                class="form-control"
                                placeholder="Confirm your password">
                        </div>

                        <div class="d-grid">
                            <button class="btn btn-primary">
                                Register
                            </button>
                        </div>

                    </form>

                </div>

                <div class="card-footer text-center">
                    Already have an account?
                    <a href="<?= BASE_URL ?>views/auth/login.php">
                        Login
                    </a>
                </div>

            </div>

        </div>
    </div>
</div>
<?php clear_old(); ?>
<?php include(BASE_PATH."inc/footer.php"); ?>