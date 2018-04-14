
<div class="container-fluid padded">
    <div class="form-group">
        <a href="?page=tambah_kantor" class="btn btn-blue">Tambah Kantor</a>
    </div><br>

    <div class="row-fluid">
        <div class="box col">
            <div class="box-content">
                <!-- find me in partials/data_tables_custom -->
                <table class="table dTable responsive dataTable" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
                                        <thead>
                                            <tr>
                                                <td style="width: 8%">No. </td>
                                                <td style="width: 10%">ID Kantor</td>
                                                <td style="width: 52%">Nama Kantor</td>
                                                <td style="width: 20%">Kepala Kantor</td>
                                                <td style="width: 20%; text-align:center;">Aksi</td>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            $no=1;
                                            $data = $query->kantor();
                                            foreach ($data as $row) {

                                                echo"<tr class='status-pending'>
                                                <td class='a-center '>$no</td>
                                                <td class=' '>$row[id_kantor]</td>
                                                <td class=' '>$row[nama_kantor]</td>
                                                <td class=' '>$row[approval]</td>";

                                                echo"<td class=' last' style='text-align:center;'>
                                    <a title='Edit' href='?page=edit_kantor&&id=$row[id_kantor]' class='btn btn-xs btn-green'><i class='icon-pencil'></i></a>
                                    <a href='?page=kantor&act=hapus&id=$row[id_kantor]' title='Hapus'  class='btn btn-xs btn-red'><i class='icon-trash' onClick=\"return confirm('Apakah Anda yakin ingin menghapus kantor $row[nama_kantor] ?')\"></i></a>
                                    </td>
                                </tr>";

                                $no++;
                                            }
                                            ?>

                                        </tbody>
                                    </table>            </div>
        </div>
    </div>
</div>



<?php
// Proses Hapus
if ($_GET['act'] == 'hapus') {
    $id = $_GET['id'];
    $query->delete_kantor($id);
     // Log Aktifitas
    $query->log($_SESSION[id_user],'Menghapus kantor',$tgl_sekarang,$jam_sekarang);
    echo "<script>window.location='?page=kantor';</script>";
}
