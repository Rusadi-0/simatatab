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
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                    <h4 class="page-title"><?= $title; ?></h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-12 col-xl-12">
                <div class="card m-b-30">
                    <h6 class="card-header mt-0"><i class="mdi mdi-timer"></i> Riwayat Log</h6>
                    <div class="card-body">
                    <form action="<?= base_url('campas/index'); ?>" method="POST">
                              <div class="modal-body">
                                   <div class="form-group row">
                                        <label for="namaCampas" class="col-sm-3 col-form-label">Nama</label>
                                        <div class="col-sm-9">
                                             <input class="form-control" type="text" name="namaCampas" value="<?= $campas["namaCampas"];?>" id="namaCampas">
                                             <?= form_error('namaCampas', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                   </div>
                                   <div class="form-group row">
                                        <label for="alamatCampas" class="col-sm-3 col-form-label">Alamat</label>
                                        <div class="col-sm-9">
                                             <input class="form-control" type="text" name="alamatCampas" value="<?= $campas["alamatCampas"];?>" id="alamatCampas">
                                             <?= form_error('alamatCampas', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                   </div>
                                   <div class="form-group row">
                                        <label for="teleponCampas" class="col-sm-3 col-form-label">Telepon</label>
                                        <div class="col-sm-9">
                                             <input class="form-control" type="text" name="teleponCampas" value="<?= $campas["teleponCampas"];?>" id="teleponCampas">
                                             <?= form_error('teleponCampas', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                   </div>
                                   <div class="form-group row">
                                        <label for="rekeningCampas" class="col-sm-3 col-form-label">Rekening</label>
                                        <div class="col-sm-9">
                                             <input class="form-control" type="text" name="rekeningCampas" value="<?= $campas["rekeningCampas"];?>" id="rekeningCampas">
                                             <?= form_error('rekeningCampas', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                   </div>
                              </div>
                              <div class="modal-footer">
                                   <button type="submit" class="btn btn-block btn-primary"><i class="mdi mdi-content-save"></i> Save</button>
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