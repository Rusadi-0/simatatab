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
            <div class="col-md-6 col-lg-6 col-xl-6">
                <div class="card m-b-30">
                    <h6 class="card-header mt-0">Edit</h6>
                    <div class="card-body">
                        <form action="<?= base_url('OmsetDua/edit/') . $omset['id']; ?>" method="post">
                            <div class="form-group row">
                                <label for="nama_penyetor" class="col-sm-4 col-form-label"><strong>nama_penyetor</strong></label>
                                <div class="col-sm-8">
                                    <input type="text" min="0" id="nama_penyetor" name="nama_penyetor" value="<?= $omset['nama_penyetor']; ?>" required class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nilai_omset" class="col-sm-4 col-form-label"><strong>nilai_omset</strong></label>
                                <div class="col-sm-8">
                                    <input type="number" min="0" id="nilai_omset" name="nilai_omset" value="<?= $omset['nilai_omset']; ?>" required class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="jumlah_kembalian" class="col-sm-4 col-form-label"><strong>jumlah_kembalian</strong></label>
                                <div class="col-sm-8">
                                    <input type="number" min="0" id="jumlah_kembalian" name="jumlah_kembalian" value="<?= $omset['jumlah_kembalian']; ?>" required class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tanggal_stor" class="col-sm-4 col-form-label"><strong>tanggal_stor</strong></label>
                                <div class="col-sm-8">
                                    <input type="date" min="0" id="tanggal_stor" name="tanggal_stor" value="<?= $omset['tanggal_stor']; ?>" required class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="bulan" class="col-sm-4 col-form-label"><strong>bulan</strong></label>
                                <div class="col-sm-8">
                                    <input type="number" min="0" id="bulan" name="bulan" value="<?= $omset['bulan']; ?>" required class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tahun" class="col-sm-4 col-form-label"><strong>tahun</strong></label>
                                <div class="col-sm-8">
                                    <input type="number" min="0" id="tahun" name="tahun" value="<?= $omset['tahun']; ?>" required class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="waktu_stor" class="col-sm-4 col-form-label"><strong>waktu_stor</strong></label>
                                <div class="col-sm-8">
                                    <input type="number" min="0" id="waktu_stor" name="waktu_stor" value="<?= $omset['waktu_stor']; ?>" required class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="keterangan" class="col-sm-4 col-form-label"><strong>keterangan</strong></label>
                                <div class="col-sm-8">
                                    <input type="text" min="0" id="keterangan" name="keterangan" value="<?= $omset['keterangan']; ?>" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row mt-5">
                                <div class="col-sm-12">
                                    <div id="jahh">
                                        <button type="submit" id="jah" onclick="oh()" class="btn btn-block btn-primary mt-2" class="btn btn-primary mt-2"><i class='mdi mdi-content-save'></i> Simpan</button>
                                        <a class="btn btn-block btn-outline-secondary" href="../data"> Kembali</a>
                                    </div>
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