<?= $this->extend('layouts/backend/templates') ?>
<?= $this->section('content') ?>
<!-- Main Container -->
<main id="main-container">
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-1">
                <div class="flex-grow-1">
                    <h1 class="h3 fw-bold mb-2">
                        Data Users
                    </h1>
                </div>
                <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">
                            <a class="link-fx" href="<?= base_url('backend/dashboard') ?>">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">
                            Data Users
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- END Hero -->

    <!-- Page Content -->
    <div class="content">
        <!-- Dynamic Table Responsive -->
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    DataTables <small>Users</small>
                </h3>
                <div class="float-right">
                    <div class="d-inline-block">
                        <a href="<?= base_url('backend/users/new') ?>" class="btn btn-sm btn-primary"> <i class="fas fa-plus-circle"></i> Add new Users</a>
                    </div>
                    <div class="d-inline-block">
                        <select id="filter-privilege" class="form-select">
                            <option value="" hidden>-- Choose Privilege --</option>
                            <option value="">All</option>
                            <?php foreach($categories_privilege as $category_privilege){ ?>
                                <option value="<?= $category_privilege['name_categories_privilege'] ?>"><?= $category_privilege['name_categories_privilege'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

            </div>
            <div class="block-content block-content-full">
                <div class="col-sm-3">


                </div>
                <!-- DataTables init on table by adding .js-dataTable-responsive class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
                <table class="table table-bordered table-hover table-vcenter js-dataTable-responsive" id="myTable">
                    <thead>
                        <tr>
                            <th class="text-center" width="5%">No.</th>
                            <th>Username</th>
                            <th>Privilege</th>
                            <th>Status</th>
                            <th class="text-center" width="13%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($users as $user) {
                        ?>
                            <tr>
                                <td class="text-center fs-sm"><?= $no++ ?></td>
                                <td class="fw-semibold fs-sm"><?= $user['username'] ?></td>
                                <td class="fs-sm"><?= $user['privilege'] ?></td>
                                <td class="fs-sm">
                                    <?php if ($user['status'] == "Active") { ?>
                                        <span class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-success-light text-success"><?= $user['status'] ?></span>
                                    <?php } else { ?>
                                        <span class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-danger-light text-danger"><?= $user['status'] ?></span>
                                    <?php } ?>

                                </td>
                                <td class="text-center">
                                    <a href="<?= base_url('backend/users/' . $user['id'] . '/edit') ?>" class="btn btn-sm btn-primary"> <i class="fas fa-edit"></i> </a>
                                    <!-- <a href="<?= base_url('backend/users/' . $user['id']) ?>" class="btn btn-sm btn-danger"> <i class="fas fa-trash-can"></i> </a> -->
                                    <form id="form-delete" action="<?= base_url('backend/users/' . $user['id']) ?>" method="post" style="display:inline-block;">
                                    
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button onclick="deleteUser()" class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash-can"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php } ?>

                    </tbody>
                </table>
            </div>
        </div>
        <!-- Dynamic Table Responsive -->
    </div>
    <!-- END Page Content -->
</main>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="<?= base_url('assets/backend/') ?>/assets/js/lib/jquery.min.js"></script>

<script>
    function deleteUser() {
        // var form = $(this).closest("form");
        event.preventDefault();
        // console.log(form);
        Swal.fire({
            title: 'Are you sure?',
            text: "Deleted data cannot be recovered!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Delete',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                document.querySelector("#form-delete").submit();
            }
        });
    }
</script>


<!-- END Main Container -->
<?= $this->endSection() ?>