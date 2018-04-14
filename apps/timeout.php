<?php

/*
 * *****************************************************************************
 * Filename  : timeout.php
 * Creator   : Agis Rahma Herdiana
 * © Copyright 2016
 * *****************************************************************************
 */

session_start();

function timer() {
    $time = 1000;
    $_SESSION[timeout] = time() + $time;
}

function cek_login() {
    $timeout = $_SESSION[timeout];
    if (time() < $timeout) {
        timer();
        return true;
    } else {
        unset($_SESSION[timeout]);
        return false;
    }
}

?>
