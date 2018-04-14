<?php
/*
 * *****************************************************************************
 * Filename  : dbcontroller.php
 * Creator   : Agis Rahma Herdiana
 * © Copyright 2016
 * *****************************************************************************
 */
class Connection {
    var $hostname = "localhost";
    var $username = "root";
    var $password = "";
    var $database = "apps_eclaim";

    public function __construct() {
        $connectdb = mysql_connect($this->hostname,$this->username,$this->password);
        if($connectdb) {
            $selectdb  = mysql_select_db($this->database);
            if(!$selectdb) {
                header("Location: error/error_select_db.php");
            }
        }
        else {
            header("Location: error/error_connect.php");
        }
    }
}
