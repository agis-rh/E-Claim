<?php

/*
 * *****************************************************************************
 * Filename  : functions.php
 * Creator   : Agis Rahma Herdiana
 * © Copyright 2016                         
 * *****************************************************************************
 */

date_default_timezone_set('Asia/jakarta');
error_reporting(0);                     //Menghilangkan laporan error
require_once ("dbcontroller.php");      // fungsi koneksi database
require_once ("datetime.php");          // fungsi tanggal dan waktu
require_once ("time.php");              // fungsi time
require_once ("library.php");           // fungsi library
require_once ("pageNavi.php");          // fungsi pageNavi

class Functions {

    /*
     * Fungsi loged in
     */

    public function cek_username($username) {
        $query = "SELECT * FROM user WHERE username='$username' AND blokir='N'";
        $data = mysql_query($query);
        $hasil = mysql_fetch_array($data);

        return $hasil;
    }

    public function get_user($id) {
        $query = "SELECT * FROM user WHERE id_user='$id'";
        $data = mysql_query($query);
        $hasil = mysql_fetch_array($data);

        return $hasil;
    }

    public function login($username, $password) {
        $query = "SELECT * FROM user WHERE username='$username' && password='$password' AND blokir='N'";
        $data = mysql_query($query);
        $hasil = mysql_fetch_array($data);

        return $hasil;
    }

    public function count_user($username, $password) {
        $query = "SELECT * FROM user WHERE username='$username' && password='$password' AND blokir='N'";
        $data = mysql_query($query);
        $hasil = mysql_num_rows($data);

        return $hasil;
    }

    public function regenerate_session($id_session, $id_user, $datetime) {
        $query = "UPDATE user SET id_session='$id_session', last_login='$datetime'
        WHERE " . "id_user='$id_user'";
        mysql_query($query);
    }

    public function ganti_password($id_user, $password, $locktype) {
        $query = "UPDATE user SET password='$password', locktype='$locktype'
        WHERE " . "id_user='$id_user'";
        mysql_query($query);
    }

    /*
     * Fungsi manajemen tabel module
     */

    public function parent_module() {
        $query = "SELECT * FROM module WHERE parent_id='0' ORDER BY ordering ASC";
        $data = mysql_query($query);
        while ($row = mysql_fetch_array($data)) {
            $hasil[] = $row;
        }

        return $hasil;
    }

    public function module() {
        $query = "SELECT * FROM module WHERE parent_id!='0'";
        $data = mysql_query($query);
        while ($row = mysql_fetch_array($data)) {
            $hasil[] = $row;
        }

        return $hasil;
    }

    public function tambah_module($parent_id, $nama_module, $icon, $path, $url, $ordering) {
        $query = "INSERT INTO module VALUES ('','$parent_id','$nama_module','$icon','$path','$url','$ordering','','','','')";
        mysql_query($query);
    }

    public function edit_module($id_module, $parent_id, $nama_module, $icon, $path, $url, $ordering) {
        $query = "UPDATE module SET parent_id='$parent_id', nama_module='$nama_module', icon='$icon', dir='$path', url='$url', ordering='$ordering' WHERE id_module='$id_module'";
        mysql_query($query);
    }

    public function edit_parent($id_module, $nama_module, $icon) {
        $query = "UPDATE module SET nama_module='$nama_module', icon='$icon' WHERE id_module='$id_module'";
        mysql_query($query);
    }

    public function get_module($id_module) {
        $query = "SELECT * FROM module WHERE id_module='$id_module'";
        $data = mysql_query($query);
        $hasil = mysql_fetch_array($data);

        return $hasil;
    }

    public function hapus_module($id_module) {
        $query = "DELETE FROM module WHERE id_module='$id_module'";
        mysql_query($query);
    }

    public function active_role($id_module, $tambah, $baca, $edit, $hapus) {
        $query = "UPDATE module SET tambah='$tambah', baca='$baca', edit='$edit', hapus='$hapus' WHERE id_module='$id_module'";
        mysql_query($query);
    }

    public function nonactive_role($id){
        $query = "UPDATE module SET tambah='N', baca='N', edit='N', hapus='N' WHERE parent_id='$id'";
        mysql_query($query);
    }

    public function get_role($nama_module) {
        $query = "SELECT * FROM module WHERE url='$nama_module'";
        $data = mysql_query($query);
        $hasil = mysql_fetch_array($data);

        return $hasil;
    }



   
    /*
     * Fungsi manajemen tabel users
     */
    public function view_user(){
       $query = "SELECT k.*, u.* FROM karyawan AS k, user AS u WHERE k.id_karyawan=u.username";
        $data  = mysql_query($query);
        while($row = mysql_fetch_array($data)){
            $hasil[] = $row;
        }
        return $hasil;
    }

    public function tambah_user($username,$password){
        $query = "INSERT INTO user VALUES('','$username','$password','staf','N','','0','')";
        mysql_query($query);
    }

    public function blokir($id){
        $query = "UPDATE user SET blokir='Y' WHERE id_user='$id'";
        mysql_query($query);
    }

    public function hapus_user($id){
        $query = "DELETE FROM user WHERE id_user='$id'";
        mysql_query($query);
    }

     public function unblokir($id){
        $query = "UPDATE user SET blokir='N' WHERE id_user='$id'";
        mysql_query($query);
    }

    public function user_head($id){
        $query = "UPDATE user SET level='head' WHERE username='$id'";
        mysql_query($query);
    }

     public function user_staf($id){
        $query = "UPDATE user SET level='staf' WHERE username='$id'";
        mysql_query($query);
    }


    /*
     * Fungsi manajemen tabel log aktifitas
     */

    public function view_log($id_user){
       $query = "SELECT * FROM log_aktivitas WHERE id_user='$id_user' ORDER BY id_log DESC";
        $data  = mysql_query($query);
        while($row = mysql_fetch_array($data)){
            $hasil[] = $row;
        }
        return $hasil;
    }

    public function log($id_user,$aktivitas,$tanggal,$jam){
        $query = "INSERT INTO log_aktivitas VALUES('','$id_user','$aktivitas','$tanggal','$jam')";
        mysql_query($query);
    }


    /*
     * ************************************
     * Manajemen tabel golongan
     * ************************************
    */

     public function golongan(){
        $query = "SELECT * FROM golongan ORDER BY nama_golongan ASC";
        $data  = mysql_query($query);
        while($row = mysql_fetch_array($data)){
            $hasil [] = $row;
        }

        return $hasil;
    }

    public function tambah_golongan($nama_golongan,$pajak){
        $query = "INSERT INTO golongan VALUES('','$nama_golongan','$pajak')";
        mysql_query($query);
    }

    public function edit_golongan($id_golongan,$nama_golongan,$pajak){
        $query = "UPDATE golongan SET nama_golongan='$nama_golongan', pajak='$pajak' WHERE id_golongan='$id_golongan'";
        mysql_query($query);
    }

    public function get_golongan($id_golongan){
        $query = "SELECT * FROM golongan WHERE id_golongan='$id_golongan'";
        $data  = mysql_query($query);
        $hasil = mysql_fetch_array($data);

        return $hasil;
    }

    public function delete_golongan($id_golongan){
        $query = "DELETE FROM golongan WHERE id_golongan='$id_golongan'";
        mysql_query($query);
    }
    
     /*
     * ************************************
     * Manajemen tabel jabatan
     * ************************************
    */

     public function jabatan(){
        $query = "SELECT j.*, g.* FROM jabatan AS j, golongan AS g WHERE g.id_golongan=j.id_golongan ORDER BY j.nama_jabatan";
        $data  = mysql_query($query);
        while($row = mysql_fetch_array($data)){
            $hasil [] = $row;
        }

        return $hasil;
    }

    public function tambah_jabatan($nama_jabatan,$golongan){
        $query = "INSERT INTO jabatan VALUES('','$nama_jabatan','$golongan')";
        mysql_query($query);
    }

    public function edit_jabatan($id_jabatan,$nama_jabatan,$golongan){
        $query = "UPDATE jabatan SET nama_jabatan='$nama_jabatan', id_golongan='$golongan' WHERE id_jabatan='$id_jabatan'";
        mysql_query($query);
    }

    public function get_jabatan($id_jabatan){
        $query = "SELECT * FROM jabatan WHERE id_jabatan='$id_jabatan'";
        $data  = mysql_query($query);
        $hasil = mysql_fetch_array($data);

        return $hasil;
    }

    public function delete_jabatan($id_jabatan){
        $query = "DELETE FROM jabatan WHERE id_jabatan='$id_jabatan'";
        mysql_query($query);
    }

    /*
     * ************************************
     * Manajemen tabel kantor
     * ************************************
    */

    public function kantor(){
        $query = "SELECT * FROM kantor ORDER BY nama_kantor ASC";
        $data  = mysql_query($query);
        while($row = mysql_fetch_array($data)){
            $hasil [] = $row;
        }

        return $hasil;
    }

    public function tambah_kantor($id_kantor,$nama_kantor,$id_regencies,$approval,$alamat){
        $query = "INSERT INTO kantor VALUES('$id_kantor','$nama_kantor','$id_regencies','$approval','$alamat')";
        mysql_query($query);
    }

    public function edit_kantor($id_kantor,$nama_kantor,$id_regencies,$approval,$alamat){
        $query = "UPDATE kantor SET nama_kantor='$nama_kantor', id_regencies='$id_regencies', approval='$approval', alamat_kantor='$alamat' WHERE id_kantor='$id_kantor'";
        mysql_query($query);
    }

    public function get_kantor($id_kantor){
        $query = "SELECT * FROM kantor WHERE id_kantor='$id_kantor'";
        $data  = mysql_query($query);
        $hasil = mysql_fetch_array($data);

        return $hasil;
    }

    public function delete_kantor($id_kantor){
        $query = "DELETE FROM kantor WHERE id_kantor='$id_kantor'";
        mysql_query($query);
    }

    public function count_kantor($id_kantor){
        $query = "SELECT * FROM kantor WHERE id_kantor='$id_kantor'";
        $data  = mysql_query($query);
        $data    = mysql_query($query);
        $hasil   = mysql_num_rows($data);

        return $hasil;
    }



    /*
     * ************************************
     * Manajemen tabel wilayah
     * ************************************
    */

    public function provinsi(){
        $query = "SELECT * FROM provinces ORDER BY name ASC";
        $data  = mysql_query($query);
        while($row = mysql_fetch_array($data)){
            $hasil [] = $row;
        }

        return $hasil;
    }

    public function kota(){
        $query = "SELECT * FROM regencies ORDER BY name ASC";
        $data  = mysql_query($query);
        while($row = mysql_fetch_array($data)){
            $hasil [] = $row;
        }

        return $hasil;
    }


    /*
     * ************************************
     * Manajemen tabel karyawan
     * ************************************
    */

    public function karyawan(){
        $query = "SELECT k.*, j.*, o.* FROM karyawan AS k, jabatan AS j, kantor AS o WHERE j.id_jabatan=k.id_jabatan AND o.id_kantor=k.id_kantor ORDER BY k.nama_karyawan";
        $data  = mysql_query($query);
        while($row = mysql_fetch_array($data)){
            $hasil [] = $row;
        }

        return $hasil;
    }

    public function detail_karyawan($id_karyawan){
        $query = "SELECT k.*, j.*, o.*, g.* FROM karyawan AS k, jabatan AS j, kantor AS o, golongan AS g WHERE j.id_jabatan=k.id_jabatan AND o.id_kantor=k.id_kantor AND g.id_golongan=j.id_golongan AND k.id_karyawan='$id_karyawan'";
        $data  = mysql_query($query);
        $hasil = mysql_fetch_array($data);

        return $hasil;
    }

    public function group_karyawan($id_kantor){
        $query = "SELECT k.*, j.*, o.* FROM karyawan AS k, jabatan AS j, kantor AS o WHERE j.id_jabatan=k.id_jabatan AND o.id_kantor=k.id_kantor AND k.id_kantor='$id_kantor' ORDER BY k.nama_karyawan";
        $data  = mysql_query($query);
        while($row = mysql_fetch_array($data)){
            $hasil [] = $row;
        }

        return $hasil;
    }

    public function self($id_karyawan){
        $query = "SELECT k.*, j.* FROM karyawan AS k, jabatan AS j WHERE j.id_jabatan=k.id_jabatan  AND k.id_karyawan='$id_karyawan' ORDER BY k.nama_karyawan";
        $data  = mysql_query($query);
        while($row = mysql_fetch_array($data)){
            $hasil [] = $row;
        }

        return $hasil;
    }

    public function all_karyawan(){
        $query = "SELECT * FROM karyawan ORDER BY nama_karyawan";
        $data  = mysql_query($query);
        while($row = mysql_fetch_array($data)){
            $hasil [] = $row;
        }

        return $hasil;
    }

     public function id_karyawan($id_karyawan){
        $query = "SELECT id_karyawan FROM karyawan WHERE id_karyawan='$id_karyawan'";
        $data  = mysql_query($query);
        $data    = mysql_query($query);
        $hasil   = mysql_num_rows($data);

        return $hasil;
    }

    public function tambah_karyawan($id_karyawan,$nama_karyawan,$id_kantor,$id_jabatan,$no_rekening,$an_rekening,$email,$telepon,$jenis_kelamin,$alamat,$foto){
        $query = "INSERT INTO karyawan 
        (id_karyawan,nama_karyawan,id_kantor,id_jabatan,no_rekening,an_rekening,email,telepon,jenis_kelamin,alamat,foto) VALUES
        ('$id_karyawan','$nama_karyawan','$id_kantor','$id_jabatan','$no_rekening','$an_rekening','$email','$telepon','$jenis_kelamin','$alamat','$foto')";
        mysql_query($query);
    }

    public function edit_karyawan($id_karyawan,$nama_karyawan,$kantor,$jabatan,$no_rekening,$an_rekening,$email,$telepon,$jenis_kelamin,$alamat,$foto){
        $query = "UPDATE karyawan SET nama_karyawan='$nama_karyawan', id_kantor='$kantor', id_jabatan='$jabatan', no_rekening='$no_rekening', an_rekening='$an_rekening', email='$email', telepon='$telepon', jenis_kelamin='$jenis_kelamin', alamat='$alamat', foto='$foto' WHERE id_karyawan='$id_karyawan'";
        mysql_query($query);
    }

    public function edit_karyawan_no_image($id_karyawan,$nama_karyawan,$kantor,$jabatan,$no_rekening,$an_rekening,$email,$telepon,$jenis_kelamin,$alamat){
        $query = "UPDATE karyawan SET nama_karyawan='$nama_karyawan', id_kantor='$kantor', id_jabatan='$jabatan', no_rekening='$no_rekening', an_rekening='$an_rekening', email='$email', telepon='$telepon', jenis_kelamin='$jenis_kelamin', alamat='$alamat' WHERE id_karyawan='$id_karyawan'";
        mysql_query($query);
    }

    public function get_karyawan($id_karyawan){
         $query = "SELECT * FROM karyawan WHERE id_karyawan='$id_karyawan'";
        $data  = mysql_query($query);
        $hasil = mysql_fetch_array($data);

        return $hasil;
    }

    public function delete_karyawan($id_karyawan){
        $query = "DELETE FROM karyawan WHERE id_karyawan='$id_karyawan'";
        mysql_query($query);
    }

     public function tambah_transaksi($noletter,$id_karyawan,$tgl_pengajuan,$tgl_pengobatan,$diagnosa,$biaya,$pajak,$total,$file,$approval){
        $query = "INSERT INTO klaim  VALUES ('$noletter','$id_karyawan','$tgl_pengajuan','$tgl_pengobatan','$diagnosa','$biaya','$pajak','$total','$file','pending','','','$approval','')";
        mysql_query($query);
    }

    public function klaim(){
        $query = "SELECT k.*, t.* FROM karyawan AS k, klaim AS t WHERE k.id_karyawan=t.id_karyawan ORDER BY t.tanggal_pengajuan DESC";
        $data  = mysql_query($query);
        while($row = mysql_fetch_array($data)){
            $hasil [] = $row;
        }

        return $hasil;
    }

    public function status_klaim($status){
        $query = "SELECT k.*, t.* FROM karyawan AS k, klaim AS t WHERE k.id_karyawan=t.id_karyawan AND t.status='$status' ORDER BY t.tanggal_pengajuan DESC";
        $data  = mysql_query($query);
        while($row = mysql_fetch_array($data)){
            $hasil [] = $row;
        }

        return $hasil;
    }

    public function klaim_head($head){
        $query = "SELECT k.*, t.* FROM karyawan AS k, klaim AS t WHERE k.id_karyawan=t.id_karyawan AND t.approval='$head' ORDER BY t.tanggal_pengajuan DESC";
        $data  = mysql_query($query);
        while($row = mysql_fetch_array($data)){
            $hasil [] = $row;
        }

        return $hasil;
    }

     public function status_klaim_head($head,$status){
        $query = "SELECT k.*, t.* FROM karyawan AS k, klaim AS t WHERE k.id_karyawan=t.id_karyawan AND t.approval='$head' AND t.status='$status' ORDER BY t.tanggal_pengajuan DESC";
        $data  = mysql_query($query);
        while($row = mysql_fetch_array($data)){
            $hasil [] = $row;
        }

        return $hasil;
    }

    public function klaim_staf($id_karyawan){
        $query = "SELECT k.*, t.* FROM karyawan AS k, klaim AS t WHERE k.id_karyawan=t.id_karyawan AND t.id_karyawan='$id_karyawan' ORDER BY t.tanggal_pengajuan DESC";
        $data  = mysql_query($query);
        while($row = mysql_fetch_array($data)){
            $hasil [] = $row;
        }

        return $hasil;
    }

    public function detail_klaim($noletter){
         $query = "SELECT * FROM klaim WHERE no_letter='$noletter'";
        $data  = mysql_query($query);
        $hasil = mysql_fetch_array($data);

        return $hasil;
    }

    public function respons($noletter,$status,$tanggal_proses,$alasan,$action_by){
        $query = "UPDATE klaim SET status='$status', tanggal_proses='$tanggal_proses', alasan='$alasan', action_by='$action_by' WHERE no_letter='$noletter'";
        mysql_query($query);
    }

    public function slip_klaim($noletter){
        $query = "SELECT klaim.*, karyawan.nama_karyawan,karyawan.id_jabatan, karyawan.no_rekening, karyawan.an_rekening, kantor.nama_kantor, jabatan.nama_jabatan, golongan.nama_golongan FROM `klaim` INNER JOIN karyawan ON karyawan.id_karyawan=klaim.id_karyawan INNER JOIN kantor ON kantor.id_kantor=karyawan.id_kantor INNER JOIN jabatan ON jabatan.id_jabatan=karyawan.id_jabatan INNER JOIN golongan ON golongan.id_golongan=jabatan.id_golongan WHERE klaim.no_letter='$noletter'";
        $data  = mysql_query($query);
        $hasil = mysql_fetch_array($data);

        return $hasil;
    }



}

/*
 * ****************************************
 * akhiri fungsi (functions)
 * ****************************************
 */




