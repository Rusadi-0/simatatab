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
                    <table id="myUse" class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th>User</th>
                                    <th>Aktivitas</th>
                                    <th>Waktu</th>
                                    <th>keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($log as $l) : ?>
                                <tr>
                                    <td><?= $l["id"];?></td>
                                    <td><?= $l["user_log"];?></td>
                                    <td><?= $l["aktivitas_log"];?></td>
                                    <td><?= $l["waktu_log"];?></td>
                                    <td><?= $l["ket_log"];?></td>
                                </tr>
                                <?php endforeach;?>
                            </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>



    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->