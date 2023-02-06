<!doctype html>
<html lang="en">

<!-- 

Created By 
Name    : Moch Azmi Iskandar

-->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <title><?= esc($title) ?? "" ?></title>

    <meta name="description" content="Tools Varnion">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow">

    <!-- Open Graph Meta -->
    <meta property="og:title" content="Tools Varnion">
    <meta property="og:site_name" content="Varnion">
    <meta property="og:description" content="Tools Varnion">
    <meta property="og:type" content="website">
    <meta property="og:url" content="">
    <meta property="og:image" content="">

    <!-- Icons -->
    <link rel="icon" type="image/png" sizes="192x192" href="<?= base_url('assets/images/favicon.png') ?>">
    <!-- END Icons -->

    <!-- Stylesheets -->
    <!-- Varnion framework -->
    <link rel="stylesheet" id="css-main" href="<?= base_url('assets/backend/') ?>/assets/css/oneui.min.css">

    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/backend/') ?>/assets/js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/backend/') ?>/assets/js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/backend/') ?>/assets/js/plugins/datatables-responsive-bs5/css/responsive.bootstrap5.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/backend/') ?>/assets/js/plugins/select2/css/select2.min.css">

    <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
    <!-- <link rel="stylesheet" id="css-theme" href="<?= base_url('assets/backend/') ?>/assets/css/themes/amethyst.min.css"> -->
    <!-- END Stylesheets -->
</head>

<body>
    <!-- Page Container -->
    <div id="page-container" class="sidebar-o sidebar-dark enable-page-overlay side-scroll page-header-fixed main-content-narrow">


        <!-- Side Overlay-->
        <?= $this->include('layouts/backend/aside') ?>
        <!-- END Side Overlay -->

        <!-- Sidebar -->
        <?= $this->include('layouts/backend/sidebar') ?>
        <!-- END Sidebar -->

        <!-- Header -->
        <?= $this->include('layouts/backend/navbar') ?>
        <!-- END Header -->

        <!-- Main Container -->
        <?= $this->renderSection('content') ?>
        <!-- END Main Container -->

        <!-- Footer -->
        <?= $this->include('layouts/backend/footer') ?>
        <!-- END Footer -->
    </div>
    <!-- END Page Container -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php if (session()->getFlashdata('success')) { ?>
        <script>
            Swal.fire({
                title: 'Success!',
                text: '<?= session()->getFlashdata('success') ?>',
                icon: 'success',
                showConfirmButton: false,
                timer: 1000
            });
        </script>
    <?php } ?>
    <?php if (session()->getFlashdata('error')) { ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '<?= session()->getFlashdata('error') ?>',
            })
        </script>
    <?php } ?>
    <script>
        document.getElementById("logoutButton").addEventListener("click", function() {
            Swal.fire({
                title: 'Are you sure you want to logout?',
                text: "You will not be able to access the data again!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Logout!'
            }).then((result) => {
                if (result.value) {
                    window.location.href = "<?= base_url('auth/login/logout') ?>" + "/" + <?= session()->id ?>;
                }
            });
        });
    </script>
    <script src="<?= base_url('assets/backend/') ?>/assets/js/oneui.app.min.js"></script>

    <!-- Page JS Plugins -->
    <script src="<?= base_url('assets/backend/') ?>/assets/js/plugins/chart.js/chart.min.js"></script>

    <!-- Page JS Code -->
    <script src="<?= base_url('assets/backend/') ?>/assets/js/pages/be_pages_dashboard.min.js"></script>

    <!-- jQuery (required for DataTables plugin) -->
    <script src="<?= base_url('assets/backend/') ?>/assets/js/lib/jquery.min.js"></script>

    <!-- Page JS Plugins -->
    <script src="<?= base_url('assets/backend/') ?>/assets/js/plugins/ckeditor5-classic/build/ckeditor.js"></script>
    <script src="<?= base_url('assets/backend/') ?>/assets/js/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('assets/backend/') ?>/assets/js/plugins/datatables-bs5/js/dataTables.bootstrap5.min.js"></script>
    <script src="<?= base_url('assets/backend/') ?>/assets/js/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url('assets/backend/') ?>/assets/js/plugins/datatables-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
    <script src="<?= base_url('assets/backend/') ?>/assets/js/plugins/datatables-buttons/dataTables.buttons.min.js"></script>
    <script src="<?= base_url('assets/backend/') ?>/assets/js/plugins/datatables-buttons-bs5/js/buttons.bootstrap5.min.js"></script>
    <script src="<?= base_url('assets/backend/') ?>/assets/js/plugins/datatables-buttons-jszip/jszip.min.js"></script>
    <script src="<?= base_url('assets/backend/') ?>/assets/js/plugins/datatables-buttons-pdfmake/pdfmake.min.js"></script>
    <script src="<?= base_url('assets/backend/') ?>/assets/js/plugins/datatables-buttons-pdfmake/vfs_fonts.js"></script>
    <script src="<?= base_url('assets/backend/') ?>/assets/js/plugins/datatables-buttons/buttons.print.min.js"></script>
    <script src="<?= base_url('assets/backend/') ?>/assets/js/plugins/datatables-buttons/buttons.html5.min.js"></script>

    <!-- JS Validation -->
    <script src="<?= base_url('assets/backend/') ?>/assets/js/plugins/select2/js/select2.full.min.js"></script>
    <script src="<?= base_url('assets/backend/') ?>/assets/js/plugins/jquery-validation/jquery.validate.min.js"></script>
    <script src="<?= base_url('assets/backend/') ?>/assets/js/plugins/jquery-validation/additional-methods.js"></script>

    <!-- Page JS Helpers (Select2 plugin) -->
    <script>
        One.helpersOnLoad(['js-ckeditor5']);
        One.helpersOnLoad(['jq-select2']);
    </script>

    <!-- Page JS Code -->
    <script src="<?= base_url('assets/backend/') ?>/assets/js/pages/be_forms_validation.min.js"></script>

    <!-- Page JS Code -->
    <script src="<?= base_url('assets/backend/') ?>/assets/js/pages/be_tables_datatables.min.js"></script>
    <script>
        $(document).ready(function() {
            var table = $('#myTable').DataTable();

            $('#filter-privilege').on('change', function() {
                var selectedOption = this.value;
                // console.log(selectedOption);
                table.columns(2).search(selectedOption, true, false).draw();
            });
            $('#filter-categories').on('change', function() {
                var selectedOption = this.value;
                // console.log(selectedOption);
                table.columns(4).search(selectedOption, true, false).draw();
            });
        });
    </script>
</body>

</html>