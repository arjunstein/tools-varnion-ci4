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
                        Data Incoming Case
                    </h1>
                </div>
                <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">
                            <a class="link-fx" href="<?= base_url('backend/dashboard') ?>">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">
                            Data Incoming Case
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
                    DataTables <small>Incoming Case</small>
                </h3>
                <div class="float-right">
                    <div class="d-inline-block">
                        <a href="<?= base_url('backend/incoming_case/new') ?>" class="btn btn-sm btn-primary"> <i class="fas fa-plus-circle"></i> Add new Incoming Case</a>
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
                            <th>Name</th>
                            <th class="text-center" width="13%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($incoming_case as $incoming_case) {
                        ?>
                            <tr>
                                <td class="text-center fs-sm"><?= $no++ ?></td>
                                <td class="fw-semibold fs-sm"><?= $incoming_case['name_incoming_case'] ?></td>
                                <td class="text-center">
                                    <a href="<?= base_url('backend/incoming_case/' . $incoming_case['id_incoming_case'] . '/edit') ?>" class="btn btn-sm btn-primary"> <i class="fas fa-edit"></i> </a>
                                    <!-- <a href="<?= base_url('backend/incoming_case/' . $incoming_case['id_incoming_case']) ?>" class="btn btn-sm btn-danger"> <i class="fas fa-trash-can"></i> </a> -->
                                    <form id="form-delete" action="<?= base_url('backend/incoming_case/' . $incoming_case['id_incoming_case']) ?>" method="post" style="display:inline-block;">

                                        <input type="hidden" name="_method" value="DELETE">
                                        <button onclick="deleteIncomingCase()" class="btn btn-sm btn-danger">
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
    function deleteIncomingCase() {
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