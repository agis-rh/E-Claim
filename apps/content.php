<?php

/*
 * *****************************************************************************
 * Filename  : content.php
 * Creator   : Agis Rahma Herdiana
 * © Copyright 2016
 * *****************************************************************************
 */
$page = $_GET['page'];
switch ($page) {
    case "dashboard":
        include "pages/dashboard.php";
        break;
    /*     * ******************************************************************** */
    case "tambah_karyawan":
        include "pages/mod_karyawan/add.php";
        break;
    /*     * ******************************************************************** */
    case "karyawan":
        include "pages/mod_karyawan/view.php";
        break;
    /*     * ******************************************************************** */
    case "edit_karyawan":
        include "pages/mod_karyawan/edit.php";
        break;
    case "module":
        include "pages/mod_module/view.php";
        break;
    /*     * ******************************************************************** */
    case "tambah_module":
        include "pages/mod_module/add.php";
        break;
    /*     * ******************************************************************** */
    case "edit_module":
        include "pages/mod_module/edit.php";
        break;
    /*     * ******************************************************************** */
    case "parent":
        include "pages/mod_module/mod_parent/add.php";
        break;
    /*     * ******************************************************************** */
    case "edit_parent":
        include "pages/mod_module/mod_parent/edit.php";
        break;
    /*     * ******************************************************************** */
    case "role":
        include "pages/mod_role/view.php";
        break;
    /*     * ******************************************************************** */
    case "edit_role":
        include "pages/mod_role/edit.php";
        break;
   
    /*     * ******************************************************************** */
     case "profile":
        include "pages/mod_user/mod_profile/profile.php";
        break;
    /*     * ******************************************************************** */
     case "edit_profile":
        include "pages/mod_user/mod_profile/edit.php";
        break;
     /*     * ******************************************************************** */
     case "list_user":
        include "pages/mod_user/mod_users/view.php";
        break;
     /*     * ******************************************************************** */
     case "tambah_user":
        include "pages/mod_user/mod_users/add.php";
        break;
    /*     * ******************************************************************** */
     case "detail_user":
        include "pages/mod_user/mod_users/detail.php";
        break;
    /*   * ******************************************************************** */



     /*     * ******************************************************************** */
    case "golongan":
        include "pages/mod_golongan/view.php";
        break;
    /*     * ******************************************************************** */
    case "aksi_golongan":
        include "pages/mod_golongan/aksi.php";
        break;
     /*     * ******************************************************************** */
    case "jabatan":
        include "pages/mod_jabatan/view.php";
        break;
    /*     * ******************************************************************** */
    case "aksi_jabatan":
        include "pages/mod_jabatan/aksi.php";
        break;
    /*     * ******************************************************************** */
     case "klaim":
        include "pages/mod_klaim/view.php";
        break;
    /*     * ******************************************************************** */
    case "tambah_klaim":
        include "pages/mod_klaim/add.php";
        break;
    /*     * ******************************************************************** */
    case "edit_klaim":
        include "pages/mod_klaim/edit.php";
        break;
    /*     * ******************************************************************** */
    case "detail_klaim":
        include "pages/mod_klaim/detail.php";
        break;
    /*     * ******************************************************************** */
     case "kantor":
        include "pages/mod_kantor/view.php";
        break;
    /*     * ******************************************************************** */
    case "tambah_kantor":
        include "pages/mod_kantor/add.php";
        break;
    /*     * ******************************************************************** */
    case "edit_kantor":
        include "pages/mod_kantor/edit.php";
        break;
    /*     * ******************************************************************** */
    case "logout":
        include "logout.php";
        break;
    /*     * ******************************************************************** */
    default:
        include "pages/dashboard.php";
        break;
}
