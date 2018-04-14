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

$user = $_POST['user'];
if(isset($user)) {
$data = mysql_query("SELECT * FROM user WHERE username='$user'");
$count = mysql_num_rows($data);
	if($count > 0 ) {
		echo 1;
	}
	else {
		echo 0;
	}
}

                                    

