<?php

/* 
 * Web Application
 * Creator by Agis Laksamana
 * Copyright © 2015; Licensed
 * Software Engineer
 */
  
error_reporting(0);
require_once ('../../../../system/functions.php');
// membuat fungsi baru
$query = new Functions();
//membuat koneksi
$db = new Connection();

$id_karyawan = $_POST['id_karyawan'];
if(isset($id_karyawan)) {
$data = mysql_query("SELECT * FROM karyawan WHERE id_karyawan='$id_karyawan'");
$count = mysql_num_rows($data);
	if($count > 0 ) {
		echo 1;
	}
	else {
		echo 0;
	}
}

                                    

