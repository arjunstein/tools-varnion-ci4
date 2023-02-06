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
                        Edit Data Category Notes
                    </h1>
                </div>
                <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">
                            <a class="link-fx" href="<?= base_url('backend/categories') ?>">Data Categories Notes</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">
                            Edit Data Category Notes
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
        <form class="js-validation" action="<?= base_url('backend/categories_notes/' . $category_notes['id_categories_notes']) ?>" method="POST">
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
                                    <label class="form-label" for="nameCategoryNotes">Name Category Notes <span class="text-danger">*</span></label>
                                    <input type="hidden" name="nameCategoryNotes" value="<?= $category_notes['id_categories_notes'] ?>">
                                    <input type="text" class="form-control <?= (!empty($validation) && $validation->hasError('nameCategoryNotes')) ? 'is-invalid' : '' ?>" id="nameCategoryNotes" name="nameCategoryNotes" placeholder="Enter a Name Category.." value="<?= $category_notes['name_categories_notes'] ?>">
                                    <div id="nameCategoryNotesError">
                                        <?= (!empty($validation) && $validation->hasError('nameCategoryNotes')) ? '<small class="text-danger">' . $validation->getError('nameCategoryNotes') . '</small>' : '' ?>
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