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
                        Add new External Tools
                    </h1>
                </div>
                <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">
                            <a class="link-fx" href="<?= base_url('backend/external_tools') ?>">External Tools</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">
                            Add new External Tools
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
        <form class="js-validation" action="<?= base_url('backend/external_tools/') ?>" method="POST">
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
                                    <label class="form-label" for="val-nameExternalTool">Name External Tool <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control <?= (!empty($validation) && $validation->hasError('val-nameExternalTool')) ? 'is-invalid' : '' ?>" id="val-nameExternalTool" name="val-nameExternalTool" placeholder="Enter a Name..">
                                    <div id="val-nameExternalToolError">
                                        <?= (!empty($validation) && $validation->hasError('val-nameExternalTool')) ? '<small class="text-danger">' . $validation->getError('val-nameExternalTool') . '</small>' : '' ?>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label class="form-label" for="val-urlExternalTool">URL External Tool <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control <?= (!empty($validation) && $validation->hasError('val-urlExternalTool')) ? 'is-invalid' : '' ?>" id="val-urlExternalTool" name="val-urlExternalTool" placeholder="Enter a URL..">
                                    <div id="val-urlExternalToolError">
                                        <?= (!empty($validation) && $validation->hasError('val-urlExternalTool')) ? '<small class="text-danger">' . $validation->getError('val-urlExternalTool') . '</small>' : '' ?>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="val-descriptionExternalTool">Description <span class="text-danger">*</span></label>
                                <textarea class="form-control" id="val-descriptionExternalTool" name="val-descriptionExternalTool" rows="3" placeholder="Enter a Description.."></textarea>
                                <!-- CKEditor 5 Classic Container -->
                                <!-- <div id="js-ckeditor5-classic"></div> -->
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="val-categoriesExternalTool">Categories <span class="text-danger">*</span></label>
                                <select class="js-select2 form-select <?= (!empty($validation) && $validation->hasError('val-categoriesExternalTool')) ? 'is-invalid' : '' ?>" id="val-categoriesExternalTool" name="val-categoriesExternalTool" data-placeholder="Choose One..">
                                    <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                    <?php foreach ($categories_external as $categories_external) { ?>
                                        <option value="<?= $categories_external['name_categories_external'] ?>"><?= $categories_external['name_categories_external'] ?></option>
                                    <?php } ?>
                                </select>
                                <div id="val-categoriesExternalToolError">
                                    <?= (!empty($validation) && $validation->hasError('val-categoriesExternalTool')) ? '<small class="text-danger">' . $validation->getError('val-categoriesExternalTool') . '</small>' : '' ?>
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