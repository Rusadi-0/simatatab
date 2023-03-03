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
        <?= $this->session->flashdata('message'); ?>
        <div class="row">
            <div class="col-md-12 col-lg-12 col-xl-12">
               <div class="row">
                    <div class="col-md-12 col-lg-12 col-xl-12">
                         <div class="card m-b-30">
                              <h5 class="card-header mt-0"><i class="mdi mdi-timer"></i> List Campas</h5>
                              <div class="card-body">
                              <button type="button" class="btn btn-primary mb-5" data-toggle="modal" data-target="#tambahCampas"><i class="mdi mdi-plus"></i> Tambah Campas</button>
                                      <!-- modal tambah campas-->
                              <div class="modal fade" id="tambahCampas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                   <div class="modal-dialog">
                                        <div class="modal-content">
                                             <div class="modal-header">
                                                  <h5 class="modal-title" id="exampleModalLabel">Tambah Campas</h5>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                       <span aria-hidden="true">&times;</span>
                                                  </button>
                                             </div>
                                             <form action="<?= base_url('campas/index'); ?>" method="POST">
                                                  <div class="modal-body">
                                                       <div class="form-group row">
                                                            <label for="namaCampas" class="col-sm-3 col-form-label">Nama</label>
                                                            <div class="col-sm-9">
                                                                 <input class="form-control" type="text" name="namaCampas" id="namaCampas">
                                                                 <?= form_error('namaCampas', '<small class="text-danger pl-3">', '</small>'); ?>
                                                            </div>
                                                       </div>
                                                       <div class="form-group row">
                                                            <label for="alamatCampas" class="col-sm-3 col-form-label">Alamat</label>
                                                            <div class="col-sm-9">
                                                                 <input class="form-control" type="text" name="alamatCampas" id="alamatCampas">
                                                                 <?= form_error('alamatCampas', '<small class="text-danger pl-3">', '</small>'); ?>
                                                            </div>
                                                       </div>
                                                       <div class="form-group row">
                                                            <label for="teleponCampas" class="col-sm-3 col-form-label">Telepon</label>
                                                            <div class="col-sm-9">
                                                                 <input class="form-control" type="text" name="teleponCampas" id="teleponCampas">
                                                                 <?= form_error('teleponCampas', '<small class="text-danger pl-3">', '</small>'); ?>
                                                            </div>
                                                       </div>
                                                       <div class="form-group row">
                                                            <label for="rekeningCampas" class="col-sm-3 col-form-label">Rekening</label>
                                                            <div class="col-sm-9">
                                                                 <input class="form-control" type="text" name="rekeningCampas" id="rekeningCampas">
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
                                   <table id="myTable" class="table table-hover">
                                        <thead>
                                             <tr>
                                                  <th scope="col">#</th>
                                                  <th>Nama</th>
                                                  <th>Alamat</th>
                                                  <th>Telepon</th>
                                                  <th>Rekening</th>
                                                  <th>Opsi</th>
                                             </tr>
                                        </thead>
                                        <tbody>
                                             <?php $i=1;?>
                                             <?php foreach ($campas as $c) : ?>
                                             <tr>
                                                  <td><?= $i++;?></td>
                                                  <td><?= $c["namaCampas"];?></td>
                                                  <td><?= $c["alamatCampas"];?></td>
                                                  <td><?= $c["teleponCampas"];?></td>
                                                  <td><?= $c["rekeningCampas"];?></td>
                                                  <td>
                                                       <div class="button-items">
                                                            <button type="button" class="btn btn-danger" onclick="hapus<?= $c['id']; ?>()">
                                                                 <i class="mdi mdi-delete"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-success" onclick="edit<?= $c['id']; ?>()">
                                                                 <i class="mdi mdi-pencil"></i>
                                                            </button>
                                                       </div>
                                                       <!-- Modal Hapus -->
                                                       <!-- <div class="modal fade" id="hapus<?= $c['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-sm">
                                                                 <div class="modal-content">
                                                                      <div class="modal-header">
                                                                           <h5 class="modal-title" id="exampleModalLabel">Yakin Hapus Data?</h5>
                                                                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                           </button>
                                                                      </div>
                                                                      <div class="modal-body">
                                                                           <h4>Yakin ?</h4>
                                                                      </div>
                                                                      <div class="modal-footer">
                                                                           <button type="button" class="btn btn-danger" onclick="hapus<?= $c['id']; ?>()">Yakin</button>
                                                                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                                                                      </div>
                                                                 </div>
                                                            </div>
                                                       </div> -->

                                                       <script>
                                                            function hapus<?= $c['id']; ?>() {
                                                                 let yakinD = confirm("yakin hapus?");
                                                                 if(yakinD){
                                                                      window.location = "<?= base_url('campas/delete/') . $c['id']; ?>";
                                                                 };
                                                            }

                                                            function edit<?= $c['id']; ?>() {
                                                                 window.location = "<?= base_url('campas/edit/') . $c['id']; ?>";
                                                            }
                                                       </script>
                                                  </td>
                                             </tr>
                                             <?php endforeach;?>
                                        </tbody>
                                   </table>
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