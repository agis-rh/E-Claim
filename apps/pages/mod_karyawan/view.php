<?php
$module = 'Karyawan';
$role = $query->get_role($module);
if ($role[baca] == 'Y' OR $_SESSION['id_karyawan']=='admin') {
?>
    <div class="container-fluid padded">
        <div class="form-group">
        <?php
            if ($role[tambah] == 'Y' OR $_SESSION['id_karyawan']=='admin') {
            echo "<a href='?page=tambah_karyawan' class='btn btn-blue' style='margin:5px;'>Tambah Karyawan</a>";
        }
        ?>
        </div><br>

        <div class="row-fluid">
            <div class="box col">
                <div class="box-header"><span class="title">Daftar Karyawan</span></div>
                <div class="box-content">
                    <!-- find me in partials/data_tables_custom -->
                    <table cellpadding="0" cellspacing="0" border="0" class="dTable responsive dataTable" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
                        <thead>
                            <tr>
                                <td style="width: 5%">No</td>
                                <td style="width: 10%">ID Karyawan</td>
                                <td style="width: 30%">Nama</td>
                                <td style="width: 15%">Jabatan</td>
                                <td style="width: 15%">E-Mail</td>
                                <td style="width: 15%">Telepon</td>
                                <?php
                                if($role['edit'] OR $role['hapus'] OR $_SESSION['id_karyawan']=='admin'){
                                echo "<td style='width: 10%; text-align:center;'>Aksi</td>";
                            }
                            ?>
                            </tr>
                        </thead>
                        <tbody role="alert" aria-live="polite" aria-relevant="all">
                            <?php
                            if($_SESSION['level_user']=='admin'){
                                $data = $query->karyawan();
                            }elseif($_SESSION['level_user']=='head'){
                                $data = $query->group_karyawan($profil[id_kantor]);
                            }elseif($_SESSION['level_user']=='staf'){
                                $data = $query->self($_SESSION['id_karyawan']);
                            }
                            $no=1;
                            foreach ($data as $row) {

                                echo"<tr class='status-pending'>
                                      <td class='a-center '>$no</td>
                                      <td class=' '>$row[id_karyawan]</td>
                                       <td class=' '><a href='?page=detail_karyawan&id=$row[id_karyawan]'>$row[nama_karyawan]</a></td>
                                       <td class=' '>$row[nama_jabatan]</td>
                                       <td class=' '>$row[email]</td>
                                       <td class=' '>$row[telepon]</td>";
                                if($role[edit]=='Y' OR $_SESSION['id_karyawan']=='admin'){
                                     echo"<td class=' last' style='text-align:center;'>
                                    <a title='Edit' href='?page=edit_karyawan&&id=$row[id_karyawan]' class='btn btn-xs btn-green'><i class='icon-pencil'></i></a> ";
                                }
                                if($role[hapus]=='Y' OR $_SESSION['id_karyawan']=='admin'){
                                    echo "<a href='?page=karyawan&act=hapus&id=$row[id_karyawan]' title='Hapus'  class='btn btn-xs btn-red'><i class='icon-trash' onClick=\"return confirm('Apakah Anda yakin ingin menghapus karyawan $row[nama_karyawan] ?')\"></i></a>";
                                }
                                    echo "</td>
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



