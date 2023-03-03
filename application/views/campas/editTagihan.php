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
                    <h6 class="card-header mt-0"><i class="mdi mdi-timer"></i> Edit Tagihan</h6>
                    <div class="card-body">
                    <form action="<?= base_url('campas/editTagihan/') . $tagihan['id']; ?>" method="POST">
                              <div class="modal-body">
                                   <div class="form-group row">
                                        <label for="dari_tagihan" class="col-sm-3 col-form-label">dari_tagihan</label>
                                        <div class="col-sm-9">
                                        <select name="dari_tagihan" id="menu_id" class="form-control" required>
                                                <?php foreach ($campas as $c) : ?>
                                                    <option <?php if ($c['namaCampas'] == $tagihan["dari_tagihan"]) {
                                                        echo 'selected';
                                                    } ?> 
                                                    value="<?= $c['namaCampas']; ?>"><?= $c['namaCampas']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                             <?= form_error('dari_tagihan', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                   </div>
                                   <div class="form-group row">
                                        <label for="total_tagihan" class="col-sm-3 col-form-label">total_tagihan</label>
                                        <div class="col-sm-9">
                                             <input class="form-control" type="number" min="0" name="total_tagihan" value="<?= $tagihan["total_tagihan"];?>" id="total_tagihan">
                                             <?= form_error('total_tagihan', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                   </div>
                                   <div class="form-group row">
                                        <label for="tanggal_tagihan" class="col-sm-3 col-form-label">tanggal_tagihan</label>
                                        <div class="col-sm-9">
                                             <input class="form-control" type="date" name="tanggal_tagihan" value="<?= $tagihan["tanggal_tagihan"];?>" id="tanggal_tagihan">
                                             <?= form_error('tanggal_tagihan', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                   </div>
                                   <div class="form-group row">
                                        <label for="bulan" class="col-sm-3 col-form-label">bulan</label>
                                        <div class="col-sm-9">
                                             <input class="form-control" type="number" min="0" name="bulan" value="<?= $tagihan["bulan"];?>" id="bulan">
                                             <?= form_error('bulan', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                   </div>
                                   <div class="form-group row">
                                        <label for="tahun" class="col-sm-3 col-form-label">tahun</label>
                                        <div class="col-sm-9">
                                             <input class="form-control" type="number" min="0" name="tahun" value="<?= $tagihan["tahun"];?>" id="tahun">
                                             <?= form_error('tahun', '<small class="text-danger pl-3">', '</small>'); ?>
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