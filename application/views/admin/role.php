</header>
<!-- End Navigation Bar=============================================================================-->

<!-- ISI ================================================================================================= -->
<div class="wrapper">
    <div class="container-fluid">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="btn-group pull-right">
                        <ol class="breadcrumb hide-phone p-0 m-0">
                            <li class="breadcrumb-item"><a href="#">Administrator</a></li>
                            <li class="breadcrumb-item active"><?= $title; ?></li>
                        </ol>
                    </div>
                    <h4 class="page-title"><?= $title; ?></h4>
                </div>
            </div>
        </div>

        <?= form_error('role', '<div class="alert coy alert-danger display-7" role="alert"><div class="display-4"><i class="mdi mdi-close-octagon"></i></div>', '</div>'); ?>
        <?= $this->session->flashdata('message'); ?>
        <div class="row">
            <div class="col-md-9 col-lg-9 col-xl-9">
                <div class="card m-b-30">
                    <h6 class="card-header mt-0"><i class="mdi mdi-format-line-spacing"></i> Daftar Role</h6>
                    <div class="card-body">
                        <table id="myTable" class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama Role</th>
                                    <th style="width: 5cm;" scope="col">Tindakan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($role as $r) : ?>
                                    <tr>
                                        <td scope="row"><b><?= $i++; ?></b></td>
                                        <td><?= $r['role']; ?></td>
                                        <td>
                                            <div class="button-items">
                                                <a href="<?= base_url('Administrator/roleaccess/') . $r['id']; ?>" data-toggle="tooltip" data-placement="left" title="" data-original-title="Access" class="btn btn-warning waves-effect waves-warning"><i class="mdi mdi-checkbox-marked-outline"></i></a>

                                                <button disabled class="btn hps1<?= $r['id']; ?> btn-success waves-effect waves-success" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" onclick="edit<?= $r['id']; ?>()"><i class="mdi mdi-lead-pencil"></i></button>

                                                <button disabled class="btn hps2<?= $r['id']; ?> btn-danger waves-effect waves-danger" data-toggle="tooltip" data-placement="right" title="" data-original-title="Delete" onclick="hapus<?= $r['id']; ?>()"><i class="mdi mdi-delete"></i></button>

                                                <script>
                                                    if (<?= $r['id']; ?> > 3) {
                                                        document.getElementsByClassName("hps1<?= $r['id']; ?>")[0].removeAttribute("disabled");
                                                        document.getElementsByClassName("hps2<?= $r['id']; ?>")[0].removeAttribute("disabled");
                                                    };

                                                    function edit<?= $r['id']; ?>() {
                                                        window.location = "<?= base_url('Administrator/edit/') . $r['id']; ?>";
                                                    };

                                                    function hapus<?= $r['id']; ?>() {
                                                        var yakin = confirm('Yakin ingin hapus Role "<?= $r['role']; ?>" ??');
                                                        if (yakin) {
                                                            window.location = "<?= base_url('Administrator/delete/') . $r['id']; ?>";
                                                        };
                                                    };
                                                </script>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-lg-3 col-xl-3">
                <div class="card m-b-30">
                    <h6 class="card-header mt-0"><i class="mdi mdi-access-point"></i> Role baru</h6>
                    <div class="card-body">
                        <form action="<?= base_url('Administrator/role'); ?>" method="post">
                            <input class="form-control" required type="text" name="role" id="role" placeholder="Masukan Nama Role...">
                            <button type="submit" class="btn btn-primary btn-block mt-2"><i class="mdi mdi-content-save"></i> Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->