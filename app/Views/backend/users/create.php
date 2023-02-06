<?= $this->extend('layouts/backend/templates') ?>
<?= $this->section('content') ?>
<!-- Main Container -->
<main id="main-container">
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
                <div class="flex-grow-1">
                    <h1 class="h3 fw-bold">
                        Add new User
                    </h1>
                </div>
                <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">
                            <a class="link-fx" href="<?= base_url('backend/users') ?>">Data Users</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">
                            Add new User
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- END Hero -->

    <!-- Page Content -->
    <div class="content">
        <!-- jQuery Validation (.js-validation class is initialized in js/pages/be_forms_validation.min.js which was auto compiled from _js/pages/be_forms_validation.js) -->
        <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->
        <form class="js-validation" action="<?= base_url('backend/users/') ?>" method="POST">
            <?= csrf_field(); ?>
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Form Add</h3>
                </div>
                <div class="block-content block-content-full">
                    <!-- Regular -->
                    <div class="row items-push">
                        <div class="col-lg-12 col-xl-12">
                            <div class="row mb-3">
                                <div class="col-6">
                                    <label class="form-label" for="val-username">Username <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control <?= (!empty($validation) && $validation->hasError('val-username')) ? 'is-invalid' : '' ?>" id="val-username" name="val-username" placeholder="Enter a Username..">
                                    <div id="val-usernameError">
                                        <?= (!empty($validation) && $validation->hasError('val-username')) ? '<small class="text-danger">' . $validation->getError('val-username') . '</small>' : '' ?>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label class="form-label" for="val-password">Password <span class="text-danger">*</span></label>
                                    <input type="password" class="form-control <?= (!empty($validation) && $validation->hasError('val-password')) ? 'is-invalid' : '' ?>" id="val-password" name="val-password" placeholder="Enter a Password..">
                                    <div id="val-passwordError">
                                        <?= (!empty($validation) && $validation->hasError('val-password')) ? '<small class="text-danger">' . $validation->getError('val-password') . '</small>' : '' ?>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="val-privilege">Privilege <span class="text-danger">*</span></label>
                                <select class="js-select2 form-select <?= (!empty($validation) && $validation->hasError('val-privilege')) ? 'is-invalid' : '' ?>" id="val-privilege" name="val-privilege" data-placeholder="Choose One..">
                                    <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                    <?php foreach ($categories_privilege as $category_privilege) { ?>
                                        <option value="<?= $category_privilege['name_categories_privilege'] ?>"><?= $category_privilege['name_categories_privilege'] ?></option>
                                    <?php } ?>
                                </select>
                                <div id="val-privilegeError">
                                    <?= (!empty($validation) && $validation->hasError('val-privilege')) ? '<small class="text-danger">' . $validation->getError('val-privilege') . '</small>' : '' ?>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-lg btn-alt-primary">Create</button>
                        </div>
                    </div>
                    <!-- END Regular -->
                </div>
            </div>
        </form>
        <!-- jQuery Validation -->
    </div>
    <!-- END Page Content -->
</main>
<!-- END Main Container -->

<?= $this->endSection() ?>