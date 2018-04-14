<?php
/*
 * *****************************************************************************
 * Filename  : ganti_password.php
 * Creator   : Agis Rahma Herdiana
 * © Copyright 2016
 * *****************************************************************************
 */

//error_reporting(0);
session_start();
// masukan file functions query
require_once("../system/functions.php");
// membuat fungsi baru
$query = new Functions();
//membuat koneksi
$db = new Connection();

// mendapatkan id user
$user = $query->get_user($_SESSION[id_user]);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Ganti Password</title>
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="../assets/plugins/login/css/plugins.css" rel="stylesheet">
        <link href="../assets/plugins/login/css/main.css" rel="stylesheet">
        <script src="../assets/plugins/login/js/jquery-1.11.0.min.js"></script>
        <script src="../assets/plugins/login/js/plugins.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="col-md-12">
                <div class="block" style="margin-top:100px;">

                    <div class="block-title"><h2>Edit Password</h2></div>

                    <?php if ($_GET['status'] == 'error') { ?>

                        <div class="alert alert-danger">
                            <p>Password lama tidak sesuai... silahkan coba lagi !</p>
                        </div>

                    <?php } else if ($_GET['status'] == 'sukses') { ?>
                        <div class="alert alert-success">
                            <p>Password telah diubah ! !</p>
                        </div>
                    <?php
                    } else {
                        echo "";
                    }
                    ?>
                    <form id="form-validation" class="form-bordered" method="post" action="" enctype="multipart/form-data" autocomplete="off">
                        <fieldset>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><span class="badge badge-info" style="padding: 10px">Masukan Password Anda Saat Ini : </span></label>
                                        <?php
                                        if ($user[locktype] == "0") {
                                            ?>
                                            <div class="input-group">
                                                <input class="form-control" type="password" name="oldpassword">
                                            </div>
                                            <span class="help-block">Saat ini password anda menggunkan teks biasa.</span>
                                        <?php } else { ?>
                                            <input id="oldpassword" type="hidden" name="oldpassword">
                                            <div id="patternHolder"></div>
                                            <span class="help-block">Saat ini password anda menggunkan pola.</span>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Password Baru</label>
                                        <div class="box-password">
                                            <div class="input-group">
                                                <input class="form-control" type="password" required id="newpassword" placeholder="Password teks..." name="newpassword">
                                                <span class="input-group-btn">
                                                    <button id="change-lock-type" class="btn btn-success" type="button"><i class="fa fa-gear"></i> Ubah Tipe Password</button>
                                                </span>
                                            </div>
                                            <span class="help-block"></span>
                                        </div>
                                        <div class="box-password-lock" style="display:none;">
                                            <div class="input-group">
                                                <span class="btn-group">
                                                    <button id="change-pattern" class="btn btn-warning" type="button"><i class="fa fa-barcode"></i> Pola</button>
                                                    <button id="change-lock-type-2" class="btn btn-success" type="button"><i class="fa fa-gear"></i> Teks</button>
                                                </span>
                                            </div>
                                            <div id="patternHolder1"></div>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Lock Type</label>
                                        <input type="text" class="form-control" style="width: 50px" name="locktype" readonly id="locktype" value="0">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="submit" class="btn btn-sm btn-primary"><i class="fa fa-check"></i> Simpan</button>
                                <a href="javascript:window.close()" class="btn btn-sm btn-danger"><i class="fa fa-check"></i> Selesai</a>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
<script type="text/javascript">
    $("#change-lock-type").click(function() {
        $("#locktype").val('1');
        $("#newpassword").val('');
        $(".box-password").hide();
        $(".box-password-lock").show();
    });

    $("#change-lock-type-2").click(function() {
        $("#locktype").val('0');
        $("#newpassword").val('');
        $(".box-password").show();
        $(".box-password-lock").hide();
    });
    $("#change-pattern").click(function() {
        var lock = new PatternLock('#patternHolder1', {
            margin: 18,
            onDraw: function(pattern) {
                var patternval = lock.getPattern();
                $("#newpassword").val(patternval);
            }
        });
    });
    var lock = new PatternLock('#patternHolder', {
        margin: 18,
        onDraw: function(pattern) {
            var patternval = lock.getPattern();
            $("#oldpassword").val(patternval);
        }
    });
</script>

<?php
if (isset($_POST['submit'])) {
    $old_password = $_POST['oldpassword'];
    $new_password = $_POST['newpassword'];
    $lock_type_pass = $_POST['locktype'];
    // Cek data
    $cek = mysql_query("SELECT * FROM user WHERE id_user='$_SESSION[id_user]' && password='" . md5($old_password) . "' and blokir='N'");
    $jumlah = mysql_numRows($cek);
    if ($jumlah > 0) {
        $new_pass = md5($new_password);
        $query->ganti_password($_SESSION[id_user], $new_pass, $lock_type_pass);
        // Log Aktifitas
        $query->log($_SESSION[id_user],'Mengubah password',$tgl_sekarang,$jam_sekarang);
        header('location: ganti_password.php?status=sukses');
        echo "<meta http-equiv='refresh' content='5; url=<script>window.close();</script>'/>";
    } else {
        header('location: ganti_password.php?status=error');
    }
}
