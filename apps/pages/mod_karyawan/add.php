<script type="text/javascript">
    function cek_user(id_karyawan){
        $('#pesanid').html("sedang mengecek..."); 
        var cek  = id_karyawan; 
            if(cek=='') {
                $("#pesanid").html("<span class='text-red'><i class='fa fa-times-circle'></i> Jangan kosong...</span>");  
            } else {
                    $.ajax({
                     type:"POST",
                     url:"pages/mod_karyawan/controller/checking.php",    
                     data: "id_karyawan=" + cek,
                     success: function(response){                 
                            if(response==1){
                                    $('#id_karyawan').val("").focus();
                                    $("#pesanid").html("<span class='text-red'><i class='fa fa-times-circle'></i> ID  <b>"+cek+"</b> sudah ada. Coba yang lain !</span>");    
                            } 
                            else {
                                    $("#pesanid").html("<span class='text-blue'><i class='fa fa-check'></i> "+cek+" Ok </span>");   
                       }
                    }
                    });                 
            }
        }
    
</script>
 <div class="container-fluid padded">
                    <div class="box">
                        <div class="box-header">
                            <div class="title">Tambah Karyawan</div>
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
                            <form class="form-horizontal fill-up validatable" action="" enctype="multipart/form-data" method="POST">
                             <div class="form-group">
                                    <label class="control-label span2">ID Karyawan :</label>
                                    <div class="span10">
                                    <div class="span5">
                                        <input type="text" name="id_karyawan" id="id_karyawan" onchange="cek_user(this.value);" left class="validate[required]" data-prompt-position="topLeft">
                                         <span class="help-block note" id="pesanid"><i class="icon-required"></i></span><br>
                                    </div>
                                    </div>
                                </div>

                                        <div class="form-group">
                                            <label class="control-label span2">Nama Lengkap :</label>
                                            <div class="span10">
                                                <input type="text" name="nama" class="validate[required]" data-prompt-position="topLeft">
                                                <span class="help-block note"><i class="icon-required"></i></span><br>
                                            </div>
                                        </div>
                                         <div class="form-group">
                                        <label class="control-label span2">Jenis Kelamin :</label>
                                        <div class="span10">
                                            <div class="span6">
                                                <div class="dashboard-stats small">
                                                    <ul class="inline">
                                                        <li class="glyph"><input type="radio" value="L" name="jk"></li>
                                                        <li>Laki-laki</li>
                                                        <li class="glyph"><input type="radio" value="P" name="jk"></li>
                                                        <li>Perempuan</li>
                                                    </ul>
                                                </div>
                                                <span class="help-block note"><br><i class="icon-required"></i></span><br>
                                            </div>
                                        </div>
                                        </div>
                                         <div class="form-group">
				                            <label class="control-label span2">Jabatan :</label>
				                            <div class="span10">
				                                <select class="select2-container select2-container-multi chzn-select" name="jabatan">
				                                    <option value="0">Pilih Jabatan</option>
				                                        <?php
				                                        // pilihan Jabatan
				                                            $jabatan = $query->jabatan();
				                                            foreach ($jabatan as $row) {
				                                                echo" <option value='$row[id_jabatan]'>$row[nama_jabatan]</option>";
				                                            }
				                                            ?>
				                                </select>
				                                <span class="help-block note"><i class="icon-required"></i></span><br>
				                            </div>
				                        </div>
				                         <div class="form-group">
				                            <label class="control-label span2">Kantor :</label>
				                            <div class="span10">
				                                <select class="select2-container select2-container-multi chzn-select" name="kantor">
				                                    <option value="0">Pilih Kantor</option>
				                                        <?php
				                                        // pilihan Kantor
				                                            $kantor = $query->kantor();
				                                            foreach ($kantor as $row) {
				                                                echo" <option value='$row[id_kantor]'>$row[nama_kantor]</option>";
				                                            }
				                                            ?>
				                                </select>
				                                <span class="help-block note"><i class="icon-required"></i></span><br>
				                            </div>
				                        </div>
                                       

                                        <div class="form-group">
                                            <label class="control-label span2">E-mail :</label>
                                            <div class="span10">
                                                <input type="email" name="email" class="validate[required]" data-prompt-position="topLeft">
                                                <span class="help-block note"><i class="icon-required"></i></span><br>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label span2">Telepon :</label>
                                            <div class="span10">
                                                <input type="text" name="phone" class="validate[required]" data-prompt-position="topLeft">
                                                <span class="help-block note"><i class="icon-required"></i></span><br>
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="control-label span2">No. Rekening :</label>
                                            <div class="span10">
                                                <input type="text" name="no_rekening" class="validate[required]" data-prompt-position="topLeft">
                                                <span class="help-block note"><i class="icon-required"></i></span><br>
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="control-label span2">A.N Rekening :</label>
                                            <div class="span10">
                                                <input type="text" name="an_rekening" class="validate[required]" data-prompt-position="topLeft">
                                                <span class="help-block note"><i class="icon-required"></i></span><br>
                                            </div>
                                        </div>
                                        <div class="form-group">
		                                    <label class="control-label span2">Alamat :</label>
		                                    <div class="span10">
		                                        <textarea  rows="6" name="alamat"></textarea>
		                                        <span class="help-block note"><i class="icon-required"></i></span><br>
		                                    </div>
		                                </div>

                                    <div class="form-group">
                                        <label class="control-label span2">Foto :</label>
                                        <div class="span4">
                                            <div class="uploader"><input type="file" name="picture"><span class="filename" style="user-select: none;">No file selected
                                                </span><span class="action" style="user-select: none;">+</span></div>
                                            <span class="help-block note"><br><i class="icon-required"></i>Format gambar (*.jpg, *.png).</span><br>
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
                       	$id_karyawan    = $_POST['id_karyawan'];
                        $nama_karyawan  = $_POST['nama'];
                        $id_jabatan     = $_POST['jabatan'];
                        $id_kantor      = $_POST['kantor'];
                        $jenis_kelamin  = $_POST['jk'];
                        $email          = $_POST['email'];
                        $telepon        = $_POST['phone'];
                        $no_rekening    = $_POST['no_rekening'];
                        $an_rekening    = $_POST['an_rekening'];
                        $alamat         = $_POST['alamat'];
                        $password       = md5($id_karyawan);

                        $file     = $_FILES['picture']['tmp_name'];
                        $filename = $_FILES['picture']['name'];
                        $dir      = "../upload/foto/";
                        $path     = $dir . $filename;

                        if (isset($_POST['save'])) {

                            // Query tanpa upload gamabar
                            if (empty($file)) {
                                $query->tambah_karyawan($id_karyawan,$nama_karyawan,$id_kantor,$id_jabatan,$no_rekening,$an_rekening,$email,$telepon,$jenis_kelamin,$alamat,$file);
                                $query->tambah_user($id_karyawan,$password);
                                 // Log Aktifitas
                                $query->log($_SESSION[id_user],'Menambahkan karyawan baru',$tgl_sekarang,$jam_sekarang);
                                echo "<script>window.location='admin.php?page=karyawan';</script>";
                            } else {

                                // Query dengan melakukan upload gambar
                                if (move_uploaded_file($file, $path)) {
                                   $query->tambah_karyawan($id_karyawan,$nama_karyawan,$id_kantor,$id_jabatan,$no_rekening,$an_rekening,$email,$telepon,$jenis_kelamin,$alamat,$filename);
                                   $query->tambah_user($id_karyawan,$password);
                                    // Log Aktifitas
                                $query->log($_SESSION[id_user],'Menambhakan karyawan baru',$tgl_sekarang,$jam_sekarang);
                                echo "<script>window.location='admin.php?page=karyawan';</script>";
                                }
                            }
                        }