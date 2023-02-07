<?= $this->extend('layouts/backend/templates') ?>
<?= $this->section('content') ?>
<!-- Main Container -->
<main id="main-container">
    <!-- Hero Content -->
    <div class="bg-image">
        <div class="bg-primary-dark-op">
            <div class="content content-full text-center py-7 pb-5">
                <h1 class="h2 text-white mb-2">
                    Empowering Your Customer WOW Experience, One Step at a Time
                </h1>
            </div>
        </div>
    </div>
    <!-- END Hero Content -->

    <!-- Navigation -->
    <div class="bg-body-extra-light">
        <div class="content content-boxed py-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-alt">
                    <li class="breadcrumb-item">
                        <a class="link-fx" href="<?= base_url('backend/dashboard') ?>">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">
                        Customer
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- END Navigation -->

    <!-- Page Content -->
    <div class="content content-boxed">
        <div class="row">
            <div class="col-xl-8">
                <!-- Lessons -->
                <div class="block block-rounded">
                    <div class="block-content fs-sm">
                        <!-- Introduction -->
                        <!-- <table class="table table-borderless table-vcenter">
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($customer as $customer) {
                                ?>
                                    <tr>
                                        <td class="table-success text-center">
                                            <?= $no++ ?>.
                                        </td>
                                        <td>
                                            <a class="fw-medium" href="<?= base_url('backend/customer/' . $customer['id_customer'] . '/detail') ?>"><?= $customer['company_customer'] ?></a>
                                        </td>
                                        <td class="text-end text-muted">
                                            <?= date("d F Y", strtotime($customer['datetime_customer'])) ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table> -->

                        <table class="table table-borderless table-vcenter">
                            <tbody id="customerList">
                                <!-- customer data will be dynamically inserted here -->
                            </tbody>
                        </table>
                        <!-- END Introduction -->
                        <!-- Pagination -->
                        <?php echo $pager->links('default', 'custom_pager') ?>
                        <!-- END Pagination -->
                    </div>
                </div>
                <!-- END Lessons -->
            </div>
            <div class="col-xl-4">
                <!-- Search -->
                <!-- <div class="block block-rounded mb-3">
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
                </div> -->
                <div class="block block-rounded mb-3">
                    <div class="block-content p-3">
                        <form>
                            <div class="input-group">
                                <input type="text" class="form-control form-control-alt" id="searchInput" placeholder="Search all customers..">
                                <button class="btn btn-alt-secondary">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- END Search -->
                <!-- Subscribe -->
                <!-- <div class="block block-rounded">
                    <div class="block-content">
                        <a class="btn btn-primary w-100 mb-2" href="javascript:void(0)">Subscribe from $9/month</a>
                        <p class="fs-sm text-center">
                            or <a class="link-effect fw-medium" href="javascript:void(0)">buy this course for $28</a>
                        </p>
                    </div>
                </div> -->
                <!-- END Subscribe -->

                <!-- Course Info -->
                <div class="block block-rounded">
                    <div class="block-header block-header-default text-center">
                        <h3 class="block-title">Data Customer</h3>
                    </div>
                    <div class="block-content">
                        <table class="table table-striped table-borderless fs-sm">
                            <tbody>
                                <tr>
                                    <td>
                                        <i class="fa fa-fw fa-building me-1"></i> <?= $total_customer ?> Customer
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- END Course Info -->

                <!-- About -->
                <a class="block block-rounded mb-3" href="<?= base_url('backend/users/' . session()->id . '/edit') ?>">
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

                <!-- About Instructor -->
                <!-- <a class="block block-rounded block-link-shadow" href="javascript:void(0)">
                    <div class="block-header block-header-default text-center">
                        <h3 class="block-title">About The Instructor</h3>
                    </div>
                    <div class="block-content block-content-full text-center">
                        <div class="push">
                            <img class="img-avatar" src="assets/media/avatars/avatar10.jpg" alt="">
                        </div>
                        <div class="fw-semibold mb-1">Jeffrey Shaw</div>
                        <div class="fs-sm text-muted">Front-end Developer</div>
                    </div>
                </a> -->
                <!-- END About Instructor -->
            </div>
        </div>
    </div>
    <!-- END Page Content -->

    <!-- Get Started -->
    <!-- <div class="bg-body-dark">
        <div class="content content-full text-center py-6">
            <h3 class="h4 mb-4">
                Subscribe today and learn HTML5 in under 3 hours.
            </h3>
            <a class="btn btn-primary px-4 py-2" href="javascript:void(0)">Subscribe from $9/month</a>
        </div>
    </div> -->
    <!-- END Get Started -->
</main>


<!-- END Main Container -->
<?= $this->endSection() ?>