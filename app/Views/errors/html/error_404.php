<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?= lang('Errors.pageNotFound') ?></title>

    <style>
        div.logo {
            height: 200px;
            width: 155px;
            display: inline-block;
            opacity: 0.08;
            position: absolute;
            top: 2rem;
            left: 50%;
            margin-left: -73px;
        }

        body {
            height: 100%;
            background: #fafafa;
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
            color: #777;
            font-weight: 300;
        }

        h1 {
            font-weight: lighter;
            letter-spacing: normal;
            font-size: 3rem;
            margin-top: 0;
            margin-bottom: 0;
            color: #222;
        }

        .wrap {
            max-width: 1024px;
            margin: 5rem auto;
            padding: 2rem;
            background: #fff;
            text-align: center;
            border: 1px solid #efefef;
            border-radius: 0.5rem;
            position: relative;
        }

        pre {
            white-space: normal;
            margin-top: 1.5rem;
        }

        code {
            background: #fafafa;
            border: 1px solid #efefef;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            display: block;
        }

        p {
            margin-top: 1.5rem;
        }

        .footer {
            margin-top: 2rem;
            border-top: 1px solid #efefef;
            padding: 1em 2em 0 2em;
            font-size: 85%;
            color: #999;
        }

        a:active,
        a:link,
        a:visited {
            color: #dd4814;
        }
    </style>
</head>

<body>
    <div class="wrap">
        <h1>404</h1>

        <p>
            <?php if (ENVIRONMENT !== 'production') : ?>
                <?= nl2br(esc($message)) ?>
            <?php else : ?>
                <?= lang('Errors.sorryCannotFind') ?>
            <?php endif ?>
        </p>
    </div>
</body>

</html> -->


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <title>404 - Not Found</title>

    <link rel="icon" type="image/png" sizes="192x192" href="<?= base_url('assets/images/favicon.png') ?>">

    <!-- Stylesheets -->
    <!-- OneUI framework -->
    <link rel="stylesheet" id="css-main" href="<?= base_url('assets/backend/') ?>/assets/css/oneui.min.css">

    <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
    <!-- <link rel="stylesheet" id="css-theme" href="<?= base_url('assets/backend/') ?>/assets/css/themes/amethyst.min.css"> -->
    <!-- END Stylesheets -->
</head>

<body>
    <!-- Page Container -->
    <div id="page-container">

        <!-- Main Container -->
        <main id="main-container">
            <!-- Page Content -->
            <div class="hero">
                <div class="hero-inner text-center">
                    <div class="bg-body-extra-light">
                        <div class="content content-full overflow-hidden">
                            <div class="py-4">
                                <!-- Error Header -->
                                <h1 class="display-1 fw-bolder text-secondary">
                                    404
                                </h1>
                                <h2 class="h4 fw-normal text-muted mb-5">
                                    <?php if (ENVIRONMENT !== 'production') : ?>
                                        <?= nl2br(esc($message)) ?>
                                    <?php else : ?>
                                        <?= lang('Errors.sorryCannotFind') ?>
                                    <?php endif ?>
                                </h2>
                                <!-- END Error Header -->

                                <!-- Search Form -->
                                <!-- ** TODO ** -->
                                <form action="#" method="POST">
                                    <div class="row justify-content-center mb-4">
                                        <div class="col-sm-6 col-xl-3">
                                            <!-- <div class="input-group input-group-lg">
                                                <input class="form-control form-control-alt" type="text" placeholder="Search application..">
                                                <button type="submit" class="btn btn-dark">
                                                    <i class="fa fa-search opacity-75"></i>
                                                </button>

                                            </div> -->
                                            <a class="link-fx btn btn-primary" href="#" onclick="window.history.back();">Go Back</a>

                                        </div>

                                    </div>
                                </form>
                                <!-- END Search Form -->
                            </div>
                        </div>
                    </div>
                    <div class="content content-full text-muted fs-sm fw-medium">
                        <!-- Error Footer -->


                        <p class="mt-3">
                            <strong>Varnion </strong> &copy; <span data-toggle="year-copy"></span>
                        </p>
                        <!-- END Error Footer -->
                    </div>
                </div>
            </div>
            <!-- END Page Content -->
        </main>
        <!-- END Main Container -->
    </div>
    <!-- END Page Container -->

    <!--
        OneUI JS
    
        Core libraries and functionality
        webpack is putting everything together at <?= base_url('assets/backend/') ?>/assets/_js/main/app.js
    -->
    <script src="<?= base_url('assets/backend/') ?>/assets/js/oneui.app.min.js"></script>
</body>

</html>