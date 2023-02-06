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
                        Edit SOP
                    </h1>
                </div>
                <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">
                            <a class="link-fx" href="<?= base_url('backend/sop') ?>">Data SOP</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">
                            Edit SOP
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
        <form class="js-validation" action="<?= base_url('backend/sop/' . $sop['id_sop']) ?>" method="POST">
            <?= csrf_field(); ?>
            <input type="hidden" name="_method" value="PUT">
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Form Add</h3>
                </div>
                <div class="block-content block-content-full">
                    <!-- Regular -->
                    <div class="row items-push">
                        <div class="col-lg-12 col-xl-12">
                            <div class="mb-4">
                                <label class="form-label" for="titleSop">Title SOP <span class="text-danger">*</span></label>
                                <input type="hidden" class="form-control" id="id_sop" name="id_sop" value="<?= $sop['id_sop'] ?>">
                                <input type=" text" class="form-control <?= (!empty($validation) && $validation->hasError('titleSop')) ? 'is-invalid' : '' ?>" id="titleSop" name="titleSop" placeholder="Enter a Title.." value="<?= $sop['title_sop'] ?>">
                                <div id="titleSopError">
                                    <?= (!empty($validation) && $validation->hasError('titleSop')) ? '<small class="text-danger">' . $validation->getError('titleSop') . '</small>' : '' ?>
                                </div>

                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="editor">Content <span class="text-danger">*</span></label>
                                <textarea class="form-control" id="editor" name="content" rows="3" placeholder="Enter a Content.."><?= $sop['contents_sop'] ?></textarea>
                                <!-- CKEditor 5 Classic Container -->
                                <!-- <div id="js-ckeditor5-classic"></div> -->
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
<script src="https://cdn.ckeditor.com/ckeditor5/36.0.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        // .create(document.querySelector('#editor'))
        .create(document.querySelector('#editor'), {
            ckfinder: {
                uploadUrl: '<?= base_url('backend/sop/uploadImage') ?>'
            }
        })
        // .then(editor => {
        //     console.error(editor);
        .catch(error => {
            console.error(error);
        });
</script>
<?= $this->endSection() ?>