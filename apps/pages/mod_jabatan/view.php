<div class="container-fluid padded">
    <div class="row-fluid">
        <div class="box">
            <div class="box-header">
                <div class="title">Jabatan</div>
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

                    <?php
                    if ($_GET['act'] == 'edit') {
                        $data = $query->get_jabatan($_GET['id']);
                        ?>

                        <div class="span6 separate-sections">
                            <form class="form-horizontal" method="POST" action="?page=aksi_jabatan">

                                <div class="form-group">
                                    <label class="control-label span3">Nama jabatan :</label>
                                    <div class="span9">
                                        <input type="hidden" name="id" value="<?php echo $data[id_jabatan]; ?>"> 
                                        <input type="text" name="nama_jabatan" value="<?php echo $data[nama_jabatan]; ?>" class="validate[required]" data-prompt-position="topLeft">
                                        <span class="help-block note"><i class="icon-required"></i></span><br>
                                    </div>
                                </div>

                                 <div class="form-group">
                                    <label class="control-label span3">Golongan :</label>
                                    <div class="span5"> 
                                        <select class="select2-container select2-container-multi chzn-select" name="golongan">
                                            <option value="0">Pilih Golongan</option>
                                            <?php
                                            // pilihan golongan
                                            $data_golongan = $query->golongan();
                                            foreach ($data_golongan as $row) {
                                                echo "<option value='" . $row['id_golongan'] . "'";
                                                echo $row['id_golongan'] == $data['id_golongan'] ? 'selected' : '';
                                                echo ">$row[nama_golongan]";
                                                echo "</option>";
                                            }
                                            ?>
                                        </select>
                                        <span class="help-block note"><i class="icon-required"></i></span><br>
                                    </div>
                                </div>
                               
                                

                                <div class="span4 separate-sections" style="margin-top: 100px;">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-blue" name="edit">Simpan</button>
                                        <button type="button" class="btn btn-default">Batal</button>
                                    </div>
                                </div>
                            </form>
                        </div>


<?php } else { ?>

                        <div class="span6 separate-sections">
                            <form class="form-horizontal" method="POST" action="?page=aksi_jabatan">
                                <div class="form-group">
                                    <label class="control-label span3">Nama jabatan :</label>
                                    <div class="span9">
                                        <input type="text" name="nama_jabatan" class="validate[required]" data-prompt-position="topLeft">
                                        <span class="help-block note"><i class="icon-required"></i></span><br>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label span3">Golongan :</label>
                                    <div class="span5">
                                        <select class="select2-container select2-container-multi chzn-select" name="golongan">
                                            <option value="0">Pilih Golongan</option>
                                            <?php
                                            // pilihan golongan
                                            $data_golongan = $query->golongan();
                                            foreach ($data_golongan as $row) {
                                                echo" <option value='$row[id_golongan]'>$row[nama_golongan]</option>";
                                            }
                                            ?>
                                        </select>
                                        <span class="help-block note"><i class="icon-required"></i></span><br>
                                    </div>
                                </div>

                                <div class="span4 separate-sections" style="margin-top: 100px;">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-blue" name="save">Simpan</button>
                                        <button type="button" class="btn btn-default">Batal</button>
                                    </div>
                                </div>
                            </form>
                        </div>

<?php } ?>

                    <div class="span6 separate-sections">
                        <form class="form-horizontal fill-up validatable">
                            <div class="box">
                                <div class="box-content">
                                    <table class="table dTable responsive dataTable" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
                                        <thead>
                                            <tr>
                                                <td style="width: 8%"><input type="checkbox" id="check-all"></td>
                                                <td style="width: 57%">Nama jabatan</td>
                                                <td style="width: 10%">Golongan</td>
                                                <td style="width: 25%; text-align:center;">Aksi</td>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            $data = $query->jabatan();
                                            foreach ($data as $row) {

                                                echo"<tr class='status-pending'>
                              <td class='a-center '><input type='checkbox' class='flat' name='table_records' ></td>
                               <td class=' '>$row[nama_jabatan]</td>";

                                                echo "<td class=' '>$row[nama_golongan] </td>";

                                                echo"<td class=' last' style='text-align:center;'>
                                    <a title='Edit' href='?page=jabatan&act=edit&id=$row[id_jabatan]' class='btn btn-xs btn-green'><i class='icon-pencil'></i></a>
                                    <a href='?page=jabatan&act=hapus&id=$row[id_jabatan]' title='Hapus'  class='btn btn-xs btn-red'><i class='icon-trash' onClick=\"return confirm('Apakah Anda yakin ingin menghapus jabatan $row[nama_jabatan] ?')\"></i></a>
                                    </td>
                                </tr>";
                                            }
                                            ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>       
                        </form>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>


<?php
// Proses Hapus
if ($_GET['act'] == 'hapus') {
    $id = $_GET['id'];
    $query->delete_jabatan($id);
     // Log Aktifitas
     $query->log($_SESSION[id_user],'Menghapus jabatan ',$tgl_sekarang,$jam_sekarang);
    echo "<script>window.location='?page=jabatan';</script>";
}