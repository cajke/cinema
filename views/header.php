<!doctype html>
<html>
<head>
    <title><?php if (isset($this->title)) echo $this->title; else{echo 'Coloseum';} ?></title>
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo URL; ?>web/images/titleLogo.ico" />
    <link rel="stylesheet" href="<?php echo URL; ?>web/css/style.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    <script src='https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=if4d11lsag4ax48pf342lmq4hza5fiv8enp2b5kc2gj8c56y'></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <script src="<?php echo URL; ?>web/js/custom.js"></script>
    <script src='https://www.google.com/recaptcha/api.js' async defer></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
<?php Session::init(); ?>

    <div id="header" class="text-center">
        <nav class="navbar navbar-inverse navbar-fixed-top">

            <div class="container">
                 <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mainNavBar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                     <a href="<?php echo URL; ?>home" class="navbar-brand"><img src="<?php echo URL; ?>web/images/logo.png" class="img-responsive" style="height: 50px;"</a>
                </div>
                <div class="collapse navbar-collapse " id="mainNavBar">
                    <ul class="nav navbar-nav">
                        <?php if (Session::get('loggedIn') == false): ?>
                            <li class="menu-center"><a href="<?php echo URL; ?>home"><i class="fas fa-home"></i> Početna</a></li>
                            <li class="menu-center"><a href="<?php echo URL; ?>aboutUs"><i class="fab fa-asymmetrik"></i> O nama</a></li>
                            <li class="menu-center"><a href="<?php echo URL; ?>projection/repertoire/<?php echo date('Y-m-d'); ?>"><i class="fas fa-list-ul"></i> Repertoar</a></li>
                        <?php endif; ?>
                        <?php if (Session::get('loggedIn') == true): ?>
                            <?php if (Session::get('role') == 'admin'): ?>
                                <li><a href="<?php echo URL; ?>user"><i class="fas fa-users"></i> Korisnici</a></li>
                                <li><a href="<?php echo URL; ?>film"><i class="fas fa-video"></i> Filmovi</a></li>
                                <li><a href="<?php echo URL; ?>reservation"><i class="fas fa-film"></i> Rezervacije</a></li>
                                <li><a href="<?php echo URL; ?>projection"><i class="fas fa-project-diagram"></i> Projekcije</a></li>
                                <li><a href="<?php echo URL; ?>dashboard"><i class="fas fa-table"></i> Podešavanja</a></li>
                                <li><a href="<?php echo URL; ?>projection/repertoire/<?php echo date('Y-m-d'); ?>"><i class="fas fa-list-ul"></i> Repertoar</a></li>
                            <?php endif; ?>
                            <?php if(Session::get('role') == 'user'): ?>
                              <!--  <li><a href="<?php echo URL; ?>projection/index/<?php echo date('Y-m-d'); ?>"><i class="fas fa-video"></i> Repertoar</a></li>-->
                                <li class="menu-center-user"><a href="<?php echo URL; ?>home"><i class="fas fa-home"></i> Početna</a></li>
                                <li class="menu-center-user"><a href="<?php echo URL; ?>reservation/index/<?php echo Session::get('userId'); ?>"><i class="fas fa-list-ul"></i> Moje rezervacije</a></li>
                                <li class="menu-center-user"><a href="<?php echo URL; ?>user/profile"><i class="fas fa-table"></i> Moj Profil</a></li>
                                <li class="menu-center-user"><a href="<?php echo URL; ?>projection/repertoire/<?php echo date('Y-m-d'); ?>"><i class="fas fa-list-ul"></i> Repertoar</a></li>
                            <?php endif; ?>
                                <li class="odjavi"><a href="<?php echo URL; ?>dashboard/logout"><i class="fas fa-sign-out-alt"></i> Odjavi se</a></li>
                        <?php else: ?>
                            <li class="dropdown navbar-right">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fas fa-door-open"></i> <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?php echo URL; ?>registration"><i class="fa fa-user-plus"></i> Registruj se</a></li>
                                    <li><a href="<?php echo URL; ?>login"><i class="fas fa-sign-in-alt"></i> Prijavi se</a></li>
                                </ul>
                            </li>
                        <?php endif; ?>
                     </ul>
                </div>
            </div>
        </nav>
    </div>
    <div id="container">
    <div class="body-content">
    