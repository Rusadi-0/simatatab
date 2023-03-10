<div style="position: fixed;z-index:9;top: -999999999999px;left:-999999999px;" class="mb-3 foto img-fluid" id="my_camera"></div>
<div class="">
  <?= $this->session->flashdata('message'); ?>
</div>
<div class="row">
  <div class="col-md-6 col-lg-4 mb-3">
    <div class="card">
      <div class="foto" id="results">
        <?php if ($tamu['gambar'] == "tidak ada") : ?>
          <img class="card-img-top" src="<?= base_url('/') ?>img/index.jpg" alt="Card image cap">
        <?php else : ?>
          <img class="card-img-top" src="<?= base_url('/') ?>img/<?= $tamu['gambar']; ?>" alt="Card image cap">
        <?php endif; ?>
      </div>
      <div class="card-body">
        <h5 class="card-title">Kamera</h5>
        <p class="card-text">
        </p>
        <form action="<?= base_url('/'); ?>BukuTamu/unRekamEdit/<?= $tamu['id']; ?>/" method="post">
          <div class="tab-pane fade show active">
            <?php if ($tamu['gambar'] == "tidak ada") : ?>
              <button type="button" id="ambil" onclick="take_snapshot()" class="btn btn-primary mt-1"><i class='bx bxs-camera'></i> Ambil Gambar</button>
              <input type="hidden" value="<?= $tamu['gambar']; ?>" name="hapusGmr" id="gambar1">
              <button id="reset" disabled type="submit" class="btn btn-danger mt-1"><i class='bx bx-reset'></i> Reset</button>
            <?php else : ?>
              <button type="button" disabled id="ambil" onclick="take_snapshot()" class="btn btn-primary mt-1"><i class='bx bxs-camera'></i> Ambil Gambar</button>
              <input type="hidden" value="<?= $tamu['gambar']; ?>" name="hapusGmr" id="gambar1">
              <a id="reset" class="btn btn-danger" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#hapusGambar<?= $tamu['id']; ?>"><i class='bx bx-trash me-1'></i> Hapus</a>
            <?php endif; ?>
          </div>
          <!-- START MODAL HAPUS GAMBAR -->
          <div class="modal fade" id="hapusGambar<?= $tamu['id']; ?>" data-bs-blackdrop="static" aria-labelledby="modalToggleLabel" tabindex="-1" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-sm">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="modalToggleLabel">Hapus Foto Lama</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-footer">
                  <a class="btn btn-outline-secondary" data-bs-dismiss="modal" href="javascript:void(0);"><i class="bx bx-undo me-1"></i> Batal</a>
                  <button id="reset" type="submit" class="btn btn-danger mt-1"><i class='bx bx-trash me-1'></i> Hapus Foto</button>
                </div>
              </div>
            </div>
          </div>
          <!-- END MODAL HAPUS GAMBAR -->
        </form>
      </div>
    </div>
  </div>
  <div class="col-xl col-md-6 col-lg-8">
    <div class="card mb-4">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Form Edit Tamu Masuk</h5>
        <!-- <small class="text-muted float-end">Merged input group</small> -->
      </div>
      <div class="card-body">
        <form action="<?= base_url('BukuTamu/editDataTamu/'); ?><?= $tamu['id']; ?>" id="form_id" class="mt-0 pl-2" method="post" enctype="multipart/form-data">
          <div class="mb-3">
            <label class="form-label" for="basic-icon-default-fullname"><?php if (form_error('namaTamu')) {
                                                                          echo form_error('namaTamu', '<div class="text-danger pl-3">', '</div>');
                                                                        } else {
                                                                          echo "Nama Tamu";
                                                                        } ?></label>
            <div class="input-group input-group-merge">
              <span class="input-group-text"><i class="bx bx-user"></i></span>
              <input value="<?= $tamu['namaTamu']; ?>" id="namaTamu" oninput="valInputEditTamu()" name="namaTamu" type="text" class="form-control" placeholder="John Doe" aria-label="John Doe" aria-describedby="namaTamu">
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
              <input value="<?= $tamu['alamatTamu']; ?>" id="alamatTamu" oninput="valInputEditTamu()" name="alamatTamu" type="text" class="form-control" placeholder="JL.Ahmad Yani .." aria-label="JL.Ahmad Yani .." aria-describedby="alamatTamu">
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
                <select oninput="valInputEditTamu()" name="ditemui" id="ditemui" class="form-select" aria-label="Default select example">
                  <span class="input-group-text"><i class="bx bx-buildings"></i></span>

                  <?php foreach ($users as $u) : ?>
                    <?php if ($u['ditemui'] == 1) : ?>
                      <option <?php if ($u['id'] == $tamu['ditemui']) {
                                echo "selected";
                              } ?> value="<?= $u['id']; ?>"><?= $u['jabatan']; ?></option>
                    <?php endif; ?>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="col-xl-6">
              <div class="mb-3">
                <label class="form-label" for="basic-icon-default-phone"><?php if (form_error('Tanggal Berkunjung')) {
                                                                            echo form_error('Tanggal Berkunjung', '<div class="text-danger pl-3">', '</div>');
                                                                          } else {
                                                                            echo "Tanggal Berkunjung";
                                                                          } ?></label>
                <div class="input-group input-group-merge">
                  <span class="input-group-text"><i class='bx bxs-calendar'></i></span>
                  <input required id="tanggalBerkunjung" oninput="valInputEditTamu()" name="tanggalBerkunjung" type="date" class="form-control phone-mask" value="<?= $tamu['tanggalBerkunjung']; ?>" aria-label="658 799 8941" aria-describedby="tanggalBerkunjung">
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
              <textarea id="keperluanTamu" oninput="valInputEditTamu()" name="keperluanTamu" class="form-control" placeholder="Isi di sini dan tanyakan dengan jelas KeperluanTamu ingin bertamu.." aria-label=""><?= $tamu['keperluanTamu']; ?></textarea>
            </div>
          </div>


          <input type="hidden" value="<?= $tamu['gambar']; ?>" id="gambar" name="gambar">
          <a href="<?= base_url("/"); ?>BukuTamu/data" type="button" class="btn btn-outline-secondary"><i class='bx bx-undo'></i> Kembali</a>
          <button type="submit" disabled id="rekamEdit" class="btn btn-primary"><i class='bx bxs-save'></i> Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>
<script>
  function valInputEditTamu() {
    let namaTamu = document.getElementById("namaTamu").value;
    let alamatTamu = document.getElementById("alamatTamu").value;
    let ditemui = document.getElementById("ditemui").value;
    let keperluanTamu = document.getElementById("keperluanTamu").value;


    if (namaTamu === "<?= $tamu['namaTamu']; ?>" && alamatTamu === "<?= $tamu['alamatTamu']; ?>" && ditemui === "<?= $tamu['ditemui']; ?>" && keperluanTamu === "<?= $tamu['keperluanTamu']; ?>") {
      document.getElementById("rekamEdit").setAttribute("disabled", true);

    } else {
      document.getElementById("rekamEdit").disabled = false;
    }
  }
</script>
<script src="<?= base_url('assets/') ?>js/webcamjs/webcam.min.js"></script>
<script src="<?= base_url('assets/') ?>js/js_me/webcamEdit.js"></script>