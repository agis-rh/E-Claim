<?php
$noletter  = date('YmdHis');
$data = $query->detail_karyawan($profil[id_karyawan]);
?>
<script type="text/javascript">
            $(document).ready(function() {
                $('#bayar').keyup(function(){

                var bayar=parseInt($('#bayar').val());
     
                // Perhitungan pajak
                var total_pajak=(<?php echo $data[pajak]; ?>*bayar)/100;
                var total_bayar=bayar+total_pajak;
                $('#pajak').val(total_pajak);
                $('#Tbayar').html(total_bayar);
                });
            });
</script>
 <div class="container-fluid padded">
                    <div class="box">
                        <div class="box-header">
                            <div class="title">Tambah Transaksi</div>
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
                                    <label class="control-label span2" style="margin-top: 15px">No. Transaksi :</label>
                                    <div class="span10">
                                    <div class="span5">
                                     <h3 style="color:#3a87ad; padding: 0"><?php echo $noletter; ?></h3>
                                        <input type="hidden" name="noletter" value="<?php echo $noletter; ?>">
                                    </div>
                                    </div>
                                </div>

                                        <div class="form-group">
                                            <label class="control-label span2" style="margin-top: 5px">ID Karyawan :</label>
                                            <div class="span10">
                                             <input type="hidden" name="id_karyawan" value="<?php echo $profil[id_karyawan]; ?>">
                                              <h5><?php echo $profil[id_karyawan]; ?></h5><br>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label span2" style="margin-top: 5px">Golongan :</label>
                                            <div class="span10">
                                              <h5><?php echo $data[nama_golongan]; ?></h5><br>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label span2" style="margin-top: 5px">Nama Lengkap :</label>
                                            <div class="span10">
                                              <h5><?php echo $profil[nama_karyawan]; ?></h5><br>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label span2">Tanggal Berobat :</label>
                                             <div class="span10">
                                                <div class="span5">
                                                <input type="date" name="tgl_berobat" class="datepicker" data-prompt-position="topLeft">
                                                <span class="help-block note"><i class="icon-required"></i></span><br>
                                            </div>
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="control-label span2">Diagnosa :</label>
                                            <div class="span10">
                                                <textarea  rows="6" name="diagnosa"></textarea>
                                                <span class="help-block note"><i class="icon-required"></i></span><br>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label span2">Biaya (Rp.) :</label>
                                             <div class="span10">
                                                <div class="span5">
                                                <input type="text" name="bayar" id="bayar" class="validate[required] biaya" data-prompt-position="topLeft">
                                                <span class="help-block note"><i class="icon-required"></i></span><br>
                                            </div>
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="control-label span2">Pajak (<?php echo $data[pajak]. "%"; ?>) :</label>
                                            <div class="span10">
                                                <div class="span5">
                                                <input type="text" name="pajak" readonly="readonly" id="pajak" class="pajak validate[required]" data-prompt-position="topLeft">
                                                <span class="help-block note"><i class="icon-required"></i></span><br>
                                            </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label span2" style="margin-top: 5px">Total (Rp.) :</label> 
                                            <div class="span10">
                                             <div class="span5">
                                              <h4 id="Tbayar" style="color:#3a87ad;">Rp. </h4><br>
                                              </div>
                                            </div>
                                        </div>

                                    <div class="form-group">
                                        <label class="control-label span2">File :</label>
                                        <div class="span4">
                                            <div class="uploader"><input type="file" name="picture"><span class="filename" style="user-select: none;">No file selected
                                                </span><span class="action" style="user-select: none;">+</span></div>
                                            <span class="help-block note"><br><i class="icon-required"></i>File unggahan.</span><br>
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
                        // Data
                        $rate     = $data[pajak];
                        $approval = $data[approval];
                        function change_date($tanggal){
                            $explode = explode('/', $tanggal);
                            $array   = array($explode[2], $explode[0], $explode[1]);
                            $implode = implode('-', $array);

                            return $implode;
                        }
                        ///////////////////////////////////
                        $no_letter      = $_POST['noletter'];
                       	$id_karyawan    = $_POST['id_karyawan'];
                        $tgl_pengajuan  = date('Y-m-d');
                        $tgl_pengobatan = change_date($_POST['tgl_berobat']);
                        $diagnosa       = $_POST['diagnosa'];
                        $biaya          = $_POST['bayar'];
                        $pajak          = $_POST['bayar']*$rate/100;
                        $total          = $_POST['bayar']+$pajak;
                      

                        $file     = $_FILES['picture']['tmp_name'];
                        $filename = $_FILES['picture']['name'];
                        $dir      = "../upload/document/";
                        $path     = $dir . $filename;

                        if (isset($_POST['save'])) {

                            // Query tanpa upload gamabar
                            if (empty($file)) {
                                $query->tambah_transaksi($no_letter,$id_karyawan,$tgl_pengajuan,$tgl_pengobatan,$diagnosa,$biaya,$pajak,$total,$file,$approval);
                                 // Log Aktifitas
                                $query->log($_SESSION[id_user],'Mengajukan klaim baru',$tgl_sekarang,$jam_sekarang);
                                echo "<script>window.location='admin.php?page=klaim';</script>";
                            } else {
                                // Query dengan melakukan upload gambar
                                if (move_uploaded_file($file, $path)) {
                                   $query->tambah_transaksi($no_letter,$id_karyawan,$tgl_pengajuan,$tgl_pengobatan,$diagnosa,$biaya,$pajak,$total,$filename,$approval);
                                    // Log Aktifitas
                                $query->log($_SESSION[id_user],'Mengajukan klaim baru',$tgl_sekarang,$jam_sekarang);
                                echo "<script>window.location='admin.php?page=klaim';</script>";
                                }
                            }
                        }