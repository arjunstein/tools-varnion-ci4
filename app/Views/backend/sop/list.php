<?= $this->extend('layouts/backend/templates') ?>
<?= $this->section('content') ?>
<!-- Main Container -->
<main id="main-container">
    <!-- Hero Content -->
    <div class="bg-primary-dark">
        <div class="content content-full text-center pt-7 pb-6">
            <h1 class="h2 text-white mb-2">
                The latest SOP only for you.
            </h1>
            <h2 class="h4 fw-normal text-white-75 mb-0">
                Feel free to explore and read.
            </h2>
        </div>
    </div>
    <!-- END Hero Content -->

    <!-- Page Content -->
    <div class="content content-boxed">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <?php
                foreach ($sop as $sop) {
                    $sop['contents_sop'] = strip_tags($sop['contents_sop']);
                ?>
                    <!-- Story -->
                    <div class="push">
                        <a class="block block-rounded block-link-pop overflow-hidden" href="<?= base_url('backend/sop/' . $sop['id_sop'] . '/detail') ?>">
                            <!-- <img class="img-fluid" src="assets/media/photos/photo8@2x.jpg" alt=""> -->
                            <div class="block-content">
                                <h4 class="mb-1">
                                    <?= $sop['title_sop'] ?>
                                </h4>
                                <!-- <p class="fs-sm fw-medium mb-2">
                                <span class="text-primary">Danielle Jones</span> on July 16, 2019 · <span class="text-muted">10 min</span>
                            </p> -->
                                <p class="fs-sm text-muted">
                                    <?= substr($sop['contents_sop'], 0, 300); ?>...
                                </p>
                            </div>
                        </a>
                    </div>
                    <!-- END Story -->
                <?php } ?>

                <!-- Pagination -->
                <?php echo $pager->links('default', 'custom_pager') ?>
                <!-- END Pagination -->
            </div>
        </div>
    </div>
    <!-- END Page Content -->

    <!-- Get Started -->
    <!-- <div class="bg-body-dark">
        <div class="content content-full">
            <div class="my-5 text-center">
                <h3 class="fw-bold mb-2">
                    Do you like our stories?
                </h3>
                <h4 class="h5 fw-medium opacity-75">
                    Sign up today and get access to over <strong>10,000</strong> inspiring stories!
                </h4>
                <a class="btn btn-primary px-4 py-2" href="javascript:void(0)">Get Started Today</a>
            </div>
        </div>
    </div> -->
    <!-- END Get Started -->
</main>
<!-- END Main Container -->
<?= $this->endSection() ?>