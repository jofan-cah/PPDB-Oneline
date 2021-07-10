<?php

$db = \Config\Database::connect();
$setting = $db->table('tbl_setting')
    ->where('id', '1')
    ->get()->getRowArray();

$ta = $db->table('tbl_ta')
    ->where('status', '1')
    ->get()->getRowArray();

?>



<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title; ?> | <?= $subtitle; ?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?= base_url() ?>/template/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>/template/dist/css/adminlte.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="<?= base_url() ?>/template/plugins/daterangepicker/daterangepicker.css">
    <!-- bootstrap color picker -->
    <script src="<?= base_url() ?>/template/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="<?= base_url() ?>/template/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Bootstrap Switch -->
    <script src="<?= base_url() ?>/template/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
    <!-- BS-Stepper -->
    <script src="<?= base_url() ?>/template/plugins/bs-stepper/js/bs-stepper.min.js"></script>
    <!-- dropzonejs -->
    <script src="<?= base_url() ?>/template/plugins/dropzone/min/dropzone.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url() ?>/template/dist/js/adminlte.min.js"></script>



    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="<?= base_url() ?>/template/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="<?= base_url() ?>/template/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="<?= base_url() ?>/template/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?= base_url() ?>/template/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/template/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="<?= base_url() ?>/template/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
    <!-- BS Stepper -->
    <link rel="stylesheet" href="<?= base_url() ?>/template/plugins/bs-stepper/css/bs-stepper.min.css">


</head>

<body class="hold-transition layout-top-nav">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand-md navbar-light navbar-primary fixed-top">
            <div class="container">
                <a href="<?= base_url(); ?>" class="navbar-brand">
                    <img src="<?= base_url() ?>/img/logo/<?= $setting['logo']; ?>" alt="AdminLTE Logo" width="50px" height="700px" class="brand-image  elevation-3" style="opacity: .8">
                    <span class="brand-text font-weight-light">PPDB Online <?= $setting['nama_sekolah'] ?></span>
                </a>

                <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse order-3" id="navbarCollapse">
                    <!-- Left navbar links -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="<?= base_url() ?>" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('petunjuk') ?>" class="nav-link">Alur </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('contact') ?>" class="nav-link">About</a>
                        </li>

                    </ul>

                    <!-- SEARCH FORM -->
                    <form class="form-inline ml-0 ml-md-3">
                        <div class="input-group input-group-sm">
                            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                            <div class="input-group-append">
                                <button class="btn btn-navbar" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Right navbar links -->
                <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                    <!-- Messages Dropdown Menu -->
                    <li class="nav-item dropdown">


                    </li>
                    <!-- Notifications Dropdown Menu -->
                    <li class="nav-item dropdown">

                    </li>
                    <?php if (session()->get('nisn') == '') { ?>
                        <li class="nav-item">

                            <a class="nav-link" href="<?= base_url('Auth/loginSiswa'); ?>" role="button">
                                <i class="fas fa-user"></i> Masuk
                            </a>
                        </li>
                    <?php } else { ?>
                        <li class="nav-item dropdown">
                            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fas fa-user"></i>
                                <?= session()->get('nama_lengkap') ?>
                            </a>
                            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                                <li><a href="<?= base_url('Siswa/') ?>" class="dropdown-item">Biodata</a></li>
                                <li><a href="<?= base_url('Auth/logoutSiswa') ?>" class="dropdown-item"><i class="fas fa-sign-out-alt"></i> Keluar</a></li>
                                <!-- End Level two -->
                            </ul>
                        </li>
                    <?php } ?>

                </ul>
            </div>
        </nav>
        <!-- /.navbar -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header mt-5">
                <div class="container">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <?php
                            if (!isset($ta['status']) != 2) { ?>
                                <h1 class="label"><b>Pendaftaran Tahun Ajaran <?= $ta['ta'] ?></b></h1>
                            <?php } else { ?>
                                <h1 class="label text-danger"><b>Pendaftaran Sudah Di tutup</b></h1>
                            <?php }; ?>

                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <div>
            </div>
            <!-- AkirConten header -->
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Main content -->
                <div class="content">
                    <div class="container">

                        <?= $this->renderSection('content') ?>

                        <!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->

            <!-- Main Footer -->
            <footer class="main-footer">
                <!-- To the right -->
                <div class="float-right d-none d-sm-inline">
                    Anything you want
                </div>
                <!-- Default to the left -->
                <strong>Copyright &copy; 2021-2022 <a href="<?= $setting['web']; ?>"><?= $setting['nama_sekolah'] ?></a>.</strong> All rights reserved.
            </footer>
        </div>
        <!-- ./wrapper -->

        <!-- REQUIRED SCRIPTS -->


        <!-- jQuery -->
        <script src="<?= base_url() ?>/template/plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="<?= base_url() ?>/template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- Select2 -->
        <script src="<?= base_url() ?>/template/plugins/select2/js/select2.full.min.js"></script>
        <!-- Bootstrap4 Duallistbox -->
        <script src="<?= base_url() ?>/template/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
        <!-- InputMask -->
        <script src="<?= base_url() ?>/template/plugins/moment/moment.min.js"></script>
        <script src="<?= base_url() ?>/template/plugins/inputmask/jquery.inputmask.min.js"></script>
        <!-- date-range-picker -->
        <script src="<?= base_url() ?>/template/plugins/daterangepicker/daterangepicker.js"></script>
        <!-- bootstrap color picker -->
        <script src="<?= base_url() ?>/template/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
        <!-- Tempusdominus Bootstrap 4 -->
        <script src="<?= base_url() ?>/template/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
        <!-- Bootstrap Switch -->
        <script src="<?= base_url() ?>/template/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
        <!-- BS-Stepper -->
        <script src="<?= base_url() ?>/template/plugins/bs-stepper/js/bs-stepper.min.js"></script>
        <!-- dropzonejs -->
        <script src="<?= base_url() ?>/template/plugins/dropzone/min/dropzone.min.js"></script>
        <!-- AdminLTE App -->
        <script src="<?= base_url() ?>/template/dist/js/adminlte.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="<?= base_url() ?>/template/dist/js/demo.js"></script>
        <script>
            window.setTimeout(function() {
                $('.jfn').fadeTo(500.0).slideUp(500,
                    function() {
                        $(this).remove();
                    })
            }, 3000)
        </script>
        <script>
            function bacaGambar(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#gambar_load').attr('src', e.target.result)
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
            $('#preview_gambar').change(function() {
                bacaGambar(this);
            })
        </script>
        <script>
            $(function() {
                //Initialize Select2 Elements
                $('.select2').select2()

                //Initialize Select2 Elements
                $('.select2bs4').select2({
                    theme: 'bootstrap4'
                })

                //Datemask yyyy-mm-dd
                $('#datemask').inputmask('yyyy-mm-dd', {
                    'placeholder': 'yyyy-mm-dd'
                })
                //Datemask2 yyyy-mm-dd
                $('#datemask2').inputmask('yyyy-mm-dd', {
                    'placeholder': 'yyyy-mm-dd'
                })
                //Money Euro
                $('[data-mask]').inputmask()

                //Date range picker
                $('#reservationdate').datetimepicker({
                    format: 'yyyy-MM-DD'
                });
                //Date range picker
                $('#reservation').daterangepicker()
                //Date range picker with time picker
                $('#reservationtime').daterangepicker({
                    timePicker: true,
                    timePickerIncrement: 30,
                    locale: {
                        format: 'MM/DD/YYYY hh:mm A'
                    }
                })
                //Date range as a button
                $('#daterange-btn').daterangepicker({
                        ranges: {
                            'Today': [moment(), moment()],
                            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                            'This Month': [moment().startOf('month'), moment().endOf('month')],
                            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                        },
                        startDate: moment().subtract(29, 'days'),
                        endDate: moment()
                    },
                    function(start, end) {
                        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
                    }
                )

                //Timepicker
                $('#timepicker').datetimepicker({
                    format: 'LT'
                })

                //Bootstrap Duallistbox
                $('.duallistbox').bootstrapDualListbox()

                //Colorpicker
                $('.my-colorpicker1').colorpicker()
                //color picker with addon
                $('.my-colorpicker2').colorpicker()

                $('.my-colorpicker2').on('colorpickerChange', function(event) {
                    $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
                })

                $("input[data-bootstrap-switch]").each(function() {
                    $(this).bootstrapSwitch('state', $(this).prop('checked'));
                })

            })
            // BS-Stepper Init
            document.addEventListener('DOMContentLoaded', function() {
                window.stepper = new Stepper(document.querySelector('.bs-stepper'))
            })

            // DropzoneJS Demo Code Start
            Dropzone.autoDiscover = false

            // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
            var previewNode = document.querySelector("#template")
            previewNode.id = ""
            var previewTemplate = previewNode.parentNode.innerHTML
            previewNode.parentNode.removeChild(previewNode)

            var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
                url: "/target-url", // Set the url
                thumbnailWidth: 80,
                thumbnailHeight: 80,
                parallelUploads: 20,
                previewTemplate: previewTemplate,
                autoQueue: false, // Make sure the files aren't queued until manually added
                previewsContainer: "#previews", // Define the container to display the previews
                clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
            })

            myDropzone.on("addedfile", function(file) {
                // Hookup the start button
                file.previewElement.querySelector(".start").onclick = function() {
                    myDropzone.enqueueFile(file)
                }
            })

            // Update the total progress bar
            myDropzone.on("totaluploadprogress", function(progress) {
                document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
            })

            myDropzone.on("sending", function(file) {
                // Show the total progress bar when upload starts
                document.querySelector("#total-progress").style.opacity = "1"
                // And disable the start button
                file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
            })

            // Hide the total progress bar when nothing's uploading anymore
            myDropzone.on("queuecomplete", function(progress) {
                document.querySelector("#total-progress").style.opacity = "0"
            })

            // Setup the buttons for all transfers
            // The "add files" button doesn't need to be setup because the config
            // `clickable` has already been specified.
            document.querySelector("#actions .start").onclick = function() {
                myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
            }
            document.querySelector("#actions .cancel").onclick = function() {
                myDropzone.removeAllFiles(true)
            }
            // DropzoneJS Demo Code End
        </script>
</body>

</html>