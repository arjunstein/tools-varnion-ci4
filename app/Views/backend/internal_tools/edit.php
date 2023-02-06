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
                        Edit Data Internal Tool
                    </h1>
                </div>
                <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">
                            <a class="link-fx" href="<?= base_url('backend/internal_tools') ?>">Data Internal Tools</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">
                            Edit Data Internal Tool
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
        <form class="js-validation" action="<?= base_url('backend/internal_tools/' . $internal_tool['id_internal_tools']) ?>" method="POST">
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
                                    <label class="form-label" for="nameInternalTool">Name Internal Tool <span class="text-danger">*</span></label>
                                    <input type="hidden" name="nameInternalTool" value="<?= $internal_tool['id_internal_tools'] ?>">
                                    <input type="text" class="form-control <?= (!empty($validation) && $validation->hasError('nameInternalTool')) ? 'is-invalid' : '' ?>" id="nameInternalTool" name="nameInternalTool" placeholder="Enter a Name Internal Tool.." value="<?= $internal_tool['name_internal_tools'] ?>">
                                    <div id="nameInternalToolError">
                                        <?= (!empty($validation) && $validation->hasError('nameInternalTool')) ? '<small class="text-danger">' . $validation->getError('nameInternalTool') . '</small>' : '' ?>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label class="form-label" for="urlInternalTool">URL Internal Tool <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control <?= (!empty($validation) && $validation->hasError('urlInternalTool')) ? 'is-invalid' : '' ?>" id="urlInternalTool" name="urlInternalTool" placeholder="Enter a URL Internal Tool.." value="<?= $internal_tool['url_internal_tools'] ?>">
                                    <div id="urlInternalToolError">
                                        <?= (!empty($validation) && $validation->hasError('urlInternalTool')) ? '<small class="text-danger">' . $validation->getError('urlInternalTool') . '</small>' : '' ?>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="description">Description <span class="text-danger">*</span></label>
                                <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter a Description.."><?= $internal_tool['description_internal_tools'] ?></textarea>
                                <!-- CKEditor 5 Classic Container -->
                                <!-- <div id="js-ckeditor5-classic"></div> -->
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="categories">Categories <span class="text-danger">*</span></label>
                                <select class="form-select <?= (!empty($validation) && $validation->hasError('categories')) ? 'is-invalid' : '' ?>" id="categories" name="categories" data-placeholder="Choose One..">
                                    <option value="<?= $internal_tool['category_internal_tools'] ?>" selected hidden><?= $internal_tool['category_internal_tools'] ?></option>
                                    <?php foreach ($categories as $category) { ?>
                                        <option value="<?= $category['name_categories'] ?>"><?= $category['name_categories'] ?></option>
                                    <?php } ?>
                                </select>
                                <div id="categoriesError">
                                    <?= (!empty($validation) && $validation->hasError('categories')) ? '<small class="text-danger">' . $validation->getError('categories') . '</small>' : '' ?>
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