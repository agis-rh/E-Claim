<?php
/*
 * Web Application
 * Creator by Agis Laksamana
 * Copyright Â© 2015; Licensed
 * Software Engineer
 */

date_default_timezone_set('Asia/jakarta');
// masukan file functions
require_once("../system/functions.php");
// masukan file timeout
require_once("timeout.php");
// membuat fungsi baru
$query = new Functions();
//membuat koneksi
$db = new Connection();


ob_start();
session_start();
    
if ($_SESSION[login] == 1) {
    if (!cek_login()) {
        $_SESSION[login] = 0;
    }
}
if ($_SESSION[login] == 0) {
    header('location: ../home.html');
} else {
    if (empty($_SESSION['id_user']) AND empty($_SESSION['level_user']) AND $_SESSION['login'] == 0) {
        require 'index.php';
    } else {

        require_once("core/header.php");
        $profil = $query->get_karyawan($_SESSION['id_karyawan']);
        ?>




        <body>
            <div class="navbar navbar-top navbar-inverse">
                <div class="navbar-inner">
                    <div class="container-fluid">

                        <a class="brand" href="?page=dashboard">e-claim</a>

                        <!-- the new toggle buttons -->

                        <ul class="nav pull-right">

                            <li class="toggle-primary-sidebar hidden-desktop" data-toggle="collapse" data-target=".nav-collapse-primary"><button type="button" class="btn btn-navbar"><i class="icon-th-list"></i></button></li>

                            <li class="hidden-desktop" data-toggle="collapse" data-target=".nav-collapse-top"><button type="button" class="btn btn-navbar"><i class="icon-align-justify"></i></button></li>

                        </ul>




                        <div class="nav-collapse nav-collapse-top collapse">

                            <ul class="nav full pull-right">
                                <li class="dropdown user-avatar">

                                    <!-- the dropdown has a custom user-avatar class, this is the small avatar with the badge -->

                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <span>
                                        <?php
                                        if($profil[foto]=='' OR $_SESSION['id_karyawan']=='admin'){
                                                 echo "<img class='menu-avatar' src='../assets/img/user.png' /> <span>$profil[nama_karyawan]<i class='icon-caret-down'></i></span>";
                                            }else{
                                                echo "<img class='menu-avatar' src='../upload/foto/$profil[foto]' /> <span>$profil[nama_karyawan]<i class='icon-caret-down'></i></span>";
                                            }

                                            if($_SESSION[level_user]=='head'){

                                            $cek_notif = mysql_query("SELECT count(*) AS notif FROM klaim WHERE approval='$_SESSION[id_karyawan]' AND status='pending'");
                                            $val = mysql_fetch_assoc($cek_notif);
                                            $notif = $val['notif'];
                                            $href = "?page=klaim&status=pending";
                                            if($notif>0){                                     
                                            echo "<span class='badge badge-dark-red'>$notif</span>";
                                            }
                                            }elseif($_SESSION['level_user']=='admin'){
                                             $cek_notif = mysql_query("SELECT count(*) AS notif FROM klaim WHERE status='verify'");
                                            $val = mysql_fetch_assoc($cek_notif);
                                            $notif = $val['notif'];
                                            $href  = "?page=klaim&status=verify";
                                            if($notif>0){                                     
                                            echo "<span class='badge badge-dark-red'>$notif</span>";
                                            }   
                                            }
                                            ?>
                                        </span>
                                    </a>

                                    <ul class="dropdown-menu">

                                        <!-- the first element is the one with the big avatar, add a with-image class to it -->

                                        <li class="with-image">
                                        <?php
                                        if($profil[foto]=='' OR $_SESSION['id_karyawan']=='admin'){
                                                echo "<div class='avatar'>
                                                    <img src='../assets/img/user.png' />
                                                </div>
                                                <span>$profil[nama_karyawan]</span>";
                                            }else{
                                                echo "<div class='avatar'>
                                                <img src='../upload/foto/$profil[foto]' />
                                            </div>
                                            <span>$profil[nama_karyawan]</span>";

                                            }
                                            ?>
                                        </li>

                                        <li class="divider"></li>

                                        <li><a href="ganti_password.php" target="_blank"><i class="icon-lock"></i> <span>Ganti Password</span></a></li>
                                        <li><a href="<?php echo $href; ?>"><i class="icon-envelope"></i> <span>Request</span> <span class="label label-dark-red pull-right"><?php echo $notif; ?></span></a></li>
                                        <li><a href="logout.php"><i class="icon-off"></i> <span>Logout</span></a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>


                    </div>
                </div>
            </div><div class="sidebar-background">
                <div class="primary-sidebar-background"></div>
            </div>

            <div class="primary-sidebar">
                <?php require_once ("core/main_nav.php"); ?>
            </div>

            <div class="main-content">
                <div class="container-fluid padded">
                    <div class="row-fluid">

                        <!-- Breadcrumb line -->

                        <div id="breadcrumbs">
                            <?php require_once("core/breadcrumbs.php"); ?> 
                        </div>
                    </div>
                </div>
                <?php require_once("content.php"); ?>
            </div>
        </body>
        </html>

        <?php
    }
}
