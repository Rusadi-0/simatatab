<?php date_default_timezone_set('Asia/Kuala_Lumpur'); ?>
<?= $this->session->flashdata('message'); ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Table Data Berkunjung</h5>
                <!-- <small class="text-muted float-end">Merged input group</small> -->
                <a target="blink" href="<?= base_url("/"); ?>BukuTamu/cetak" class="btn btn-primary"><i class='bx bxs-printer'></i> Cetak</a>
            </div>
            <div class="card-body">
                <table id="myTable" class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Nama Tamu</th>
                            <th scope="col">Status</th>
                            <th scope="col">Waktu</th>
                            <th scope="col">Ditemui</th>
                            <th scope="col">Keperluan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($tamu as $t) : ?>
                            <tr data-bs-toggle="modal" data-bs-target="#lihatFoto<?= $t['id']; ?>">
                                <td>
                                    <div class="hh"><?= $t['tamuMasuk']; ?></div>
                                    <div class="d-flex justify-content-start align-items-center">
                                        <div class="avatar-wrapper">
                                            <div class="avatar me-2">
                                                <?php if ($t['gambar'] == "tidak ada") : ?>
                                                    <img src="<?= base_url("/"); ?>img/index.jpg" alt="Avatar" class="shadow-sm rounded-circle">
                                                <?php else : ?>
                                                    <img src="<?= base_url("/"); ?>img/<?= $t['gambar']; ?>" alt="Avatar" class="shadow-sm rounded-circle">
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-column"><span class="emp_name text-truncate hadi-text-cut"><?= ucwords($t['namaTamu']); ?></span><small class="emp_post text-truncate text-muted hadi-text-cut"><?= ucwords($t['alamatTamu']); ?></small></div>
                                    </div>
                                </td>
                                <td>
                                    <?php

                                    if ($t['statusTamu'] == 0) {
                                        echo '<span class="badge bg-label-info me-1">Tamu Baru</span>';
                                    }
                                    if ($t['statusTamu'] == 1) {
                                        echo '<span class="badge bg-label-success me-1">Diterima</span>';
                                    }
                                    if ($t['statusTamu'] == 2) {
                                        echo '<span class="badge bg-label-primary me-1">Selesai</span>';
                                    }
                                    if ($t['statusTamu'] == 3) {
                                        echo '<span class="badge bg-label-danger me-1">Ditolak</span>';
                                    }

                                    ?>
                                </td>
                                <td style="width: 5cm;">
                                    <div class="col-12 my-0"><?= date("h:i", $t['tamuMasuk']); ?><small class="hhc">=</small><?= date("A", $t['tamuMasuk']); ?></div>
                                    <div class="col-12 my-0"><small class="text-light fw-semibold"><?= date_format(date_create($t['tanggalBerkunjung']), "d"); ?><small class="hhc">=</small><?= date_format(date_create($t['tanggalBerkunjung']), "M"); ?><small class="hhc">=</small><?= date_format(date_create($t['tanggalBerkunjung']), "Y"); ?></small></div>
                                </td>
                                <td>
                                    <div class="hadi-text-cut">
                                        <strong>
                                            <?php
                                            foreach ($users as $u) {
                                                if ($u['id'] == $t['ditemui']) {
                                                    echo $u['jabatan'];
                                                }
                                            }
                                            ?>
                                        </strong>
                                    </div>
                                </td>
                                <td>
                                    <div class="hadi-text-cut">
                                        <?= $t['keperluanTamu']; ?>
                                    </div>
                                </td>
                            </tr>
                            <!-- START MODAL Detail Tamu -->
                            <div class="modal fade" id="lihatFoto<?= $t['id']; ?>" aria-labelledby="modalToggleLabel" tabindex="-1" style="display: none;" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                    <div class="modal-content">
                                        <div class="card">
                                            <img src="<?php
                                                        if ($t['gambar'] == "tidak ada") {
                                                            echo base_url("/") . "img/index.jpg";
                                                        } else {
                                                            echo base_url("/img/") . $t['gambar'];
                                                        }
                                                        ?>" class="card-img-top" alt="...">
                                            <div class="card-body">
                                                <h5 class="card-title text-capitalize"><b><?= $t['namaTamu']; ?></b></h5>
                                                <p class="mb-1 text-card text-capitalize">Dari <b><?= $t['alamatTamu']; ?></b></p>
                                                <p class="mb-0">Ingin bertemu dengan :</p>
                                                <p class="mb-1"><b>
                                                        <?php
                                                        foreach ($users as $u) {
                                                            if ($u['id'] == $t['ditemui']) {
                                                                echo $u['jabatan'];
                                                            } else {
                                                                echo "";
                                                            }
                                                        }
                                                        ?>
                                                    </b>
                                                </p>
                                                <p class="mb-0 text-capitalize">Keperluan :</p>
                                                <p class="mb-0 text-capitalize mb-4"><b><?= $t['keperluanTamu']; ?></b></p>
                                                <div class="collapse" id="collapseExample">
                                                    <div class="d-grid d-sm-flex">
                                                        <a class="mt-1 mx-1 btn btn-success" href="<?= base_url('/'); ?>BukuTamu/editDataTamu/<?= $t['id']; ?>"><i class='bx bx-edit-alt'></i> <strong>Edit Tamu</strong></a>
                                                        <a class="mt-1 mx-1 btn btn-danger" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#hapus<?= $t['id']; ?>"><i class='bx bx-trash me-1'></i> <strong>Hapus Tamu</strong></a>
                                                    </div>
                                                </div>
                                                <div class="d-grid d-sm-flex">
                                                <button class="mt-2 mx-1 btn btn-primary me-1" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                                    Aksi
                                                </button>
                                                <button type="button" class="mt-2 mx-1 btn btn-secondary" data-bs-dismiss="modal"><i class='bx bx-undo me-1'></i> Kembali</button>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END MODAL Detail Tamu -->
                            <!-- START MODAL HAPUS -->
                            <div class="modal fade" id="hapus<?= $t['id']; ?>" data-bs-blackdrop="static" aria-labelledby="modalToggleLabel" tabindex="-1" style="display: none;" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalToggleLabel">Hapus Data Tamu</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-footer">
                                            <a class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#lihatFoto<?= $t['id']; ?>" data-bs-dismiss="modal" href="javascript:void(0);"><i class="bx bx-undo me-1"></i> Kembali</a>
                                            <a href="<?= base_url('/'); ?>BukuTamu/hapusDataTamu/<?= $t['id']; ?>/<?= $t['gambar']; ?>" type="button" class="btn btn-danger"><i class="bx bx-trash me-1"></i> Hapus</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END MODAL HAPUS -->
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>