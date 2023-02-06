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

    <meta name="description" content="Pt. Varnion Technologo Semesta">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow">

    <!-- Open Graph Meta -->
    <meta property="og:title" content="Pt. Varnion Technologo Semesta">
    <meta property="og:site_name" content="Varnion">
    <meta property="og:description" content="Pt. Varnion Technologo Semesta">
    <meta property="og:type" content="website">
    <meta property="og:url" content="">
    <meta property="og:image" content="">

    <!-- Icons -->
    <link rel="icon" type="image/png" sizes="192x192" href="<?= base_url('assets/images/favicon.png') ?>">
    <!-- END Icons -->

    <!-- Stylesheets -->
    <!-- Varnion framework -->
    <link rel="stylesheet" id="css-main" href="<?= base_url('assets/backend/') ?>/assets/css/oneui.min.css">

    <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
    <!-- <link rel="stylesheet" id="css-theme" href="<?= base_url('assets/backend/') ?>/assets/css/themes/amethyst.min.css"> -->
    <!-- END Stylesheets -->
</head>

<body>
    <!-- Page Container -->
    <div id="page-container">

        <!-- Main Container -->
        <?= $this->renderSection('content') ?>
        <!-- END Main Container -->
    </div>
    <!-- END Page Container -->

    <script src="<?= base_url('assets/backend/') ?>/assets/js/oneui.app.min.js"></script>

    <!-- jQuery (required for jQuery Validation plugin) -->
    <script src="<?= base_url('assets/backend/') ?>/assets/js/lib/jquery.min.js"></script>
    <!-- FlashData Sweet Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <?php if (session()->getFlashdata('error')) { ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '<?= session()->getFlashdata('error') ?>',
            })
        </script>
    <?php } ?>

    <!-- Page JS Plugins -->
    <script src="<?= base_url('assets/backend/') ?>/assets/js/plugins/jquery-validation/jquery.validate.min.js"></script>
    <script src="<?= base_url('assets/auth/validation-login.js') ?>"></script>
    <!-- Page JS Code -->
    <script src="<?= base_url('assets/backend/') ?>/assets/js/pages/op_auth_signin.min.js"></script>
</body>

</html>