<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title><?php echo $title ?> | SKPI</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    
    <!-- Bootstrap Core Css -->
    <link href="<?php echo base_url() ?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>

    <!-- Bootstrap Select -->
    <link href="<?php echo base_url() ?>assets/plugins/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?php echo base_url() ?>assets/plugins/node-waves/waves.min.css" rel="stylesheet"/>

    <!-- Animation Css -->
    <link href="<?php echo base_url() ?>assets/plugins/animate-css/animate.min.css" rel="stylesheet"/>

    <!-- JQuery DataTable Css -->
    <link href="<?php echo base_url() ?>assets/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.min.css" rel="stylesheet"/>

    <!-- JQuery DatePicker Css -->
    <link href="<?php echo base_url() ?>assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet"/>

    <!-- Custom Css -->
    <link href="<?php echo base_url() ?>assets/css/style.min.css" rel="stylesheet"/>

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="<?php echo base_url() ?>assets/css/theme-blue.min.css" rel="stylesheet"/>

    <!-- JQuery Core js -->
    <script src="<?php echo base_url() ?>assets/plugins/jquery-3.3.1.min.js"></script>

</head>

<body class="theme-blue">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-blue">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="<?php echo base_url() ?>dashboard">SKPI</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right" style="margin-top: 10px;color: white;font-weight: bold">
                    <?php echo $this->session->userdata('fullname');?><br>
                    Fakultas : Fakultas Ilmu Komputer&nbsp;
                    <a class="btn btn-primary waves-effect" href="<?php echo base_url() ?>auth/logout" style="padding:0;top:-15px">
                        <i class="material-icons" style="font-size:40px;">exit_to_app</i>
                    </a>
                </ul>           
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" style='width:180px;' class="sidebar">
            <!-- User Info --><div class="user-info" style="height: 65px"></div><!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MENU</li>
                    <li id="dashboard">
                        <a href="<?php echo base_url('dashboard') ?>" >
                            <i class="material-icons">dashboard</i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li id="profil">
                        <a href="<?php echo base_url('dashboard/profil') ?>">
                            <i class="material-icons">person</i>
                            <span>Profil</span>
                        </a>
                    </li>
                    <?php $role = $this->session->userdata('role'); if ($role==1 OR $role==2 OR $role==3){ ?>
                    <li id="laporan">
                        <a href="<?php echo base_url('dashboard/laporan') ?>">
                            <i class="material-icons">description</i>
                            <span>Laporan</span>
                        </a> 
                    </li>                        
                    <?php } elseif ($role==4) { ?>                        
                    <li id="kegiatan">
                        <a href="<?php echo base_url('dashboard/kegiatan') ?>">
                            <i class="material-icons">work</i>
                            <span>Kegiatan</span>
                        </a> 
                    </li>                  
                    <li id="transkrip">
                        <a href="<?php echo base_url('dashboard/transkrip') ?>">
                            <i class="material-icons">assignment</i>
                            <span>Transkrip</span>
                        </a> 
                    </li>
                    <?php } if ($role==1){?>
                        <li class="header">SETTINGS</li>
                        <li id="user">
                            <a href="<?php echo base_url('dashboard/user') ?>" >
                                <i class="material-icons">supervisor_account</i>
                                <span>User & Privilege</span>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2017 - 2018 <a href="javascript:void(0);">SKPI</a>.
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
    </section>
    <section class="content" style='margin-left:190px;'>
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    <ol class="breadcrumb breadcrumb-col-blue" style="padding-left: 0">
                        <li><a href="javascript:void(0);"><i class="material-icons">dashboard</i> Dashboard</a></li>
                        <?php if (isset($bread)){ ?>
                        <li><i class="material-icons"><?php echo $icon ?></i> <?php echo $bread ?></li>
                        <?php } if (isset($subbread)){?>
                        <li class="active"><i class="material-icons"><?php echo $subicon ?></i> <?php echo $subbread ?></li>
                        <?php } ?>
                    </ol>
                </h2>
                <?php if (!$this->session->userdata('mhs_id') AND $this->session->userdata('role')==4){ ?>
                <div class="alert alert-danger">
                    <strong>Perhatian!</strong> Sebelum mengisi kegiatan, lengkapi profil terlebih dahulu di <a href="<?php echo base_url('dashboard/profil') ?>" style="color: #fff;font-weight: bold">Halaman Profil</a>.
                </div>
                <?php } ?>
            </div>