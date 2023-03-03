<?php

$ProfitPersen = 10;

?>
<script>
    // * table database omset
    let varSumLabaAll = <?php foreach ($sumLabaAll as $sn) {echo $sn;} ?>;
    let varSumKembalianAll = <?php foreach ($sumKembalianAll as $sk) {echo $sk * 250000;} ?>;
    let varSumOmsetAll = varSumLabaAll - varSumKembalianAll;
    let varProfitPersen = <?=$ProfitPersen;?>;
    let varSumProfitAll = varSumOmsetAll*varProfitPersen/100;
    let varSumAsetAll = varSumOmsetAll - varSumProfitAll;

    // * table database tagihan
    let varSumTagihan = <?php foreach ($tagih as $t) {
                            echo $t;
                        } ?>;
    let varTotalAsetSekarang = varSumAsetAll - varSumTagihan;
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
            <!-- input campas -->
            <div class="col-md-6 col-lg-6 col-xl-6">
                <div class="row">
                    <!-- start campas dan barang -->
                    <div class="col-md-12 col-lg-12 col-xl-12">
                        <div class="card m-b-30">
                            <h5 class="card-header mt-0"><i class="mdi mdi-format-line-spacing"></i> Aset Saat ini</h5>
                            <div class="card-body text-center">
                                <script>
                                    document.writeln('<h5 class="card-title">Total</h5><h1><strong>Rp ' + new Intl.NumberFormat().format(Math.round(varTotalAsetSekarang)) + '</strong></h1><br>');
                                </script>
                            </div>
                        </div>
                    </div>



                    <!-- end campas dan barang -->
                </div>
            </div>
            <!-- end input campas -->
            <!-- start daftar campas -->
            <div class="col-md-6 col-lg-6 col-xl-6">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-xl-12"> <!-- start pertama -->
                        <div class="card m-b-30">
                            <h5 class="card-header mt-0"><i class="mdi mdi-timer"></i> Input Tagihan</h5>
                            <div class="card-body">
                                <form action="<?= base_url('campas/tagihan'); ?>" method="POST">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Campas</label>
                                        <div class="col-sm-10">
                                            <select name="dari_tagihan" id="menu_id" class="form-control" required>
                                                <option value="">Pilih</option>
                                                <?php foreach ($campas as $c) : ?>
                                                    <option value="<?= $c['namaCampas']; ?>"><?= $c['namaCampas']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-date-input" class="col-sm-2 col-form-label">Tanggal</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" name="tanggal_tagihan" type="date" value="<?= date("Y-m-d"); ?>" id="example-date-input">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-date-input" class="col-sm-2 col-form-label">Tagiahan</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" min="0" name="total_tagihan" required type="number" value="0" id="example-date-input">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-date-input" class="col-sm-2 col-form-label"></label>
                                        <div class="col-sm-10">
                                            <button type="submit" class="btn btn-block btn-primary"><i class="mdi mdi-content-save"></i> Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div> <!-- end pertama -->
                </div>
            </div>
            <!-- end daftar campas -->
            <div class="col-md-12 col-lg-12 col-xl-12">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-xl-12">
                        <div class="card m-b-30">
                            <!-- <h5 class="card-header mt-0"><i class="mdi mdi-timer"></i> List Tagihan</h5> -->
                            <div class="card-body">
                                <table id="myTable" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th>Nama</th>
                                            <th>total</th>
                                            <th>tanggal</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($tagihan as $t) : ?>
                                            <tr>
                                                <td><?= $i++; ?></td>
                                                <td><?= $t["dari_tagihan"]; ?></td>
                                                <td><?= "Rp. " . number_format($t["total_tagihan"], 0, '', ','); ?></td>
                                                <td><?= $t["tanggal_tagihan"]; ?></td>
                                                <td>
                                                    <div class="button-items">
                                                        <button type="button" class="btn btn-danger" onclick="hapus<?= $t['id']; ?>()">
                                                            <i class="mdi mdi-delete"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-success" onclick="edit<?= $t['id']; ?>()">
                                                            <i class="mdi mdi-pencil"></i>
                                                        </button>
                                                    </div>
                                                    <script>
                                                        function hapus<?= $t['id']; ?>() {
                                                            let yakinD = confirm("yakin hapus?");
                                                            if (yakinD) {
                                                                window.location = "<?= base_url('campas/deleteTagihan/') . $t['id']; ?>";
                                                            };
                                                        }

                                                        function edit<?= $t['id']; ?>() {
                                                            window.location = "<?= base_url('campas/editTagihan/') . $t['id']; ?>";
                                                        }
                                                    </script>
                                                </td>
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


    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->