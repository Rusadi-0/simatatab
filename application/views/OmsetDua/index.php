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
            <div class="col-md-12 col-lg-12 col-xl-12">
                <div class="card m-b-30">
                    <h5 class="card-header mt-0"><i class="mdi mdi-format-line-spacing"></i> Tahun ini (<?= date("Y"); ?>)</h5>
                    <div class="card-body">
                        <h4 class="mt-0 header-title">Bar Chart</h4>
                        <p class="text-muted m-b-30 font-14 d-inline-block text-truncate w-100">Menampilkan data Laba Bersih dari bulan Januari sampai Desember pada tahun ini (<?= date("Y"); ?>).</p>

                        <canvas id="bar" height="300"></canvas>

                    </div>
                </div>
            </div>
                                <div class="col-lg-6">
                        <div class="card m-b-30">
                            <div class="card-body">

                                <h4 class="mt-0 header-title">Stacked bar chart</h4>
                                <p class="text-muted m-b-30 font-14 d-inline-block text-truncate w-100">You can also set your bar chart to
                                    stack the series bars on top of each other easily by using the stackBars
                                    property in your configuration.</p>

                                <div id="stacked-bar-chart" class="ct-chart ct-golden-section"></div>
                            </div>
                        </div>
                    </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
<!-- Chart JS -->
<script src="<?= base_url('assets/'); ?>plugins/chart.js/chart.min.js"></script>


<script>
    ! function($) {
        "use strict";

        var ChartJs = function() {};

        ChartJs.prototype.respChart = function(selector, type, data, options) {
                // get selector by context
                var ctx = selector.get(0).getContext("2d");
                // pointing parent container to make chart js inherit its width
                var container = $(selector).parent();

                // enable resizing matter
                $(window).resize(generateChart);

                // this function produce the responsive Chart JS
                function generateChart() {
                    // make chart width fit with its container
                    var ww = selector.attr('width', $(container).width());
                    switch (type) {
                        case 'Bar':
                            new Chart(ctx, {
                                type: 'bar',
                                data: data,
                                options: options
                            });
                            break;
                    }
                    // Initiate new chart or Redraw

                };
                // run function - render chart at first load
                generateChart();
            },
            //init
            ChartJs.prototype.init = function() {
                //barchart
                <?php $persen = 9.0909090909090909090901;?>
                var barChart = {
                    labels: ["Januari", "Febuari", "Maret", "April", "Mai", "Juni", "Juli", "Agustus", "September", "Oktober", "Nopember", "Desember"],
                    datasets: [{
                        label: "Tahun <?= date('Y'); ?>",
                        backgroundColor: "#5b6be8",
                        borderColor: "#5b6be8",
                        borderWidth: 1,
                        hoverBackgroundColor: "#5b6be8",
                        hoverBorderColor: "#5b6be8",
                        <?php foreach ($kemjan as $k1) {
                            $t1 = $k1 * 250000;
                        } ?>
                        <?php foreach ($kemfeb as $k2) {
                            $t2 = $k2 * 250000;
                        } ?>
                        <?php foreach ($kemmar as $k3) {
                            $t3 = $k3 * 250000;
                        } ?>
                        <?php foreach ($kemapr as $k4) {
                            $t4 = $k4 * 250000;
                        } ?>
                        <?php foreach ($kemmei as $k5) {
                            $t5 = $k5 * 250000;
                        } ?>
                        <?php foreach ($kemjun as $k6) {
                            $t6 = $k6 * 250000;
                        } ?>
                        <?php foreach ($kemjul as $k7) {
                            $t7 = $k7 * 250000;
                        } ?>
                        <?php foreach ($kemagus as $k8) {
                            $t8 = $k8 * 250000;
                        } ?>
                        <?php foreach ($kemsep as $k9) {
                            $t9 = $k9 * 250000;
                        } ?>
                        <?php foreach ($kemokt as $k10) {
                            $t10 = $k10 * 250000;
                        } ?>
                        <?php foreach ($kemnop as $k11) {
                            $t11 = $k11 * 250000;
                        } ?>
                        <?php foreach ($kemdes as $k12) {
                            $t12 = $k12 * 250000;
                        } ?>
                        data: [<?php foreach ($jan as $b1) {
                                $oo1 = (($b1 - $t1) * $persen / 100);
                                echo round($oo1);
                                } ?>,
                            <?php foreach ($feb as $b2) {
                                $oo2 = (($b2 - $t2) * $persen / 100);
                                echo round($oo2);
                            } ?>,
                            <?php foreach ($mar as $b3) {
                                $oo3 = (($b3 - $t3) * $persen / 100);
                                echo round($oo3);
                            } ?>,
                            <?php foreach ($apr as $b4) {
                                $oo4 = (($b4 - $t4) * $persen / 100);
                                echo round($oo4);
                            } ?>,
                            <?php foreach ($mei as $b5) {
                                $oo5 = (($b5 - $t5) * $persen / 100);
                                echo round($oo5);
                            } ?>,
                            <?php foreach ($jun as $b6) {
                                $oo6 = (($b6 - $t6) * $persen / 100);
                                echo round($oo6);
                            } ?>,
                            <?php foreach ($jul as $b7) {
                                $oo7 = (($b7 - $t7) * $persen / 100);
                                echo round($oo7);
                            } ?>,
                            <?php foreach ($agus as $b8) {
                                $oo8 = (($b8 - $t8) * $persen / 100);
                                echo round($oo8);
                            } ?>,
                            <?php foreach ($sep as $b9) {
                                $oo9 = (($b9 - $t9) * $persen / 100);
                                echo round($oo9);
                            } ?>,
                            <?php foreach ($okt as $b10) {
                                $oo10 = (($b10 - $t10) * $persen / 100);
                                echo round($oo10);
                            } ?>,
                            <?php foreach ($nop as $b11) {
                                $oo11 = (($b11 - $t11) * $persen / 100);
                                echo round($oo11);
                            } ?>,
                            <?php foreach ($des as $b12) {
                                $oo12 = (($b12 - $t12) * $persen / 100);
                                echo round($oo12);
                            } ?>,
                        ]
                    }]
                };
                this.respChart($("#bar"), 'Bar', barChart);
            },
            $.ChartJs = new ChartJs, $.ChartJs.Constructor = ChartJs

    }(window.jQuery),

    //initializing
    function($) {
        "use strict";
        $.ChartJs.init()
    }(window.jQuery);
</script>