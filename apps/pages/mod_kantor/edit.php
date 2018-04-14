<?php
$id = $_GET['id'];
$kantor = $query->get_kantor($id);
?>

<div class="container-fluid padded">
    <div class="box">
        <div class="box-header">
            <div class="title">Kantor</div>
            <ul class="box-toolbar">
                <li class="toolbar-link">
                    <a href="#" data-toggle="dropdown"><i class="icon-cog"></i></a>
                    <ul class="dropdown-menu">
                        <li><a href="#"><i class="icon-plus-sign"></i> Add</a></li>
                        <li><a href="#"><i class="icon-remove-sign"></i> Remove</a></li>
                        <li><a href="#"><i class="icon-pencil"></i> Edit</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="box-content padded">
            <div class="row-fluid">
                <div class="span8 separate-sections">
                    <form class="form-horizontal fill-up validatable" action=""  method="POST">
                        <div class="form-group">
                            <label class="control-label span2">ID Kantor :</label>
                            <div class="span10">
                            <div class="span2">
                                <input type="hidden" name="id" value="<?php echo $kantor['id_kantor']; ?>">
                                <input type="hidden" name="approval_old" value="<?php echo $kantor['approval']; ?>">
                                <input type="text" name="id_kantor" value="<?php echo $kantor['id_kantor']; ?>" readonly left class="validate[required]" data-prompt-position="topLeft">
                                <span class="help-block note"><i class="icon-required"></i></span><br>
                            </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label span2">Nama Kantor :</label>
                            <div class="span10">
                                <input type="text" name="nama_kantor" value="<?php echo $kantor['nama_kantor']; ?>" class="validate[required]" data-prompt-position="topLeft">
                                <span class="help-block note"><i class="icon-required"></i></span><br>
                            </div>
                        </div>
                       <div class="form-group">
                            <label class="control-label span2">Kota :</label>
                            <div class="span10">
                                <select class="select2-container select2-container-multi chzn-select" name="kota">
                                    <option value="0">Pilih Kota</option>
                                            <?php
                                            // pilihan golongan
                                            $kota = $query->kota();
                                            foreach ($kota as $row) {
                                                echo "<option value='" . $row['id'] . "'";
                                                echo $row['id'] == $kantor['id_regencies'] ? 'selected' : '';
                                                echo ">$row[name]";
                                                echo "</option>";
                                            }
                                            ?>
                                </select>
                                <span class="help-block note"><i class="icon-required"></i></span><br>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label span2">Kepala Kantor :</label>
                            <div class="span10">
                                <select class="select2-container select2-container-multi chzn-select" name="approval">
                                    <option value="0">Pilih Kepala Kantor</option>
                                    <?php
                                    // pilihan head
                                    $head = $query->all_karyawan();
                                    foreach ($head as $row) {
                                        echo "<option value='" . $row['id_karyawan'] . "'";
                                        echo $row['id_karyawan'] == $kantor['approval'] ? 'selected' : '';
                                        echo ">$row[nama_karyawan]";
                                        echo "</option>";
                                    }
                                    ?>
                                </select>
                                <span class="help-block note"><i class="icon-required"></i></span><br>
                            </div>
                             <div class="form-group">
                                    <label class="control-label span2">Alamat :</label>
                                    <div class="span10">
                                        <textarea  rows="6" name="alamat"><?php echo $kantor['alamat_kantor']; ?></textarea>
                                        <span class="help-block note"><i class="icon-required"></i></span><br>
                                    </div>
                                </div>
                        </div>
                        <div class="span10 separate-sections pull-right" style="margin-top: 100px;">
                            <div class="form-group">
                                <button type="submit" name="save" class="btn btn-blue">Simpan</button>
                                <button type="button" class="btn btn-default">Batal</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>


    <?php
    $id_kantor   = $_POST['id'];
    $approval_old= $_POST['approval_old'];
    $nama_kantor = $_POST['nama_kantor'];
    $kota        = $_POST['kota'];
    $approval    = $_POST['approval'];
    $alamat      = $_POST['alamat'];


    if (isset($_POST['save'])) {

        $query->edit_kantor($id_kantor,$nama_kantor,$kota,$approval,$alamat);
        $query->user_staf($approval_old);
        $query->user_head($approval);
         // Log Aktifitas
        $query->log($_SESSION[id_user],'Mengubah kantor baru',$tgl_sekarang,$jam_sekarang);
        echo "<script>window.location='admin.php?page=kantor';</script>";
    }