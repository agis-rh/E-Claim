<?php

/*
 * *****************************************************************************
 * Filename  : logout.php
 * Creator   : Agis Rahma Herdiana
 * © Copyright 2016
 * *****************************************************************************
 */
require_once("../system/functions.php");
// membuat fungsi baru
$query = new Functions();
//membuat koneksi
$db = new Connection();



session_start();
$aktifitas = 'Meninggalkan halaman admin';
$log = $query->log($_SESSION[id_user], $aktifitas, date('Y-m-d'), date('H:i:s'));
session_unset('id_user');
session_destroy();
header('location: ../home.html');
?>
