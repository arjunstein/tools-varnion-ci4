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
                        Edit Data User
                    </h1>
                </div>
                <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">
                            <a class="link-fx" href="<?= base_url('backend/users') ?>">Data Users</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">
                            Edit Data User
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
        <form class="js-validation" action="<?= base_url('backend/users/' . $user['id']) ?>" method="POST">
            <?= csrf_field(); ?>
            <input type="hidden" name="_method" value="PUT">
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Form Edit</h3>
                </div>
                <div class="block-content block-content-full">
                    <!-- Regular -->
                    <div class="row items-push">
                        <div class="col-lg-12 col-xl-12">
                            <div class="row mb-1">
                                <div class="col-6">
                                    <label class="form-label" for="username">Username <span class="text-danger">*</span></label>
                                    <input type="hidden" name="username" value="<?= $user['id'] ?>">
                                    <input type="text" class="form-control <?= (!empty($validation) && $validation->hasError('username')) ? 'is-invalid' : '' ?>" id="username" name="username" placeholder="Enter a Username.." value="<?= $user['username'] ?>">
                                    <div id="usernameError">
                                        <?= (!empty($validation) && $validation->hasError('username')) ? '<small class="text-danger">' . $validation->getError('username') . '</small>' : '' ?>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label class="form-label" for="password">Password <span class="text-danger">*</span></label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter a Password.." value="">
                                    <small class="text-danger" style="margin-left:10px;">Kosongkan jika tidak ingin diganti!</small>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-6">
                                    <label class="form-label" for="privilege">Privilege <span class="text-danger">*</span></label>
                                    <select class="form-select <?= (!empty($validation) && $validation->hasError('privilege')) ? 'is-invalid' : '' ?>" id="privilege" name="privilege" data-placeholder="Choose One..">
                                        <option value="<?= $user['privilege'] ?>" selected hidden><?= $user['privilege'] ?></option>
                                        <?php foreach ($categories_privilege as $category_privilege) { ?>
                                            <option value="<?= $category_privilege['name_categories_privilege'] ?>"><?= $category_privilege['name_categories_privilege'] ?></option>
                                        <?php } ?>
                                    </select>
                                    <div id="privilegeError">
                                        <?= (!empty($validation) && $validation->hasError('privilege')) ? '<small class="text-danger">' . $validation->getError('privilege') . '</small>' : '' ?>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label class="form-label" for="privilege">Status <span class="text-danger">*</span></label>
                                    <select class="form-select <?= (!empty($validation) && $validation->hasError('status')) ? 'is-invalid' : '' ?>" id="status" name="status" data-placeholder="Choose One..">
                                        <option value="<?= $user['status'] ?>" selected hidden><?= $user['status'] ?></option>
                                        <option value="Active">Active</option>
                                        <option value="NonActive">NonActive</option>
                                    </select>
                                    <div id="statusError">
                                        <?= (!empty($validation) && $validation->hasError('status')) ? '<small class="text-danger">' . $validation->getError('status') . '</small>' : '' ?>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-lg btn-alt-primary">Update</button>
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