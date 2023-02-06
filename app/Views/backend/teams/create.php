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
                        Add new Team
                    </h1>
                </div>
                <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">
                            <a class="link-fx" href="<?= base_url('backend/teams') ?>">Data Teams</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">
                            Add new Team
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
        <form class="js-validation col-8" action="<?= base_url('backend/teams/') ?>" method="POST">
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
                                <div class="col-12">
                                    <label class="form-label" for="val-nameTeam">Name Team <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control <?= (!empty($validation) && $validation->hasError('val-nameTeam')) ? 'is-invalid' : '' ?>" id="val-nameTeam" name="val-nameTeam" placeholder="Enter a Name Team..">
                                    <div id="val-nameTeamError">
                                        <?= (!empty($validation) && $validation->hasError('val-nameTeam')) ? '<small class="text-danger">' . $validation->getError('val-nameTeam') . '</small>' : '' ?>
                                    </div>
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