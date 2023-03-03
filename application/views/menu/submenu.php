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
                            <li class="breadcrumb-item"><a href="#">Menu</a></li>
                            <li class="breadcrumb-item active"><?= $title; ?></li>
                        </ol>
                    </div>
                    <h4 class="page-title"><?= $title; ?></h4>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 col-lg-8 col-xl-8">
                <div class="card m-b-30">
                    <h6 class="card-header m-0">Daftar Submenu</h6>
                    <div class="card-body">
                        <?php if (validation_errors()) : ?>
                            <div class="alert alert-danger" role="alert">
                                <?= validation_errors(); ?>
                            </div>
                        <?php endif; ?>

                        <?= $this->session->flashdata('message'); ?>
                        <table id="myTable" class="table table-hover">
                            <thead>
                                <tr>
                                    <th style="width: 1cm;" scope="col">#</th>
                                    <th scope="col">Nama Submenu</th>
                                    <th style="width: 5cm;" scope="col">Controllers</th>
                                    <!-- <th style="width: 4cm;" scope="col">Url</th> -->
                                    <!-- <th scope="col">Icon</th> -->
                                    <!-- <th scope="col">Active</th> -->
                                    <th style="width: 4cm;" scope="col">icon</th>
                                    <th style="width: 4cm;" scope="col">Tindakan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($subMenu as $sm) : ?>
                                    <tr>
                                        <td scope="row"><b><?= $i++; ?></b></td>
                                        <td><?= $sm['title']; ?> <?php
                                                                    if ($sm['is_active'] == 1) {
                                                                        echo '<i data-toggle="tooltip" data-placement="right" title="" data-original-title="Submenu Aktif" style="color: green;" class="mdi mdi-check-circle"></i>';
                                                                    } else {
                                                                        echo '<i data-toggle="tooltip" data-placement="right" title="" data-original-title="Submenu Tidak Aktif" style="color: red;" class="mdi mdi-check-circle"></i>';
                                                                    }
                                                                    ?></td>
                                        <td><?= $sm['menu']; ?></td>
                                        <!-- <td><?= $sm['url']; ?></td> -->
                                        <!-- <td><?= $sm['icon']; ?></td> -->
                                        <!-- <td><?= $sm['is_active']; ?></td> -->
                                        <!-- <td>
                                            <?php if ($sm['is_active'] == 1) {
                                                echo "Yes";
                                            } else {
                                                echo "No";
                                            } ?>
                                        </td> -->
                                        <td>
                                            <i class="<?= $sm['icons']; ?>"></i>
                                        </td>
                                        <td>
                                            <div class="button-items">
                                                <button class="btn hps1<?= $sm['id']; ?> btn-success waves-effect waves-success" data-toggle="tooltip" data-placement="left" title="" data-original-title="Edit" onclick="edit<?= $sm['id']; ?>()"><i class="mdi mdi-lead-pencil"></i></button>

                                                <button class="btn hps2<?= $sm['id']; ?> btn-danger waves-effect waves-danger" data-toggle="tooltip" data-placement="right" title="" data-original-title="Delete" onclick="hapus<?= $sm['id']; ?>()"><i class="mdi mdi-delete"></i></button>

                                                <script>
                                                    function edit<?= $sm['id']; ?>() {
                                                        window.location = "<?= base_url('menu/subMenuEdit/' . $sm['id']); ?>";
                                                    };

                                                    function hapus<?= $sm['id']; ?>() {
                                                        var yakin = confirm('Yakin ingin hapus Submenu "<?= $sm['title']; ?>" ??');
                                                        if (yakin) {
                                                            window.location = "<?= base_url('menu/subMenuDelete/' . $sm['id']); ?>";
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
            <div class="col-md-4 col-lg-4 col-xl-4">
                <form action="<?= base_url('menu/submenu'); ?>" method="post">
                    <div class="card m-b-30">
                        <h6 class="card-header m-0">Submenu Baru</h6>
                        <div class="card-body">
                            <div class="form-group">
                                <input type="text" class="form-control" id="title" name="title" required placeholder="Nama Submenu...">
                            </div>
                            <div class="form-group">
                                <select name="menu_id" id="menu_id" class="form-control" required>
                                    <option value="">Pilih Controllers</option>
                                    <?php foreach ($menu as $m) : ?>
                                        <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="url" name="url" required placeholder="URL Submenu...">
                            </div>
                            <!-- <div class="form-group">
                        <input type="text" class="form-control" id="icon" name="icon" value="fas fa-fw fa-" placeholder="Submenu icon">
                    </div> -->
                            <div class="form-group">
                                <label for="">Active?</label>
                                <div class="custom-control custom-checkbox">
                                    <input class="form-check-input custom-control-input" value="1" type="radio" name="is_active" id="is_active1" checked>
                                    <label class="custom-control-label" for="is_active1">
                                        Yes
                                    </label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input class="form-check-input custom-control-input" value="0" type="radio" name="is_active" id="is_active2">
                                    <label class="custom-control-label" for="is_active2">
                                        No
                                    </label>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block mt-3"><i class="mdi mdi-content-save"></i> Save</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>





    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->

<!-- Modal -->
<div class="modal fade" id="newSubMenuModal" tabindex="-1" role="dialog" aria-labelledby="newSubMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newSubMenuModalLabel"><i class="mdi mdi-folder-plus"></i> New Submenu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('menu/submenu'); ?>" method="post">
                <div class="modal-body">
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->

                </div>
            </form>
        </div>
    </div>
</div>