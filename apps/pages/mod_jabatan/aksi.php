<?php

/*
 * *****************************************************************************
 * Filename  : aksi.php
 * Creator   : Agis Rahma Herdiana
 * © Copyright 2018                         
 * *****************************************************************************
 */

$save = $_POST['save'];
$edit = $_POST['edit'];

$nama_jabatan = $_POST['nama_jabatan'];
$golongan     = $_POST['golongan'];
$id_jabatan   = $_POST['id'];

if (isset($save)) {
    $query->tambah_jabatan($nama_jabatan, $golongan);
     // Log Aktifitas
    $query->log($_SESSION[id_user],'Menambah data jabatan',$tgl_sekarang,$jam_sekarang);
    echo "<script>window.location='admin.php?page=jabatan';</script>";
} else if (isset($edit)) {
    $query->edit_jabatan($id_jabatan, $nama_jabatan, $golongan);
     // Log Aktifitas
     $query->log($_SESSION[id_user],'Mengubah data jabatan',$tgl_sekarang,$jam_sekarang);
    echo "<script>window.location='admin.php?page=jabatan';</script>";
}

