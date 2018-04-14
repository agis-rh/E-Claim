<?php

/*
 * *****************************************************************************
 * Filename  : cek_password.php
 * Creator   : Agis Rahma Herdiana
 * © Copyright 2016
 * *****************************************************************************
 */



date_default_timezone_set('Asia/jakarta');
// menghilangkan error
error_reporting(E_NOTICE || E_WARNING);
// masukan file functions query
require_once("../system/functions.php");
// membuat fungsi baru
$query = new Functions();
//membuat koneksi
$db = new Connection();

$mod = $_POST['mod'];
$act = $_POST['act'];

// menemukan tipe kunci
if ($mod == 'login' AND $act == 'searchlocktype') {
    $username = anti_injection($_POST['username']);
    $user = $query->cek_username($username);

    echo $user[locktype];
} elseif ($mod == 'login' AND $act == 'proclogin') {
    $username = anti_injection($_POST['username']);
    $pass = anti_injection(md5($_POST['password']));
    if (!ctype_alnum($username) OR ! ctype_alnum($pass)) {
        header('location:login.php?pesan_error=1&token=' . md5('error1'));
    } else {

        // menemukan user yang terdaftar
        $user = $query->count_user($username, $pass);
        $data = $query->login($username, $pass);
        if ($user > 0) {

            // memulai sesi
            session_start();
            // timeout
            include "timeout.php";
            $_SESSION['id_user']     = $data[id_user];
            $_SESSION['level_user']  = $data[level];
            $_SESSION['id_karyawan'] = $data[username];
            $_SESSION['tanggal']     = date('Y-m-d');
            $_SESSION['waktu']       = date('H:i:s');
            $_SESSION['login']       = 1;
            $sid_lama = session_id();
            //set timer timeout
            timer();
            // Regenerate session ID
            session_regenerate_id();
            $sid_baru = session_id();
            $update_session = $query->regenerate_session($sid_baru, $data[id_user], date('Y-m-d,H:i:s'));
            // Log Aktifitas
            $aktifitas = 'Masuk ke panel admin';
            $log = $query->log($data[id_user], $aktifitas, date('Y-m-d'), date('H:i:s'));
            header('location:admin.php');
        } else {
            header('location:index.php?pesan_error=2&token=' . md5('error2'));
        }
    }
}
