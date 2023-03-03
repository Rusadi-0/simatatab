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
                            <li class="breadcrumb-item"><a href="#">Annex</a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url('menu'); ?>">Menu Management</a></li>
                            <li class="breadcrumb-item active"><?= $title; ?></li>
                        </ol>
                    </div>
                    <h4 class="page-title"><?= $title; ?></h4>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 col-lg-6 col-xl-6">
                <div class="card m-b-30">
                    <div class="card-body">
                        <form action="<?= base_url('menu/edit/' . $menu['id']); ?>" method="post">
                            <input type="hidden" readonly class="form-control" id="id" name="id" value="<?= $menu['id']; ?>" readonly>
                            <div class="form-group row">
                                <label for="menu" class="col-sm-3 col-form-label">Controllers</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control-plaintext" id="menu" name="menu" value="<?= $menu['menu']; ?>">
                                    <?= form_error('menu', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="menu" class="col-sm-3 col-form-label">Nama Menu</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="name" name="name" value="<?= $menu['name']; ?>">
                                    <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="icon" class="col-sm-3 col-form-label">Nam icon</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="icon" name="icon" value="<?= $menu['icon']; ?>">
                                    <?= form_error('icon', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>


                            <div class="form-group row justify-content-end">
                                <div class="col-sm-9">
                                    <a class="btn btn-outline-secondary waves-effect" href="<?= base_url('menu'); ?>"><i class="mdi mdi-undo-variant"></i> Back</a>
                                    <button type="submit" class="btn btn-primary"><i class="mdi mdi-content-save"></i> Save</button>
                                </div>
                            </div>


                        </form>


                    </div>
                </div>
            </div>
        </div>




    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->