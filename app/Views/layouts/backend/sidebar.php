<nav id="sidebar" aria-label="Main Navigation">
    <!-- Side Header -->
    <div class="content-header">
        <!-- Logo -->
        <a class="fw-semibold text-dual" href="<?= base_url('backend/dashboard') ?>">
            <span class="smini-visible">
                <i class="fa fa-circle-notch text-primary"></i>
            </span>
            <span class="smini-hide fs-5 tracking-wider">Tools <strong>Varnion</strong></span>
        </a>
        <!-- END Logo -->

        <!-- Extra -->
        <div>
            <!-- Dark Mode -->
            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
            <button type="button" class="btn btn-sm btn-alt-secondary" data-toggle="layout" data-action="dark_mode_toggle">
                <i class="far fa-moon"></i>
            </button>
            <!-- END Dark Mode -->

            <!-- Options -->
            <div class="dropdown d-inline-block ms-1">
                <button type="button" class="btn btn-sm btn-alt-secondary" id="sidebar-themes-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-brush"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end fs-sm smini-hide border-0" aria-labelledby="sidebar-themes-dropdown">
                    <!-- Color Themes -->
                    <!-- Layout API, functionality initialized in Template._uiHandleTheme() -->
                    <a class="dropdown-item d-flex align-items-center justify-content-between fw-medium" data-toggle="theme" data-theme="default" href="#">
                        <span>Default</span>
                        <i class="fa fa-circle text-default"></i>
                    </a>
                    <a class="dropdown-item d-flex align-items-center justify-content-between fw-medium" data-toggle="theme" data-theme="<?= base_url('assets/backend') ?>/assets/css/themes/amethyst.min.css" href="#">
                        <span>Amethyst</span>
                        <i class="fa fa-circle text-amethyst"></i>
                    </a>
                    <a class="dropdown-item d-flex align-items-center justify-content-between fw-medium" data-toggle="theme" data-theme="<?= base_url('assets/backend') ?>/assets/css/themes/city.min.css" href="#">
                        <span>City</span>
                        <i class="fa fa-circle text-city"></i>
                    </a>
                    <a class="dropdown-item d-flex align-items-center justify-content-between fw-medium" data-toggle="theme" data-theme="<?= base_url('assets/backend') ?>/assets/css/themes/flat.min.css" href="#">
                        <span>Flat</span>
                        <i class="fa fa-circle text-flat"></i>
                    </a>
                    <a class="dropdown-item d-flex align-items-center justify-content-between fw-medium" data-toggle="theme" data-theme="<?= base_url('assets/backend') ?>/assets/css/themes/modern.min.css" href="#">
                        <span>Modern</span>
                        <i class="fa fa-circle text-modern"></i>
                    </a>
                    <a class="dropdown-item d-flex align-items-center justify-content-between fw-medium" data-toggle="theme" data-theme="<?= base_url('assets/backend') ?>/assets/css/themes/smooth.min.css" href="#">
                        <span>Smooth</span>
                        <i class="fa fa-circle text-smooth"></i>
                    </a>
                    <!-- END Color Themes -->

                    <div class="dropdown-divider"></div>

                    <!-- Sidebar Styles -->

                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                    <a class="dropdown-item fw-medium" data-toggle="layout" data-action="sidebar_style_light" href="javascript:void(0)">
                        <span>Sidebar Light</span>
                    </a>
                    <a class="dropdown-item fw-medium" data-toggle="layout" data-action="sidebar_style_dark" href="javascript:void(0)">
                        <span>Sidebar Dark</span>
                    </a>
                    <!-- END Sidebar Styles -->

                    <div class="dropdown-divider"></div>

                    <!-- Header Styles -->
                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                    <a class="dropdown-item fw-medium" data-toggle="layout" data-action="header_style_light" href="javascript:void(0)">
                        <span>Header Light</span>
                    </a>
                    <a class="dropdown-item fw-medium" data-toggle="layout" data-action="header_style_dark" href="javascript:void(0)">
                        <span>Header Dark</span>
                    </a>
                    <!-- END Header Styles -->
                </div>
            </div>
            <!-- END Options -->

            <!-- Close Sidebar, Visible only on mobile screens -->
            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
            <a class="d-lg-none btn btn-sm btn-alt-secondary ms-1" data-toggle="layout" data-action="sidebar_close" href="javascript:void(0)">
                <i class="fa fa-fw fa-times"></i>
            </a>
            <!-- END Close Sidebar -->
        </div>
        <!-- END Extra -->
    </div>
    <!-- END Side Header -->


    <!-- Sidebar Scrolling -->
    <div class="js-sidebar-scroll">
        <!-- Side Navigation -->
        <div class="content-side">
            <ul class="nav-main">
                <li class="nav-main-heading">Menu</li>
                <li class="nav-main-item">
                    <a class="nav-main-link <?= ($urlMenu == "dashboard") ? 'active' : '' ?>" href="<?= base_url('backend/dashboard') ?>">
                        <i class="nav-main-link-icon fas fa-tachometer"></i>
                        <span class="nav-main-link-name">Dashboard</span>
                    </a>
                </li>

                <li class="nav-main-item">
                    <a class="nav-main-link nav-main-link-submenu <?= ($urlMenu == "notes") ? 'active' : '' ?>" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                        <i class="nav-main-link-icon fas fa-book"></i>
                        <span class="nav-main-link-name">Notes</span>
                    </a>
                    <ul class="nav-main-submenu">
                        <li class="nav-main-item">
                            <a class="nav-main-link <?= ($urlMenu == "notes") ? 'active' : '' ?>" href="<?= base_url('backend/notes') ?>">
                                <i class="nav-main-link-icon fas fa-pencil-square"></i>
                                <span class="nav-main-link-name">List Notes</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="#">
                                <i class="nav-main-link-icon fas fa-pencil"></i>
                                <span class="nav-main-link-name">Grid Notes</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <?php if (session()->privilege == "Admin") { ?>
                    <li class="nav-main-item 
                <?= (
                        // Users
                        $urlMenu == "users" ||
                        $urlMenu == "new" ||
                        $urlMenu == "edit" ||
                        // Categories
                        $urlMenu == "categories" ||
                        $urlMenu == "categories/new" ||
                        $urlMenu == "categories/edit" ||
                        // Categories External
                        $urlMenu == "categories_external" ||
                        $urlMenu == "categories_external/new" ||
                        $urlMenu == "categories_external/edit" ||
                        // Categories Gamas
                        $urlMenu == "categories_gamas" ||
                        $urlMenu == "categories_gamas/new" ||
                        $urlMenu == "categories_gamas/edit" ||
                        // Categories Notes
                        $urlMenu == "categories_notes" ||
                        $urlMenu == "categories_notes/new" ||
                        $urlMenu == "categories_notes/edit" ||
                        // Categories Privilege
                        $urlMenu == "categories_privilege" ||
                        $urlMenu == "categories_privilege/new" ||
                        $urlMenu == "categories_privilege/edit" ||

                        // Internal Tools
                        $urlMenu == "internal_tools" ||
                        $urlMenu == "internal_tools/new" ||
                        $urlMenu == "internal_tools/edit" ||

                        // Teams
                        $urlMenu == "teams" ||
                        $urlMenu == "teams/new" ||
                        $urlMenu == "teams/edit" ||

                        // Incoming Case
                        $urlMenu == "incoming_case" ||
                        $urlMenu == "incoming_case/new" ||
                        $urlMenu == "incoming_case/edit"
                    ) ? 'open' : '' ?>
                ">
                        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                            <i class="nav-main-link-icon fas fa-cogs"></i>
                            <span class="nav-main-link-name">Settings</span>
                        </a>
                        <ul class="nav-main-submenu">
                            <li class="nav-main-item
                        <?= (
                            
                            // Categories
                            $urlMenu == "categories" ||
                            $urlMenu == "categories/new" ||
                            $urlMenu == "categories/edit" ||
                            // Categories External
                            $urlMenu == "categories_external" ||
                            $urlMenu == "categories_external/new" ||
                            $urlMenu == "categories_external/edit" ||
                            // Categories Gamas
                            $urlMenu == "categories_gamas" ||
                            $urlMenu == "categories_gamas/new" ||
                            $urlMenu == "categories_gamas/edit" ||
                            // Categories Notes
                            $urlMenu == "categories_notes" ||
                            $urlMenu == "categories_notes/new" ||
                            $urlMenu == "categories_notes/edit" ||
                            // Categories Privilege
                            $urlMenu == "categories_privilege" ||
                            $urlMenu == "categories_privilege/new" ||
                            $urlMenu == "categories_privilege/edit"
                        ) ? 'open' : '' ?>
                        ">
                                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                                    <i class="nav-main-link-icon fas fa-tasks"></i>
                                    <span class="nav-main-link-name">Categories</span>
                                </a>
                                <ul class="nav-main-submenu">

                                    <li class="nav-main-item">
                                        <a class="nav-main-link <?= ($urlMenu == "categories" || $urlMenu == "categories/new" || $urlMenu == "categories/edit") ? 'active' : '' ?>" href="<?= base_url('backend/categories') ?>">
                                            <span class="nav-main-link-name">Categories</span>
                                        </a>
                                    </li>
                                    <li class="nav-main-item">
                                        <a class="nav-main-link <?= ($urlMenu == "categories_external" || $urlMenu == "categories_external/new" || $urlMenu == "categories_external/edit") ? 'active' : '' ?>" href="<?= base_url('backend/categories_external') ?>">
                                            <span class="nav-main-link-name">Categories External</span>
                                        </a>
                                    </li>
                                    <li class="nav-main-item">
                                        <a class="nav-main-link <?= ($urlMenu == "categories_gamas" || $urlMenu == "categories_gamas/new" || $urlMenu == "categories_gamas/edit") ? 'active' : '' ?>" href="<?= base_url('backend/categories_gamas') ?>">
                                            <span class="nav-main-link-name">Categories Gamas</span>
                                        </a>
                                    </li>
                                    <li class="nav-main-item">
                                        <a class="nav-main-link <?= ($urlMenu == "categories_notes" || $urlMenu == "categories_notes/new" || $urlMenu == "categories_notes/edit") ? 'active' : '' ?>" href="<?= base_url('backend/categories_notes') ?>">
                                            <span class="nav-main-link-name">Categories Notes</span>
                                        </a>
                                    </li>
                                    <li class="nav-main-item">
                                        <a class="nav-main-link <?= ($urlMenu == "categories_privilege" || $urlMenu == "categories_privilege/new" || $urlMenu == "categories_privilege/edit") ? 'active' : '' ?>" href="<?= base_url('backend/categories_privilege') ?>">
                                            <span class="nav-main-link-name">Categories Privilege</span>
                                        </a>
                                    </li>

                                </ul>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link <?= ($urlMenu == "internal_tools" || $urlMenu == "internal_tools/new" || $urlMenu == "internal_tools/edit") ? 'active' : '' ?>" href="<?= base_url('backend/internal_tools') ?>">
                                    <i class="nav-main-link-icon fas fa-cog"></i>
                                    <span class="nav-main-link-name">Internal Tools</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link <?= ($urlMenu == "incoming_case" || $urlMenu == "incoming_case/new" || $urlMenu == "incoming_case/edit") ? 'active' : '' ?>" href="<?= base_url('backend/incoming_case') ?>">
                                    <i class="nav-main-link-icon fa fa-tags"></i>
                                    <span class="nav-main-link-name">Incoming Case</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link <?= ($urlMenu == "users" || $urlMenu == "new" || $urlMenu == "edit") ? 'active' : '' ?>" href="<?= base_url('backend/users') ?>">
                                    <i class="nav-main-link-icon fas fa-users"></i>
                                    <span class="nav-main-link-name">Users</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link <?= ($urlMenu == "teams" || $urlMenu == "teams/new" || $urlMenu == "teams/edit") ? 'active' : '' ?>" href="<?= base_url('backend/teams') ?>">
                                    <i class="nav-main-link-icon fa fa-user-circle"></i>
                                    <span class="nav-main-link-name">Teams</span>
                                </a>
                            </li>

                        </ul>
                    </li>
                <?php } ?>

            </ul>
        </div>
        <!-- END Side Navigation -->
    </div>
    <!-- END Sidebar Scrolling -->
</nav>