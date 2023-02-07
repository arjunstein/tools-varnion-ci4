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
                        Edit Data External Tool
                    </h1>
                </div>
                <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">
                            <a class="link-fx" href="<?= base_url('backend/external_tools') ?>">Data External Tools</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">
                            Edit Data External Tool
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
        <form class="js-validation" action="<?= base_url('backend/external_tools/' . $external_tool['id_external_tools']) ?>" method="POST">
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
                            <div class="row mb-3">
                                <div class="col-6">
                                    <label class="form-label" for="nameExternalTool">Name External Tool <span class="text-danger">*</span></label>
                                    <input type="hidden" name="nameExternalTool" value="<?= $external_tool['id_external_tools'] ?>">
                                    <input type="text" class="form-control <?= (!empty($validation) && $validation->hasError('nameExternalTool')) ? 'is-invalid' : '' ?>" id="nameExternalTool" name="nameExternalTool" placeholder="Enter a Name External Tool.." value="<?= $external_tool['name_external_tools'] ?>">
                                    <div id="nameExternalToolError">
                                        <?= (!empty($validation) && $validation->hasError('nameExternalTool')) ? '<small class="text-danger">' . $validation->getError('nameExternalTool') . '</small>' : '' ?>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label class="form-label" for="urlExternalTool">URL External Tool <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control <?= (!empty($validation) && $validation->hasError('urlExternalTool')) ? 'is-invalid' : '' ?>" id="urlExternalTool" name="urlExternalTool" placeholder="Enter a URL External Tool.." value="<?= $external_tool['url_external_tools'] ?>">
                                    <div id="urlExternalToolError">
                                        <?= (!empty($validation) && $validation->hasError('urlExternalTool')) ? '<small class="text-danger">' . $validation->getError('urlExternalTool') . '</small>' : '' ?>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="descriptionExternalTool">Description <span class="text-danger">*</span></label>
                                <textarea class="form-control" id="descriptionExternalTool" name="descriptionExternalTool" rows="3" placeholder="Enter a Description.."><?= $external_tool['description_external_tools'] ?></textarea>
                                <!-- CKEditor 5 Classic Container -->
                                <!-- <div id="js-ckeditor5-classic"></div> -->
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="categoriesExternalTool">Categories <span class="text-danger">*</span></label>
                                <select class="form-select <?= (!empty($validation) && $validation->hasError('categoriesExternalTool')) ? 'is-invalid' : '' ?>" id="categoriesExternalTool" name="categoriesExternalTool" data-placeholder="Choose One..">
                                    <option value="<?= $external_tool['category_external_tools'] ?>" selected hidden><?= $external_tool['category_external_tools'] ?></option>
                                    <?php foreach ($categories_external as $category_external) { ?>
                                        <option value="<?= $category_external['name_categories_external'] ?>"><?= $category_external['name_categories_external'] ?></option>
                                    <?php } ?>
                                </select>
                                <div id="categoriesExternalToolError">
                                    <?= (!empty($validation) && $validation->hasError('categoriesExternalTool')) ? '<small class="text-danger">' . $validation->getError('categoriesExternalTool') . '</small>' : '' ?>
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