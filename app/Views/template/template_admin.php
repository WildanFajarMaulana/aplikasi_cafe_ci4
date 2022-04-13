<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard | MauCafe</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
    <!-- IonIcons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <script src="/js/font-awesome.js"></script>
    <!-- Theme style -->
    <link rel="stylesheet" href="/css/adminlte.min.css">
    <style>
    .pfmodal {
        border-radius: 50%;
        width: 50%;
        height: 50%;
        margin-left: 115px;
        margin-bottom: 15px;
    }

    .txtname {
        margin-left: 120px;
        margin-bottom: 30px;
    }

    .form-group p {
        color: #78797a;
        border-bottom: 1px solid #cacaca;
        padding-bottom: 12px;
    }

    .form-group i {
        margin-left: 25px;
        padding-right: 10px;
        color: #78797a;
    }

    .pfmenu {
        max-width: 120px;
        border-radius: 0% !important;
    }

    .menu {
        display: flex;
        flex-direction: row;
    }

    .text-menu {
        margin-left: 10px;
    }

    .text-menu .banyak-menu {
        color: #78797a;
        margin-bottom: 0;
        margin-top: 45px;
    }

    .text-menu .harga-menu {
        color: #fc6a31;
        margin-bottom: 0;
    }
    </style>
</head>

<body class="hold-transition sidebar-mini">

    <div class="wrapper">
        <?= $this->include('component/navBar') ?>
        <?= $this->include('component/sideBarAdmin') ?>
        <?= $this->renderSection('content') ?>
    </div>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>

    <!-- jQuery -->
    <script src="/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE -->
    <script src="/js/adminlte.js"></script>

    <!-- OPTIONAL SCRIPTS -->
    <!-- AdminLTE for demo purposes -->
    <script src="/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="/js/pages/dashboard3.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <?= $this->renderSection('script') ?>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    -->
</body>

</html>