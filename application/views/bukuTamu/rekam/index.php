<div style="position: fixed;z-index:9;top: -999999999999px;left:-999999999px;" class="mb-3 foto img-fluid" id="my_camera"></div>
<div class="">
  <?= $this->session->flashdata('message'); ?>
</div>
<div class="row">
  <div class="col-md-6 col-lg-4 mb-3">
    <div class="card">
      <div class="foto" id="results">
        <img class="card-img-top" src="<?= base_url('assets/') ?>img/elements/index.png" alt="Card image cap">
      </div>
      <div class="card-body">
        <h5 class="card-title">Kamera</h5>
        <p class="card-text">
        </p>
        <form action="<?= base_url('/'); ?>BukuTamu/unRekam" method="post">
          <div class="tab-pane fade show active">
            <button type="button" id="ambil" onclick="take_snapshot()" class="btn btn-outline-primary mt-1"><i class='bx bxs-camera'></i> Ambil Gambar</button>
            <input type="hidden" value="" name="hapusGmr" id="gambar1">
            <button id="reset" type="submit" disabled class="btn btn-outline-danger mt-1"><i class='bx bx-reset'></i> Reset</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="col-xl col-md-6 col-lg-8">
    <div class="card mb-4">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Form Tamu Masuk</h5>
        <!-- <small class="text-muted float-end">Merged input group</small> -->
      </div>
      <div class="card-body">
        <form action="<?= base_url('BukuTamu/rekam'); ?>" id="form_id" class="mt-0 pl-2" method="post" enctype="multipart/form-data">
          <div class="mb-3">
            <label class="form-label" for="basic-icon-default-fullname"><?php if (form_error('namaTamu')) {
                                                                          echo form_error('namaTamu', '<div class="text-danger pl-3">', '</div>');
                                                                        } else {
                                                                          echo "Nama Tamu";
                                                                        } ?></label>
            <div class="input-group input-group-merge">
              <span class="input-group-text"><i class="bx bx-user"></i></span>
              <input value="<?= set_value('namaTamu') ?>" autofocus id="namaTamu" name="namaTamu" type="text" class="form-control" placeholder="John Doe" aria-label="John Doe" aria-describedby="namaTamu">
            </div>
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-icon-default-company"><?php if (form_error('alamatTamu')) {
                                                                          echo form_error('alamatTamu', '<div class="text-danger pl-3">', '</div>');
                                                                        } else {
                                                                          echo "Alamat Tamu";
                                                                        } ?></label>
            <div class="input-group input-group-merge">
              <span class="input-group-text"><i class="bx bx-buildings"></i></span>
              <input value="<?= set_value('alamatTamu') ?>" id="alamatTamu" name="alamatTamu" type="text" class="form-control" placeholder="JL.Ahmad Yani .." aria-label="JL.Ahmad Yani .." aria-describedby="alamatTamu">
            </div>
          </div>
          <div class="row">
            <div class="col-xl-6">
              <div class="mb-3">
                <label for="ditemui" class="form-label"><?php if (form_error('ditemui')) {
                                                          echo form_error('ditemui', '<div class="text-danger pl-3">', '</div>');
                                                        } else {
                                                          echo "Ingin Bertemu";
                                                        } ?></label>
                <select name="ditemui" id="ditemui" class="form-select" aria-label="Default select example">
                  <span class="input-group-text"><i class="bx bx-buildings"></i></span>
                  <option <?php if ("" == set_value('ditemui')) {
                            echo 'selected';
                          } ?> value=""> - pilih - </option>
                  <?php foreach ($users as $u) : ?>
                    <?php if ($u['ditemui'] == 1) : ?>
                      <option <?php if ($u['id'] == set_value('ditemui')) {
                                echo 'selected value="' . $u['id'] . '"';
                              } else {
                                echo 'value="' . $u['id'] . '"';
                              } ?>><?= $u['jabatan']; ?></option>
                    <? endif; ?>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="col-xl-6">
              <div class="mb-3">
                <label class="form-label" for="basic-icon-default-phone">Tanggal Berkunjung</label>
                <div class="input-group input-group-merge">
                  <span class="input-group-text"><i class='bx bxs-calendar'></i></span>
                  <input required id="tanggalBerkunjung" name="tanggalBerkunjung" type="date" class="form-control phone-mask" value="<?= date("Y-m-d", time()); ?>" aria-label="658 799 8941" aria-describedby="tanggalBerkunjung">
                </div>
              </div>
            </div>
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-icon-default-message"><?php if (form_error('keperluanTamu')) {
                                                                          echo form_error('keperluanTamu', '<div class="text-danger pl-3">', '</div>');
                                                                        } else {
                                                                          echo "Keperluan Tamu";
                                                                        } ?></label>
            <div class="input-group input-group-merge">
              <span class="input-group-text"><i class="bx bx-comment"></i></span>
              <textarea id="keperluanTamu" name="keperluanTamu" class="form-control" placeholder="Isi di sini dan tanyakan dengan jelas KeperluanTamu ingin bertamu.." aria-label=""><?= set_value('keperluanTamu') ?></textarea>
            </div>
          </div>


          <input type="hidden" value="index.jpg" id="gambar" name="gambar">
          <button type="submit" id="rekam" name="submit" class="btn btn-primary"><i class='bx bxs-save'></i> Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>
<script src="<?= base_url('assets/') ?>js/webcamjs/webcam.min.js"></script>
<script src="<?= base_url('assets/') ?>js/js_me/webcam.js"></script>