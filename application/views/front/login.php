<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title><?php echo $title ?> | Survey Kepuasan ITS</title>
    <!-- Favicon-->
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/node-waves/0.7.6/waves.min.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?= base_url() ?>assets/css/style.min.css" rel="stylesheet">    

    <!-- Jquery Core Js -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

    <!-- ChartJs -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.2.1/Chart.bundle.min.js"></script>
    <style type="text/css">
        [type="radio"]:not(:checked) + label:before,[type="radio"]:checked + label:before,
        [type="radio"]:not(:checked) + label:after,[type="radio"]:checked + label:after {
            font-size: 20px;
            margin-left: 0;
        }
    </style>
</head>
<body class="login-page" style="background-color: #2196f3">
    <div class="login-box">
        <div class="logo" style="text-align: center;color: white">
            <h1>
                <i class="material-icons" style="font-size:30px">lock</i>
                <span>ESKAPEI</span>
            </h1>
        </div>
        <div class="card">
            <div class="body">
                <?= form_open(base_url('auth/logging')); ?>
                    <div class="msg">Silakan login terlebih dahulu</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="uname" placeholder="Username" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="upwd" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-8 p-t-5">
                            <input type="checkbox" name="remember" class="filled-in chk-col-pink" id="remember">
                            <label for="remember">Remember Me</label>
                        </div>
                        <div class="col-xs-4">
                            <button class="btn btn-block bg-pink waves-effect" type="submit">SIGN IN</button>
                        </div>
                    </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Core Js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/node-waves/0.7.6/waves.min.js"></script>

    <!-- Validation Plugin Js -->
    <script src="<?= base_url() ?>assets/plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="<?= base_url() ?>assets/js/admin.js"></script>
    <script src="<?= base_url() ?>assets/js/sign-in.js"></script>
</body>

</html>