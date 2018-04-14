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

$nama_golongan = $_POST['nama_golongan'];
$pajak         = $_POST['pajak'];
$id_golongan   = $_POST['id'];

if (isset($save)) {
    $query->tambah_golongan($nama_golongan, $pajak);
     // Log Aktifitas
    $query->log($_SESSION[id_user],'Menambah data golongan',$tgl_sekarang,$jam_sekarang);
    echo "<script>window.location='admin.php?page=golongan';</script>";
} else if (isset($edit)) {
    $query->edit_golongan($id_golongan, $nama_golongan, $pajak);
     // Log Aktifitas
     $query->log($_SESSION[id_user],'Mengubah data golongan',$tgl_sekarang,$jam_sekarang);
    echo "<script>window.location='admin.php?page=golongan';</script>";
}

