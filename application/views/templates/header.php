<?php date_default_timezone_set('Asia/Kuala_Lumpur'); ?>
<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="<?= base_url('assets/'); ?>" data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>SIMaTa | <?php

                  if ($sub == "") {
                    echo $title;
                  } else {
                    echo $sub;
                  }



                  ?></title>

  <meta name="description" content="" />

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="<?= base_url('assets/'); ?>img/favicon/favicon.ico" />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

  <!-- Icons. Uncomment required icon fonts -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>vendor/fonts/boxicons.css" />

  <!-- animation.io -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/animate.css" />

  <!-- Core CSS -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>vendor/css/core.css" class="template-customizer-core-css" />
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>vendor/css/theme-default.css" class="template-customizer-theme-css" />
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/demo.css" />

  <!-- Vendors CSS -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

  <link rel="stylesheet" href="<?= base_url('assets/'); ?>vendor/libs/apex-charts/apex-charts.css" />

  <!-- Page CSS -->

  <!-- Helpers -->

  <script src="<?= base_url('assets/'); ?>vendor/libs/jquery/jquery.js"></script>
  <script src="<?= base_url('assets/'); ?>vendor/js/helpers.js"></script>

  <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
  <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
  <script src="<?= base_url('assets/'); ?>js/config.js"></script>

  <link rel="stylesheet" type="text/css" href="<?= base_url("/"); ?>assets/dataTables/datatables.min.css" />
   
  <script type="text/javascript" src="<?= base_url("/"); ?>assets/dataTables/datatables.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js"></script>
    
  <script>
    $(document).ready(function() {
      var table = $("#myTable").DataTable({
        "lengthChange": true,
        "lengthMenu": [
          [5, 10, 25, 50, -1],
          [5, 10, 25, 50, "All"]
        ],
        "pageLength": 5,
        "language": {
          "url": "<?= base_url('/'); ?>assets/id.json"
        },
        fixedHeader: false,
        scrollY: false,
        scrollX: false,
        scrollCollapse: false,
        fixedColumns: {
          left: 0,
          right: 0
        },
        order: [
          [0, "decs"]
        ],
        pagingType: "numbers",
      });
    });
  </script>
  <style>
    .hh {
      position: absolute;
      opacity: 0;
    }
    .hhc {
      opacity: 0;
    }
  </style>
</head>

<body>
  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">