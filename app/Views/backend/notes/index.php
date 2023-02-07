<?= $this->extend('layouts/backend/templates') ?>
<?= $this->section('content') ?>
<!-- Main Container -->
<main id="main-container">
    <!-- Hero Content -->
    <div class="bg-primary-dark">
        <div class="content content-full overflow-hidden pt-7 pb-6 text-center">
            <h1 class="h2 text-white mb-2">
                Fresh notes, just for you.
            </h1>
            <h2 class="h4 fw-normal text-white-75 mb-0">
                Feel free to explore and read.
            </h2>
        </div>
    </div>
    <!-- END Hero Content -->

    <!-- Page Content -->
    <div class="content content-boxed">
        <div class="row items-push">
            <div class="col-xxl-8">
                <?php foreach ($notes as $note) { ?>
                    <!-- Story -->
                    <div class="block block-rounded">
                        <div class="block-content">
                            <div class="row items-push">
                                <div class="col-md-4 col-lg-5">
                                    <a class="img-link img-link-simple" href="be_pages_blog_story.html">
                                        <img class="img-fluid rounded" src="<?= base_url('assets/backend/') ?>/assets/media/photos/photo10.jpg" alt="">
                                    </a>
                                </div>
                                <div class="col-md-8 col-lg-7 d-md-flex align-items-center">
                                    <div>
                                        <h4 class="mb-1">
                                            <a class="text-dark" href="be_pages_blog_story.html"><?= $note['judul_kasus'] ?></a>
                                        </h4>
                                        <div class="fs-sm fw-medium mb-3">
                                            <a href="be_pages_generic_profile.html">Lori Moore</a> on July 16, 2021 · <span class="text-muted">10 min</span>
                                        </div>
                                        <p class="fs-sm text-muted">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultrices, justo vel imperdiet gravida, urna ligula hendrerit nibh, ac cursus nibh..
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END Story -->
                <?php } ?>

                <!-- Pagination -->
                <?php echo $pager->links('default', 'custom_pager') ?>
                <!-- END Pagination -->
            </div>
            <div class="col-xxl-4">
                <div class="bg-body-dark rounded-3 p-4">
                    <!-- Search -->
                    <div class="block block-rounded mb-3">
                        <div class="block-content p-3">
                            <a href="<?= base_url('backend/notes/new') ?>" class="btn btn-alt-primary d-block w-100">
                                <i class="fa fa-plus-circle"></i> Add new Notes
                            </a>
                        </div>
                    </div>
                    <!-- END Search -->
                    <!-- Search -->
                    <div class="block block-rounded mb-3">
                        <div class="block-content p-3">
                            <form action="be_pages_blog_classic.html" method="POST">
                                <div class="input-group">
                                    <input type="text" class="form-control form-control-alt" placeholder="Search all posts..">
                                    <button class="btn btn-alt-secondary">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- END Search -->

                    <!-- About -->
                    <a class="block block-rounded mb-3" href="be_pages_generic_profile.html">
                        <div class="block-content block-content-full text-center">
                            <div class="mb-3">
                                <img class="img-avatar img-avatar96" src="<?= base_url('assets/backend/') ?>/assets/media/avatars/avatar1.jpg" alt="">
                            </div>
                            <div class="fs-5 fw-semibold"><?= ucwords(session()->username) ?></div>
                            <div class="fs-sm fw-medium text-muted"><?= session()->privilege ?></div>
                        </div>
                        <div class="block-content border-top">
                            <div class="row text-center">
                                <div class="col-6">
                                    <div class="mb-2">
                                        <i class="si si-pencil fa-2x"></i>
                                    </div>
                                    <p class="fs-sm fw-medium text-muted">350 Notes</p>
                                </div>
                                <div class="col-6">
                                    <div class="mb-2">
                                        <i class="si si-users fa-2x"></i>
                                    </div>
                                    <p class="fs-sm fw-medium text-muted">1.5k Users</p>
                                </div>
                            </div>
                        </div>
                    </a>
                    <!-- END About -->

                    <!-- Recent Comments -->
                    <div class="block block-rounded mb-0">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Recent Comments</h3>
                        </div>
                        <div class="block-content fs-sm">
                            <div class="push">
                                <p class="fw-medium mb-1">
                                    <a href="be_pages_generic_profile.html">Adam McCoy</a> on <a href="be_pages_blog_story.html">Exploring the Alps</a>
                                </p>
                                <p class="mb-0">
                                    Awesome trip! Looking forward going there, I'm sure it will be a great experience!
                                </p>
                            </div>
                            <div class="push">
                                <p class="fw-medium mb-1">
                                    <a href="be_pages_generic_profile.html">Megan Fuller</a> on <a href="be_pages_blog_story.html">Travel &amp; Work</a>
                                </p>
                                <p class="mb-0">
                                    Thank you for sharing your story with us! I really appreciate the info, it will come in handy for sure!
                                </p>
                            </div>
                            <div class="push">
                                <p class="fw-medium mb-1">
                                    <a href="be_pages_generic_profile.html">Laura Carr</a> on <a href="be_pages_blog_story.html">Black &amp; White</a>
                                </p>
                                <p class="mb-0">
                                    Really touching story.. I'm so happy everything went well at the end!
                                </p>
                            </div>
                            <div class="push">
                                <p class="fw-medium mb-1">
                                    <a href="be_pages_generic_profile.html">Ryan Flores</a> on <a href="be_pages_blog_story.html">Sleep Better</a>
                                </p>
                                <p class="mb-0">
                                    Great advice! Thanks for sharing, I'm sure it will help many people sleep better and improve their lifes.
                                </p>
                            </div>
                            <div class="text-sm push">
                                <a class="text-dark fw-semibold" href="javascript:void(0)">Read More..</a>
                            </div>
                        </div>
                    </div>
                    <!-- END Recent Comments -->
                </div>
            </div>
        </div>
    </div>
    <!-- END Page Content -->

    <!-- Get Started -->
    <div class="bg-body-dark">
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
    </div>
    <!-- END Get Started -->
</main>

<script>
    $(document).ready(function() {
        let customerList = $("#customerList");
        let customerData = <?= json_encode($customer) ?>;
        let no = 1;

        // Initial load of customer data
        customerData.forEach(function(customer) {
            customerList.append(`
            <tr>
                <td class="table-success text-center">
                    ${no++}.
                </td>
                <td>
                    <a class="fw-medium" href="<?= base_url('backend/customer/') ?>${customer.id_customer}/detail">${customer.company_customer}</a>
                </td>
            </tr>
        `);
        });

        // Event listener for live search
        $("#searchInput").on("keyup", function() {
            let keyword = $(this).val().toLowerCase();
            customerList.empty();
            no = 1;

            customerData.forEach(function(customer) {
                let customerName = customer.company_customer.toLowerCase();

                if (customerName.indexOf(keyword) > -1) {
                    customerList.append(`
                    <tr>
                        <td class="table-success text-center">
                            ${no++}.
                        </td>
                        <td>
                            <a class="fw-medium" href="<?= base_url('backend/customer/') ?>${customer.id_customer}/detail">${customer.company_customer}</a>
                        </td>
                    </tr>
                `);
                }
            });
        });
    });
</script>
<!-- END Main Container -->
<?= $this->endSection() ?>