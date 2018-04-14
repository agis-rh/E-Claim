

<div class="container-fluid padded">
    <?php 
    if($_GET['pesan']=='gagal'){
        $pesan = "<div class='alert alert-danger alert-dismissible' role='alert'>
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                <i class='fa fa-times-circle'></i> ID kantor sudah digunakan !
            </div>";
    }

?>
 <?php echo "$pesan"; ?>
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
                                <input type="text" name="id_kantor" left class="validate[required]" data-prompt-position="topLeft">
                                <span class="help-block note"><i class="icon-required"></i></span><br>
                            </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label span2">Nama Kantor :</label>
                            <div class="span10">
                                <input type="text" name="nama_kantor" class="validate[required]" data-prompt-position="topLeft">
                                <span class="help-block note"><i class="icon-required"></i></span><br>
                            </div>
                        </div>
                       <div class="form-group">
                            <label class="control-label span2">Kota :</label>
                            <div class="span10">
                                <select class="select2-container select2-container-multi chzn-select" name="kota">
                                    <option value="0">Pilih Kota</option>
                                        <?php
                                        // pilihan kota
                                            $kota = $query->kota();
                                            foreach ($kota as $row) {
                                                echo" <option value='$row[id]'>$row[name]</option>";
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
                                    // pilihan parent
                                    $parent = $query->parent_module();
                                    foreach ($parent as $row) {
                                        echo "<option value='" . $row['id_module'] . "'";
                                        echo $row['id_module'] == $module['parent_id'] ? 'selected' : '';
                                        echo ">$row[nama_module]";
                                        echo "</option>";
                                    }
                                    ?>
                                </select>
                                <span class="help-block note"><i class="icon-required"></i></span><br>
                            </div>
                             <div class="form-group">
                                    <label class="control-label span2">Alamat :</label>
                                    <div class="span10">
                                        <textarea  rows="6" name="alamat"></textarea>
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
    $id_kantor   = $_POST['id_kantor'];
    $nama_kantor = $_POST['nama_kantor'];
    $kota        = $_POST['kota'];
    $approval    = $_POST['approval'];
    $alamat      = $_POST['alamat'];


    if (isset($_POST['save'])) {
        $cek_id=$query->count_kantor($id_kantor);
        if($cek_id>0){
            header('location:admin.php?page=tambah_kantor&pesan=gagal');
        }else{
        $query->tambah_kantor($id_kantor,$nama_kantor,$kota,$approval,$alamat);
        $query->user_head($approval);
         // Log Aktifitas
        $query->log($_SESSION[id_user],'Menambahkan kantor baru',$tgl_sekarang,$jam_sekarang);
        echo "<script>window.location='admin.php?page=kantor';</script>";
    }
    }