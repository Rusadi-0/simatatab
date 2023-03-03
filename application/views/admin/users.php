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
                            <li class="breadcrumb-item active">Users</li>
                        </ol>
                    </div>
                    <h4 class="page-title"><?= $title; ?></h4>
                </div>
            </div>
        </div>
        <?= form_error('name', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
        <?= form_error('email', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
        <?= $this->session->flashdata('message'); ?>
        <div class="row">
            <div class="col-md-9 col-lg-9 col-xl-9">
                <div class="card m-b-30">
                    <h6 class="card-header mt-0"><i class="mdi mdi-format-line-spacing"></i> Daftar users</h6>
                    <div class="card-body">
                        <table id="myTable" class="table">
                            <thead>
                                <tr>
                                    <th style="width: 1cm;" scope="col">#</th>
                                    <th scope="col">Nama</th>
                                    <th style="width: 4.5cm;" scope="col">Role</th>
                                    <!-- <th style="width: 2cm;" scope="col">Active</th> -->
                                    <th style="width: 4cm;" scope="col">Tindakan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($userRole as $u) : ?>
                                    <tr>
                                        <td scope="row"><b><?= $i++; ?></b></td>
                                        <td><?= $u['name']; ?> <?php if ($u['is_active'] == 1) {
                                                                    echo '<i data-toggle="tooltip" data-placement="right" title="" data-original-title="User Active" style="color: green;" class="mdi mdi-check-circle"></i>';
                                                                } else {
                                                                    echo '<i data-toggle="tooltip" data-placement="right" title="" data-original-title="Tidak Active" style="color: red;" class="mdi mdi-close-circle"></i>';
                                                                }; ?>
                                        </td>
                                        <td><?= $u['role']; ?></td>
                                        <!-- <td>

                                            <?php if ($u['is_active'] == 1) {
                                                echo '<div style="color: green;" class="text-center"><i class="mdi mdi-check-circle"></i></div>';
                                            } else {
                                                echo '<div style="color: red;" class="text-center"><i class="mdi mdi-close-circle"></i></div>';
                                            }; ?>
                                        </td> -->
                                        <td>
                                            <div class="button-items">
                                                <button disabled class="btn hps1<?= $u['id']; ?> btn-success" data-toggle="tooltip" data-placement="left" title="" data-original-title="Edit" onclick="edit<?= $u['id']; ?>()"><i class="mdi mdi-lead-pencil"></i></button>
                                                <button disabled class="btn hps2<?= $u['id']; ?> btn-danger" data-toggle="tooltip" data-placement="right" title="" data-original-title="Delete" onclick="hapus<?= $u['id']; ?>()"><i class="mdi mdi-delete"></i></button>
                                            </div>
                                            <script>
                                                if (<?= $u['id']; ?> > 1) {
                                                    document.getElementsByClassName("hps1<?= $u['id']; ?>")[0].removeAttribute("disabled");
                                                    document.getElementsByClassName("hps2<?= $u['id']; ?>")[0].removeAttribute("disabled");
                                                };

                                                function edit<?= $u['id']; ?>() {
                                                    window.location = "<?= base_url('Administrator/users_edit/') . $u['id']; ?>";
                                                };

                                                function hapus<?= $u['id']; ?>() {
                                                    var yakin = confirm('Yakin ingin hapus User "<?= $u['name']; ?>" ??');
                                                    if (yakin) {
                                                        window.location = "<?= base_url('Administrator/users_delete/') . $u['id']; ?>";
                                                    };
                                                }
                                            </script>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="row">
                <div class="col-12">
                <div class="card m-b-30">
                    <h6 class="card-header mt-0"><i class="mdi mdi-account-plus"></i> Tambah users</h6>
                    <div class="card-body">
                        <form action="<?= base_url('Administrator/users'); ?>" method="POST">
                            <div class="form-group">
                                <input type="text" name="name" id="name" class="form-control mb-2" aria-describedby="passwordHelpBlock" required placeholder="Masukan Nama User...">
                                <input type="email" name="email" id="email" class="form-control mb-2" aria-describedby="passwordHelpBlock" required placeholder="Email...">
                                <input type="hidden" name="image" id="image" class="form-control mb-2" aria-describedby="passwordHelpBlock">
                                <input type="hidden" name="password1" id="password1" class="form-control mb-2" aria-describedby="passwordHelpBlock">
                                <input type="hidden" name="role_id" id="role_id" class="form-control mb-2" aria-describedby="passwordHelpBlock">
                                <input type="hidden" name="is_active" id="is_active" class="form-control mb-2" aria-describedby="passwordHelpBlock">
                                <input type="hidden" name="date_created" id="date_created" class="form-control mb-2" aria-describedby="passwordHelpBlock">
                            </div>
                            <button type="submit" class="btn btn-block btn-primary"><i class="mdi mdi-content-save"></i> Save</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card m-b-30 text-white card-success">
                    <div class="card-body">
                        <blockquote class="card-bodyquote">
                            <p>Default setting dalam membuat akun baru :</p>
                            <ul>
                                <li>Role : Member</li>
                                <li>Active : Yes</li>
                                <li>Pass : 123</li>
                            </ul>
                            <!-- <footer>Icon <i class="mdi mdi-check-circle"></i> menunjukan user active <cite title="Source Title">Source Title</cite> -->
                            <footer>Icon <i class="mdi mdi-check-circle"></i> menunjukan user active
                            </footer>
                            <footer>Icon <i class="mdi mdi-close-circle"></i> menunjukan tidak active
                            </footer>
                        </blockquote>
                    </div>
                </div>
            </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="mdi mdi-account-plus"></i> Tambah User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('Administrator/users'); ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="name">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" id="name" class="form-control mb-2" aria-describedby="passwordHelpBlock" required placeholder="Masukan Nama User...">
                        </div>
                        <label class="col-sm-2 col-form-label" for="email">Email</label>
                        <div class="col-sm-10">
                            <input type="email" name="email" id="email" class="form-control mb-2" aria-describedby="passwordHelpBlock" required placeholder="Email...">
                        </div>
                        <input type="hidden" name="image" id="image" class="form-control mb-2" aria-describedby="passwordHelpBlock">
                        <input type="hidden" name="password1" id="password1" class="form-control mb-2" aria-describedby="passwordHelpBlock">
                        <input type="hidden" name="role_id" id="role_id" class="form-control mb-2" aria-describedby="passwordHelpBlock">
                        <input type="hidden" name="is_active" id="is_active" class="form-control mb-2" aria-describedby="passwordHelpBlock">
                        <input type="hidden" name="date_created" id="date_created" class="form-control mb-2" aria-describedby="passwordHelpBlock">
                    </div>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                    <button type="submit" class="btn btn-primary"><i class="mdi mdi-content-save"></i> Save</button>
            </form>
        </div>
    </div>
</div>
</div>