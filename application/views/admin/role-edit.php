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
                            <li class="breadcrumb-item"><a href="<?= base_url('Administrator/role'); ?>">Role</a></li>
                            <li class="breadcrumb-item active"><?= $title; ?></li>
                        </ol>
                    </div>
                    <h4 class="page-title"><?= $title; ?></h4>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-4 col-lg-4 col-xl-4">
                <div class="card m-b-30">
                    <div class="card-body">
                        <form action="<?= base_url('Administrator/edit/' . $role['id']); ?>" method="post">
                            <!-- <div class="form-group row"> -->
                                <!-- <label for="id" class="col-sm-4 col-form-label">Role Code</label> -->
                                <!-- <div class="col-sm-8"> -->
                                    <input type="hidden" readonly class="form-control-plaintext" id="id" name="id" value="<?= $role['id']; ?>" readonly>
                                <!-- </div> -->
                            <!-- </div> -->
                            <div class="form-group row">
                                <label for="name" class="col-sm-4 col-form-label">Nama Role</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="role" name="role" value="<?= $role['role']; ?>">
                                    <?= form_error('role', '<small class="text-danger pl-4">', '</small>'); ?>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="name" class="col-sm-4 col-form-label"></label>
                                <div class="col-sm-8">
                                    <a class="btn mt-1 mb-1 btn-outline-secondary" href="<?= base_url('Administrator/role'); ?>"><i class="mdi mdi-undo-variant"></i> Back</a>
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