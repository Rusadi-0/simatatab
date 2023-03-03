<?php

$hasilPersenProfit = 10;

?>
<script>
    // START LABA BULAN INI
    let varTotalPendapatanPerbulan = <?php foreach ($getAll as $gg) {
                                            echo $gg;
                                        } ?>; //variabel varTotalPendapatanPerbulan adalah untuk mrnampilkan semua data nilai_omset bulan sekarang
    let varTotalKembalianPerbulan = <?php foreach ($getAss as $ss) {
                                        echo $ss * 250000;
                                    } ?>; //variabel varTotalKembalianPerbulan adalah untuk menampilkan semuada data jumlah_kembalian bulan sekarang
    let varTotalOmzetPerbulan = varTotalPendapatanPerbulan - varTotalKembalianPerbulan; //variabel varTotalOmzetPerbulan adalah nilai dari SUM data nilai_omset dikurang SUM data jumlah_kembalian
    let persenanProfit = <?= $hasilPersenProfit; ?>;
    let varProfitPerbulan = varTotalOmzetPerbulan / persenanProfit;
    let varTotalAsetPerbulan = varTotalOmzetPerbulan - varProfitPerbulan;
    // END LABA BULAN INI



    // START UPAH 20%
    let varPersenanUpah = 20;
    let varHasilUpah = (varProfitPerbulan * varPersenanUpah) / 100;
    let varPembulatan = 1000;
    let varUpahDibulatkan = Math.round(varHasilUpah / varPembulatan) * varPembulatan;
    // END UPAH 20%
</script>
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
                            <li class="breadcrumb-item"><a href="#">Kasir</a></li>
                            <li class="breadcrumb-item active"><?= $title; ?></li>
                        </ol>
                    </div>
                    <h4 class="page-title"><?= $title; ?></h4>
                </div>
            </div>
        </div>
        <?= $this->session->flashdata('message'); ?>
        <?= form_error('nama_penyetor', '<small class="text-danger pl-3">', '</small>'); ?>
        <?php date_default_timezone_set("Asia/Kuala_Lumpur"); ?>

        <div class="row">
            <div class="col-md-6 col-lg-6 col-xl-6">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-xl-12">
                        <div class="card m-b-30">
                            <h5 class="card-header mt-0"><i class="mdi mdi-format-line-spacing"></i> Omset Tahun <?= date("Y"); ?></h5>
                            <div class="card-body">
                                <h4 class="mt-0 header-title">Diagram Omset Tahun ini</h4>
                                <p class="text-muted m-b-30 font-14 d-inline-block text-truncate w-100">Menampilkan index Digaram Omzet Tahun ini dimulai bulan Januari sampai Desember.</p>
                                <div id="stacked-bar-chart" class="ct-chart ct-golden-section text-center"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-12 col-xl-12">
                        <div class="card m-b-30">
                            <h5 class="card-header mt-0"><i class="mdi mdi-format-line-spacing"></i> Laba Bulan ini</h5>
                            <div class="card-body text-center">
                                <script>
                                    document.writeln('<h5 class="card-title">Omzet</h5><h3><strong>Rp ' + new Intl.NumberFormat().format(Math.round(varTotalOmzetPerbulan)) + '</strong></h3><br>');
                                    document.writeln('<h5 class="card-title">Aset</h5><h3><strong>Rp ' + new Intl.NumberFormat().format(Math.round(varTotalAsetPerbulan)) + '</strong></h3><br>');
                                    document.writeln('<h5 class="card-title">Profit (' + persenanProfit + '%)</h5><h3><strong>Rp ' + new Intl.NumberFormat().format(Math.round(varProfitPerbulan)) + '</strong></h3>');
                                </script>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-12 col-xl-12">
                        <div class="card m-b-30">
                            <h5 class="card-header mt-0"><i class="mdi mdi-weather-rainy"></i> Upah 20% dari Profit</h5>
                            <div class="card-body text-center">
                                <script>
                                    if (varProfitPerbulan == 0) {
                                        document.writeln("<i style='font-size: 90px;' class='mdi mdi-paw-off'></i>");
                                        document.writeln(`<h5 class="card-title"> Tidak ada data : </h5><h3><strong>NIHIL</strong></h3>`);
                                    } else {
                                        document.writeln('<h5 class="card-title">Total hasil dibulatkan : </h5><h3><strong data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Rp ' + new Intl.NumberFormat().format(varHasilUpah) + '">Rp ' + new Intl.NumberFormat().format(varUpahDibulatkan) + '</strong></h3>');
                                    }
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-6">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-xl-12">
                        <div class="card m-b-30">
                            <h5 class="card-header mt-0"><i class="mdi mdi-format-line-spacing"></i> Omset Tahun <?= date("Y"); ?></h5>
                            <div class="card-body">
                                <button class="btn btn-primary mb-4" data-toggle="modal" data-target="#tambah"><i class="mdi mdi-plus-box"></i> Tambah Data</button>
                                <table id="myTable" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Bulan</th>
                                            <th scope="col">Profit</th>
                                            <th scope="col">Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php setlocale(LC_ALL, 'id-ID', 'id_ID');
                                        $dateNow = date('Y');
                                        $dataB = "SELECT * FROM omset WHERE tahun IN ($dateNow) AND NOT id='1' ORDER BY id DESC;";
                                        $omsetBulan = $this->db->query($dataB)->result_array();
                                        ?>
                                        <?php $i = 1; ?>
                                        <?php foreach ($omsetBulan as $om) : ?>
                                            <?php
                                            $varLaba = $om['nilai_omset'];
                                            $varKembalian = $om['jumlah_kembalian'];
                                            $varKembalianSudahKali250k = $varKembalian * 250000;
                                            $varPersenProfit = $hasilPersenProfit;
                                            $varOmzet = $varLaba - $varKembalianSudahKali250k;
                                            $varProfit = $varOmzet / $hasilPersenProfit;
                                            $varAset = $varOmzet - $varProfit;
                                            $bulanProfit = $varProfit / 1000;; ?>
                                            <tr>

                                                <td scope="row">
                                                    <p class="badge badge-pill badge-success"><?= $i++; ?></p>
                                                </td>
                                                <!-- <td scope="row"><?= strftime("%Y-%m-%d", strtotime($om['tanggal_stor'])); ?></td> -->
                                                <td>
                                                    <p class="badge badge-default"><?= strftime("%B", strtotime($om['tanggal_stor'])); ?></p>
                                                </td>
                                                <td>
                                                    <p class="badge badge-default"><?php echo number_format(($bulanProfit * 1000), 0, '', ','); ?></p>
                                                </td>
                                                <td>
                                                    <div class="button-items">
                                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#lihat<?= $om['id']; ?>">
                                                            <i class="mdi mdi-eye"></i>
                                                        </button>
                                                    </div>
                                                </td>


                                                <!-- Modal Lihat-->
                                                <div class="modal fade" id="lihat<?= $om['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Detail Data</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="container-fluid">
                                                                    <div class="row">
                                                                        <div class="col-md-6 mr-auto"><strong>Laba Pendapatan</strong></div>
                                                                        <div class="col-md-6 mr-auto">: <?= "Rp. " . number_format($varLaba, 0, '', ','); ?></div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6 mr-auto"><strong>Kembalian Digunakan</strong></div>
                                                                        <div class="col-md-6 mr-auto">:

                                                                            <?php if ($varOmzet < 0) : ?>
                                                                                -
                                                                            <?php else : ?>
                                                                                <?= $varKembalian; ?> Kali
                                                                                <?php echo "(Rp. " . number_format($varKembalianSudahKali250k, 0, '', ',') . ")";
                                                                                ?>
                                                                            <?php endif; ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6 mr-auto"><strong>Omzet</strong></div>
                                                                        <div class="col-md-6 mr-auto">:
                                                                            <?php if ($varOmzet < 0) : ?>
                                                                                Rp. 0
                                                                            <?php else : ?>
                                                                                <?= "Rp. " . number_format(((round($varOmzet / 1000)) * 1000), 0, '', ','); ?>
                                                                            <?php endif; ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6 mr-auto"><strong>Aset</strong></div>
                                                                        <div class="col-md-6 mr-auto">:
                                                                            <?php if ($varOmzet < 0) : ?>
                                                                                Rp. 0
                                                                            <?php else : ?>
                                                                                <?= "Rp. " . number_format(((round($varAset))), 0, '', ','); ?>
                                                                            <?php endif; ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6 mr-auto"><strong>Profit (10%)</strong></div>
                                                                        <div class="col-md-6 mr-auto">:
                                                                            <?php if ($varOmzet < 0) : ?>
                                                                                Rp. 0
                                                                            <?php else : ?>
                                                                                <?= "Rp. " . number_format(((round($varProfit))), 0, '', ','); ?>
                                                                            <?php endif; ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6 mr-auto"><strong>Nama Penyetor</strong></div>
                                                                        <div class="col-md-6 mr-auto">: <?= $om["nama_penyetor"]; ?></div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6 mr-auto"><strong>Hari/Waktu Disetor</strong></div>
                                                                        <div class="col-md-6 mr-auto">: <?= strftime("%A", strtotime($om['tanggal_stor'])); ?>/<?= date("g:i A", $om['waktu_stor']); ?></div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6 mr-auto"><strong>Tanggal Disetor</strong></div>
                                                                        <div class="col-md-6 mr-auto">: <?= strftime("%d %B %Y", strtotime($om['tanggal_stor'])); ?></div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6 mr-auto"><strong>Keterangan</strong></div>
                                                                        <div class="col-md-6 mr-auto">: <?= $om['keterangan']; ?></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <!-- <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button> -->
                                                                <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#hapus<?= $om['id']; ?>">
                                                                    <i class="mdi mdi-delete"></i> Hapus
                                                                </button>
                                                                <button type="button" class="btn btn-outline-success" onclick="edit<?= $om['id']; ?>()">
                                                                    <i class="mdi mdi-pencil"></i> Edit
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Modal Hapus -->
                                                <div class="modal fade card-danger" id="hapus<?= $om['id']; ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-sm">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Yakin Hapus Data?</h5>
                                                                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button> -->
                                                            </div>
                                                            <div class="modal-body">
                                                                <stronge>Tanggal : <?= strftime("%d %B %Y", strtotime($om['tanggal_stor'])); ?></stronge><br>
                                                                <stronge>Omzet : <?= "Rp. " . number_format($varOmzet, 0, '', ','); ?></stronge><br>
                                                                <stronge>Profit : <?= "Rp. " . number_format($varProfit, 0, '', ','); ?></stronge>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger" onclick="hapus<?= $om['id']; ?>()"><i class="mdi mdi-check"></i></button>
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="mdi mdi-close"></i></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <script>
                                                    function hapus<?= $om['id']; ?>() {
                                                        window.location = "<?= base_url('OmsetDua/delete/') . $om['id']; ?>";
                                                    }

                                                    function edit<?= $om['id']; ?>() {
                                                        window.location = "<?= base_url('OmsetDua/edit/') . $om['id']; ?>";
                                                    }
                                                </script>
                                            <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-12 col-xl-12">
                        <div class="card m-b-30">
                            <h5 class="card-header mt-0"><i class="mdi mdi-format-line-spacing"></i> Tagihan Tahun <?= date("Y"); ?></h5>
                            <div class="card-body">
                            <button class="btn btn-primary mb-4" data-toggle="modal" data-target="#tagihan"><i class="mdi mdi-plus-box"></i> Tambah Data Tagihan</button>
                            <button class="btn btn-primary mb-4" data-toggle="modal" data-target="#aset"><i class="mdi mdi-plus-box"></i> Aset Sekarang</button>
                                <table id="myAset" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Tagihan</th>
                                            <th scope="col">Harga</th>
                                            <th scope="col">Tanggal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($tagihan as $t) : ?>
                                            <tr>
                                                <th scope="row"><?= $i++; ?></th>
                                                <td><?= $t['dari_tagihan']; ?></td>
                                                <td><?= number_format($t['total_tagihan']); ?></td>
                                                <td><?= $t['tanggal_tagihan']; ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
    <!-- Modal tambah -->
    <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('OmsetDua/data'); ?>" method="post">
                        <div class="form-group row">
                            <label for="nilai_omset" class="col-sm-4 col-form-label"><strong>Laba Pendapatan</strong></label>
                            <div class="col-sm-8">
                                <input type="number" min="0" id="nilai_omset" name="nilai_omset" placeholder=". . . " required class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jumlah_kembalian" class="col-sm-4 col-form-label"><strong>Jumlah Kembalian</strong></label>
                            <div class="col-sm-8">
                                <input type="number" min="0" id="jumlah_kembalian" name="jumlah_kembalian" placeholder=". . . " required class="form-control">
                            </div>
                        </div>
                        <input name="nama_penyetor" type="hidden" value="<?= $user["name"]; ?>">
                        <div class="form-group row mt-5">
                            <div class="col-sm-6">
                                <div id="jahh">
                                    <button type="submit" id="jah" onclick="oh()" class="btn btn-block btn-primary mt-2" class="btn btn-primary mt-2"><i class='mdi mdi-content-save'></i> Simpan</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <!-- tambah tagihan -->
    <div class="modal fade" id="tagihan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('OmsetDua/tagihan'); ?>" method="post">
                        <div class="form-group row">
                            <label for="dari_tagihan" class="col-sm-4 col-form-label"><strong>Tagihan</strong></label>
                            <div class="col-sm-8">
                                <input type="text" min="0" id="dari_tagihan" name="dari_tagihan" placeholder=". . . " required class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="total_tagihan" class="col-sm-4 col-form-label"><strong>Nilai</strong></label>
                            <div class="col-sm-8">
                                <input type="number" min="0" id="total_tagihan" name="total_tagihan" placeholder=". . . " required class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tanggal_tagihan" class="col-sm-4 col-form-label"><strong>Tanggal</strong></label>
                            <div class="col-sm-8">
                                <input type="date" id="tanggal_tagihan" value="<?=date("Y-m-d");?>" name="tanggal_tagihan" placeholder=". . . " required class="form-control">
                            </div>
                        </div>
                        <div class="form-group row mt-5">
                            <div class="col-sm-6">
                                <div id="jahh">
                                    <button type="submit" id="jah" onclick="oh()" class="btn btn-block btn-primary mt-2" class="btn btn-primary mt-2"><i class='mdi mdi-content-save'></i> Simpan</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- tambah asset -->
    <div class="modal fade" id="aset" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('OmsetDua/aset'); ?>" method="post">
                    <div class="form-group row">
                            <label for="aset_sekarang" class="col-sm-4 col-form-label"><strong>Aset Sekarang</strong></label>
                            <div class="col-sm-8">
                                <input type="number" required disabled min="0" id="aset_sekarang" name="aset_sekarang" value="" placeholder=". . . "  class="form-control">
                            </div>
                        </div>
                        <script>
                            if(<?=date('d');?> != 01){
                                document.getElementById('aset_sekarang').setAttribute("disabled", true);
                            } else {
                                document.getElementById('aset_sekarang').disabled = false;
                            }
                        </script>
                        <div class="form-group row mt-5">
                            <div class="col-sm-6">
                                <div id="jahh">
                                    <button type="submit" id="jah" onclick="oh()" class="btn btn-block btn-primary mt-2" class="btn btn-primary mt-2"><i class='mdi mdi-content-save'></i> Simpan</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- //todo total kembalian bulan 1 -->
    <?php foreach ($kemjan as $varTotalKembalianbulan1) {
        $varHasilKembalianSudahDikalian25kBulan1 = $varTotalKembalianbulan1 * 250000;
    } ?>


    <!-- //todo total kembalian bulan 2 -->
    <?php foreach ($kemfeb as $varTotalKembalianbulan2) {
        $varHasilKembalianSudahDikalian25kBulan2 = $varTotalKembalianbulan2 * 250000;
    } ?>


    <!-- //todo total kembalian bulan 3 -->
    <?php foreach ($kemmar as $varTotalKembalianbulan3) {
        $varHasilKembalianSudahDikalian25kBulan3 = $varTotalKembalianbulan3 * 250000;
    } ?>


    <!-- //todo total kembalian bulan 4 -->
    <?php foreach ($kemapr as $varTotalKembalianbulan4) {
        $varHasilKembalianSudahDikalian25kBulan4 = $varTotalKembalianbulan4 * 250000;
    } ?>


    <!-- //todo total kembalian bulan 5 -->
    <?php foreach ($kemmei as $varTotalKembalianbulan5) {
        $varHasilKembalianSudahDikalian25kBulan5 = $varTotalKembalianbulan5 * 250000;
    } ?>


    <!-- //todo total kembalian bulan 6 -->
    <?php foreach ($kemjun as $varTotalKembalianbulan6) {
        $varHasilKembalianSudahDikalian25kBulan6 = $varTotalKembalianbulan6 * 250000;
    } ?>


    <!-- //todo total kembalian bulan 7 -->
    <?php foreach ($kemjul as $varTotalKembalianbulan7) {
        $varHasilKembalianSudahDikalian25kBulan7 = $varTotalKembalianbulan7 * 250000;
    } ?>


    <!-- //todo total kembalian bulan 8 -->
    <?php foreach ($kemagus as $varTotalKembalianbulan8) {
        $varHasilKembalianSudahDikalian25kBulan8 = $varTotalKembalianbulan8 * 250000;
    } ?>


    <!-- //todo total kembalian bulan 9 -->
    <?php foreach ($kemsep as $varTotalKembalianbulan9) {
        $varHasilKembalianSudahDikalian25kBulan9 = $varTotalKembalianbulan9 * 250000;
    } ?>


    <!-- //todo total kembalian bulan 10 -->
    <?php foreach ($kemokt as $varTotalKembalianbulan10) {
        $varHasilKembalianSudahDikalian25kBulan10 = $varTotalKembalianbulan10 * 250000;
    } ?>


    <!-- //todo total kembalian bulan 11 -->
    <?php foreach ($kemnop as $varTotalKembalianbulan11) {
        $varHasilKembalianSudahDikalian25kBulan11 = $varTotalKembalianbulan11 * 250000;
    } ?>


    <!-- //todo total kembalian bulan 12 -->
    <?php foreach ($kemdes as $varTotalKembalianbulan12) {
        $varHasilKembalianSudahDikalian25kBulan12 = $varTotalKembalianbulan12 * 250000;
    } ?>



    <script src="<?= base_url('assets/'); ?>plugins/chartist/js/chartist.min.js"></script>
    <script src="<?= base_url('assets/'); ?>plugins/chartist/js/chartist-plugin-tooltip.min.js"></script>
    <script>
        // todo bulan januari
        <?php foreach ($jan as $varTotalLabaBulan1) : ?>
            <?php $varOmzetBulan1 = $varTotalLabaBulan1 - $varHasilKembalianSudahDikalian25kBulan1; ?>
            let bln1 = <?= round($varOmzetBulan1); ?>
        <?php endforeach; ?>

        // todo bulan febuari
        <?php foreach ($feb as $varTotalLabaBulan2) : ?>
            <?php $varOmzetBulan2 = $varTotalLabaBulan2 - $varHasilKembalianSudahDikalian25kBulan2; ?>
            let bln2 = <?= round($varOmzetBulan2); ?>
        <?php endforeach; ?>

        // todo bulan maret
        <?php foreach ($mar as $varTotalLabaBulan3) : ?>
            <?php $varOmzetBulan3 = $varTotalLabaBulan3 - $varHasilKembalianSudahDikalian25kBulan3; ?>
            let bln3 = <?= round($varOmzetBulan3); ?>
        <?php endforeach; ?>

        // todo bulan april
        <?php foreach ($apr as $varTotalLabaBulan4) : ?>
            <?php $varOmzetBulan4 = $varTotalLabaBulan4 - $varHasilKembalianSudahDikalian25kBulan4; ?>
            let bln4 = <?= round($varOmzetBulan4); ?>
        <?php endforeach; ?>

        // todo bulan mei
        <?php foreach ($mei as $varTotalLabaBulan5) : ?>
            <?php $varOmzetBulan5 = $varTotalLabaBulan5 - $varHasilKembalianSudahDikalian25kBulan5; ?>
            let bln5 = <?= round($varOmzetBulan5); ?>
        <?php endforeach; ?>

        // todo bulan juni
        <?php foreach ($jun as $varTotalLabaBulan6) : ?>
            <?php $varOmzetBulan6 = $varTotalLabaBulan6 - $varHasilKembalianSudahDikalian25kBulan6; ?>
            let bln6 = <?= round($varOmzetBulan6); ?>
        <?php endforeach; ?>

        // todo bulan juli
        <?php foreach ($jul as $varTotalLabaBulan7) : ?>
            <?php $varOmzetBulan7 = $varTotalLabaBulan7 - $varHasilKembalianSudahDikalian25kBulan7; ?>
            let bln7 = <?= round($varOmzetBulan7); ?>
        <?php endforeach; ?>

        // todo bulan agustus
        <?php foreach ($agus as $varTotalLabaBulan8) : ?>
            <?php $varOmzetBulan8 = $varTotalLabaBulan8 - $varHasilKembalianSudahDikalian25kBulan8; ?>
            let bln8 = <?= round($varOmzetBulan8); ?>
        <?php endforeach; ?>

        // todo bulan september
        <?php foreach ($sep as $varTotalLabaBulan9) : ?>
            <?php $varOmzetBulan9 = $varTotalLabaBulan9 - $varHasilKembalianSudahDikalian25kBulan9; ?>
            let bln9 = <?= round($varOmzetBulan9); ?>
        <?php endforeach; ?>

        // todo bulan oktober
        <?php foreach ($okt as $varTotalLabaBulan10) : ?>
            <?php $varOmzetBulan10 = $varTotalLabaBulan10 - $varHasilKembalianSudahDikalian25kBulan10; ?>
            let bln10 = <?= round($varOmzetBulan10); ?>
        <?php endforeach; ?>

        // todo bulan november
        <?php foreach ($nop as $varTotalLabaBulan11) : ?>
            <?php $varOmzetBulan11 = $varTotalLabaBulan11 - $varHasilKembalianSudahDikalian25kBulan11; ?>
            let bln11 = <?= round($varOmzetBulan11); ?>
        <?php endforeach; ?>

        // todo bulan desember
        <?php foreach ($des as $varTotalLabaBulan12) : ?>
            <?php $varOmzetBulan12 = $varTotalLabaBulan12 - $varHasilKembalianSudahDikalian25kBulan12; ?>
            let bln12 = <?= round($varOmzetBulan12); ?>
        <?php endforeach; ?>
        //Stacked bar chart

        new Chartist.Bar('#stacked-bar-chart', {
            labels: ['jan', 'feb', 'mar', 'apr', 'mei', 'jun', 'jul', 'agu', 'sep', 'okt', 'nop', 'des'],
            series: [
                [bln1, bln2, bln3, bln4, bln5, bln6, bln7, bln8, bln9, bln10, bln11, bln12]
            ],

        }, {
            stackBars: true,
            axisY: {
                labelInterpolationFnc: function(value) {
                    return (value / 1000000) + 'jt';
                }
            },
            plugins: [
                Chartist.plugins.tooltip()
            ]
        }).on('draw', function(data) {
            if (data.type === 'bar') {
                data.element.attr({
                    style: 'stroke-width: 19px'
                });
            }
        });
    </script>