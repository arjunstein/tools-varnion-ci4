<?= $this->extend('layouts/auth/templates') ?>
<?= $this->section('content') ?>
<main id="main-container">
    <!-- Page Content -->
    <div class="hero-static d-flex align-items-center">
        <div class="content">
            <div class="row justify-content-center push">
                <div class="col-md-8 col-lg-6 col-xl-4">
                    <!-- Sign In Block -->
                    <div class="block block-rounded mb-0">
                        <!-- <div class="block-header block-header-default">
                            <h3 class="block-title">Sign In</h3>
                            <div class="block-options">
                                <a class="btn-block-option fs-sm" href="op_auth_reminder.html">Forgot Password?</a>
                                <a class="btn-block-option" href="op_auth_signup.html" data-bs-toggle="tooltip" data-bs-placement="left" title="New Account">
                                    <i class="fa fa-user-plus"></i>
                                </a>
                            </div>
                        </div> -->
                        <div class="block-content">
                            <div class="p-sm-3 px-lg-4 px-xxl-5 py-lg-5">

                                <h1 class="h2 mb-1"><img src="<?= base_url('assets/images/favicon.png') ?>" style="display:inline-block;" class="rounded" alt="" width="35"> Tools <strong>Varnion</strong></h1>
                                <p class="fw-medium text-muted">
                                    Welcome, Please Login.
                                </p>

                                <!-- Session Alert -->
                                <?php if (session()->getFlashdata('error')) : ?>
                                    <div class="alert alert-danger alert-dismissible" role="alert">
                                        <p class="mb-0">
                                            <?= session()->getFlashdata('error') ?>
                                        </p>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                <?php endif ?>
                                <!-- End Session Alert -->

                                <!-- Sign In Form -->
                                <!-- jQuery Validation (.js-validation-signin class is initialized in js/pages/op_auth_signin.min.js which was auto compiled from _js/pages/op_auth_signin.js) -->
                                <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
                                <form class="js-validation-signin" action="<?= base_url('auth/login/proccess') ?>" method="POST" id="loginForm">
                                    <div class="py-3">
                                        <div class="mb-4">
                                            <label for="username">Username</label>
                                            <input type="text" class="form-control form-control-alt form-control-lg <?= (!empty($validation) && $validation->hasError('username')) ? 'is-invalid' : '' ?>" id="username" name="username" placeholder="Username" onkeyup="validationUsername()">
                                            <div id="usernameError">
                                                <?= (!empty($validation) && $validation->hasError('username')) ? '<small class="text-danger">' . $validation->getError('username') . '</small>' : '' ?>
                                            </div>
                                        </div>
                                        <div class="mb-4">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control form-control-alt form-control-lg <?= (!empty($validation) && $validation->hasError('password')) ? 'is-invalid' : '' ?>" id="password" name="password" placeholder="Password" onkeyup="validationPassword()">
                                            <div id="passwordError">
                                                <?= (!empty($validation) && $validation->hasError('password')) ? '<small class="text-danger">' . $validation->getError('password') . '</small>' : '' ?>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-md-6 col-xl-5">
                                            <button type="submit" class="btn w-100 btn-alt-primary" id="submit">
                                                <i class="fa fa-fw fa-sign-in-alt me-1"></i> Login
                                            </button>
                                            <div id="submitError">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <!-- END Sign In Form -->
                            </div>
                        </div>
                    </div>
                    <!-- END Sign In Block -->
                </div>
            </div>
            <div class="fs-sm text-muted text-center">
                <strong>Varnion </strong> &copy; <span data-toggle="year-copy"></span>
            </div>
        </div>
    </div>
    <!-- END Page Content -->
</main>

<?= $this->endSection() ?>