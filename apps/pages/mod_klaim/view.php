<?php
$module = 'Klaim';
$status = $_GET[status];
$role = $query->get_role($module);
if ($role[baca] == 'Y' OR $_SESSION['id_karyawan']=='admin') {
?>
    <div class="container-fluid padded">
        <div class="form-group">
        <?php
            if ($role[tambah] == 'Y' AND $_SESSION['id_karyawan']!='admin') {
            echo "<a href='?page=tambah_klaim' class='btn btn-blue' style='margin:5px;'>Tambah Transaksi</a>";
        }
        ?>
        </div><br>

          <div class="row-fluid">
            <div class="box col">
                <div class="box-header"><span class="title">Transaksi</span></div>
                <div class="box-content">
                    <!-- find me in partials/data_tables_custom -->
                    <table cellpadding="0" cellspacing="0" border="0" class="dTable responsive dataTable" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
                        <thead>
                            <tr>
                                <td style="width: 5%">No</td>
                                <td style="width: 10%">ID Transaksi</td>
                                <td style="width: 30%">Nama</td>
                                <td style="width: 10%">Tanggal</td>
                                <td style="width: 5%; text-align:center;">Status</td>
                                <td style='width: 5%; text-align:center;'>Aksi</td>
                            </tr>
                        </thead>
                        <tbody role="alert" aria-live="polite" aria-relevant="all">
                         <?php
                            $no=1;
                            if($_SESSION['level_user']=='head'){
                                if(!empty($status)){
                                    $data = $query->status_klaim_head($_SESSION['id_karyawan'],$status);
                                }else{
                                    $data = $query->klaim_head($_SESSION['id_karyawan']);
                                }
                            }elseif($_SESSION['level_user']=='staf'){
                            $data = $query->klaim_staf($_SESSION['id_karyawan']);
                            }else{
                                if(!empty($status)){
                                $data = $query->status_klaim($status);
                                }else{
                                $data = $query->klaim();
                                }
                            }
                            foreach ($data as $row) {

                                echo"<tr class='status-pending'>
                                <td class='a-center '>$no</td>
                                <td class=' '>$row[no_letter]</td>
                                <td class=' '>$row[nama_karyawan]</td>
                                <td class=' '>$row[tanggal_pengajuan]</td>";

                                if($row['status']=='pending'){
                                    $badge = "warning";
                                }elseif($row['status']=='reject'){
                                    $badge = "danger";
                                }elseif($row['status']=='verify'){
                                    $badge = "info";
                                }elseif($row['status']=='approved'){
                                    $badge = "success";
                                }

                                echo "<td style='text-align:center;'><span class='badge badge-$badge' style='padding:2 2 2 10px'>$row[status]</span></td>";


                                echo"<td class=' last' style='text-align:center;'>
                                <a title='Edit' href='?page=detail_klaim&id=$row[no_letter]' class='btn btn-xs btn-info'><i class='icon-eye-open'></i> Lihat</a>
                                </td>
                            </tr>";

                $no++;
                            }
                            ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

    <?php
}
?>



















    <?php
    $id = $_GET['id'];
       if ($_GET['act'] == 'hapus') {
        $data = $query->get_karyawan($id);
        if ($data['foto'] != '') {
            unlink("../upload/foto/$data[foto]");

            $query->delete_karyawan($id);
             // Log Aktifitas
            $query->log($_SESSION[id_user],'Menghapus seorang karyawan',$tgl_sekarang,$jam_sekarang);
            echo "<script>window.location='?page=karyawan';</script>";
        } else {
            $query->delete_karyawan($id);
             // Log Aktifitas
             $query->log($_SESSION[id_user],'Menghapus seorang karyawan',$tgl_sekarang,$jam_sekarang);
            echo "<script>window.location='?page=karyawan';</script>";
        }
    }



