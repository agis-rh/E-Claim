 <?php
 $id_u = $_GET['id_user'];
 $u = $query->get_user($id_u);
 ?>
 <div class="container-fluid padded">
                    <div class="box">
                        <div class="box-header">
                            <div class="title">Profile</div>
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
                                            <label class="control-label span2">Nama Lengkap :</label>
                                            <div class="span10">
                                                <input type="hidden" name="id" value="<?php echo $u[id_user]; ?>">
                                                <input type="text" name="nama" value="<?php echo $u[nama_lengkap]; ?>" class="validate[required]" data-prompt-position="topLeft">
                                                <span class="help-block note"><i class="icon-required"></i></span><br>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                        <label class="control-label span2">Jenis Kelamin :</label>
                                        <div class="span10">
                                            <div class="span6">
                                                <div class="dashboard-stats small">
                                                    <ul class="inline">
                                                        <li class="glyph"><input type="radio" value="L" <?php if ($u[jenis_kelamin] == 'L') {
                                                                echo "checked";
                                                            } ?> name="jk"></li>
                                                        <li>Laki-laki</li>
                                                        <li class="glyph"><input type="radio" value="P" <?php if ($u[jenis_kelamin] == 'P') {
                                                                echo "checked";
                                                            } ?> name="jk"></li>
                                                        <li>Perempuan</li>
                                                    </ul>
                                                </div>
                                                <span class="help-block note"><br><i class="icon-required"></i></span><br>
                                            </div>
                                        </div>
                                        </div>
                                       

                                        <div class="form-group">
                                            <label class="control-label span2">E-mail :</label>
                                            <div class="span10">
                                                <input type="email" name="email" value="<?php echo $u[user_email]; ?>" class="validate[required]" data-prompt-position="topLeft">
                                                <span class="help-block note"><i class="icon-required"></i></span><br>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label span2">Telepon :</label>
                                            <div class="span10">
                                                <input type="text" name="telepon" value="<?php echo $u[user_phone]; ?>" class="validate[required]" data-prompt-position="topLeft">
                                                <span class="help-block note"><i class="icon-required"></i></span><br>
                                            </div>
                                        </div>

                                                <div class="form-group">
                                                    <label class="control-label span2">Foto :</label>
                                                    <div class="span4">
                                                        <div class="uploader"><input type="file" name="picture"><span class="filename" style="user-select: none;">No file selected
                                                            </span><span class="action" style="user-select: none;">+</span></div>
                                                        <?php
                                                        if ($u['user_image'] != '') {
                                                            echo "<a href='#' style='margin-top:10px;'' class='thumbnail'>
                                                                    <img src='../picture/users/$u[user_image]' alt='' />
                                                                  </a>                       
                                                                <span class='help-block note'><br>Foto : $u[user_image].</span><br>";
                                                        } else {
                                                            echo "<a href='#' style='margin-top:10px;'' class='thumbnail'>
                                                                    <img src='../assets/img/no_image.png' alt='' />
                                                                  </a>                       
                                                                <span class='help-block note'><br>Tidak ada foto.</span><br>";
                                                        }
                                                        ?>

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
                        $id         = $_POST['id'];
                        $nama       = $_POST['nama'];
                        $jk         = $_POST['jk'];
                        $email      = $_POST['email'];
                        $telepon    = $_POST['telepon'];

                        $file     = $_FILES['picture']['tmp_name'];
                        $filename = $_FILES['picture']['name'];
                        $dir      = "../picture/users/";
                        $path     = $dir . $filename;

                        if (isset($_POST['save'])) {

                            // Query tanpa upload gamabar
                            if (empty($file)) {
                                $query->edit_profile1($id,$nama,$jk,$email,$telepon);
                                 // Log Aktifitas
                                $query->log($_SESSION[id_user],'Memperbaharui profil',$tgl_sekarang,$jam_sekarang);
                                echo "<script>window.location='admin.php?page=profile';</script>";
                            } else {

                                $thumb = $query->get_user($id);
                                if ($thumb['user_image'] != '') {
                                    unlink("../picture/users/$thumb[user_image]");
                                }

                                // Query dengan melakukan upload gambar
                                if (move_uploaded_file($file, $path)) {
                                    $query->edit_profile($id,$nama,$jk,$email,$telepon,$filename);
                                     // Log Aktifitas
                                    $query->log($_SESSION[id_user],'Memperbaharui profil',$tgl_sekarang,$jam_sekarang);
                                echo "<script>window.location='admin.php?page=profile';</script>";
                                }
                            }
                        }