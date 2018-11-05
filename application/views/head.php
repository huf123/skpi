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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>

    <!-- Bootstrap Select -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">

    <!-- Waves Effect Css -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/node-waves/0.7.6/waves.min.css" rel="stylesheet"/>

    <!-- Animation Css -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css" rel="stylesheet"/>

    <!-- JQuery DataTable Css -->
    <link href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.css" rel="stylesheet"/>

    <!-- JQuery DatePicker Css -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-datetimepicker/2.5.0/css/bootstrap-material-datetimepicker.min.css" rel="stylesheet"/>

    <!-- Bootstrap star rating by Krajee -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.3/css/star-rating.min.css">

    <!-- Custom Css -->
    <link href="<?php echo base_url() ?>assets/css/style.min.css" rel="stylesheet"/>

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="<?php echo base_url() ?>assets/css/theme-blue.min.css" rel="stylesheet"/>

    <!-- JQuery Core js -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

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
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="true">
                            <?php echo $this->session->userdata('fullname');?>
                            <i class="material-icons">keyboard_arrow_down</i>
                        </a>
                    </li>
                </ul>           
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" style='width:250px;' class="sidebar">
            <!-- User Info --><div class="user-info" style="height: 65px"></div><!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MENU</li>
                    <li>
                        <a href="<?php echo base_url('dashboard') ?>" >
                            <i class="material-icons">dashboard</i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('dashboard/survey') ?>">
                            <i class="material-icons">person</i>
                            <span>Profil</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('dashboard/category') ?>">
                            <i class="material-icons">work</i>
                            <span>Kegiatan</span>
                        </a> 
                    </li>                    
                    <li>
                        <a href="<?php echo base_url('dashboard/poll') ?>">
                            <i class="material-icons">assignment</i>
                            <span>Transkrip</span>
                        </a> 
                    </li>
                    <?php if ($this->session->userdata('role')==1){?>
                        <li class="header">SETTINGS</li>
                        <li>
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
    <section class="content" style='margin-left:260px;'>
    <div class="container-fluid">
        <div class="block-header">
            <ol class="breadcrumb breadcrumb-col-blue" style="padding-left: 0">
                <li><a href="javascript:void(0);"><i class="material-icons">dashboard</i> Dashboard</a></li>
                <li class="active"><i class="material-icons"><?php echo $icon ?></i> <?php echo $title ?></li>
            </ol>
        </div>