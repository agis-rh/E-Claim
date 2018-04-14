
    <div class="container-fluid padded">

        <div class="row-fluid">
            <div class="box col">
                <div class="box-header"><span class="title">Daftar User</span></div>
                <div class="box-content">
                    <!-- find me in partials/data_tables_custom -->
                    <table cellpadding="0" cellspacing="0" border="0" class="dTable responsive dataTable" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
                        <thead>
                            <tr>
                                <td style="width: 5%">No</td>
                                <td style="width: 10%">ID Karyawan</td>
                                <td style="width: 25%">Nama</td>
                                <td style="width: 10%">Level</td>
                                <td style="width: 5%; text-align:center;">Blokir</td>
                                <td style='width: 10%; text-align:center;'>Aksi</td>
                            </tr>
                        </thead>
                        <tbody role="alert" aria-live="polite" aria-relevant="all">
                            <?php
                            $data = $query->view_user();
                            $no=1;
                            foreach ($data as $row) {

                                echo"<tr class='status-pending'>
                                      <td class='a-center '>$no</td>
                                      <td class=' '>$row[id_karyawan]</td>
                                       <td class=' '>$row[nama_karyawan]</td>
                                       <td class=' '>$row[level]</td>";
                                if ($row[blokir] == 'Y') {
                                        echo "<td class='icon status-info' style='text-align:center;'><i class='icon-ok'></i></td>";
                                                } else {
                                        echo "<td class='icon status-error' style='text-align:center;'><i class='icon-remove'></i></td>";
                                                }       
                                if($row[blokir] == 'N'){
                      
                                    echo"<td class=' last' style='text-align:center;'>
                                    <a title='Edit' href='?page=list_user&act=blokir&id=$row[id_user]' class='btn btn-xs btn-blue'>Blokir</a>";
                                }else{
                                    echo"<td class=' last' style='text-align:center;'>
                                    <a title='Edit' href='?page=list_user&act=unblokir&id=$row[id_user]' class='btn btn-xs btn-green'>Unblokir</a>";
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
    $id = $_GET['id'];

    if ($_GET['act'] == 'blokir') {
    $query->blokir($id);
     // Log Aktifitas
    $query->log($_SESSION[id_user],'Memblokir seorang pengguna (user)',$tgl_sekarang,$jam_sekarang);
    echo "<script>window.location='?page=list_user';</script>";
      } 
      else
      if ($_GET['act'] == 'unblokir') {
         $query->unblokir($id);
          // Log Aktifitas
         $query->log($_SESSION[id_user],'Mengaktifkan kembali seorang pengguna yang diblokir',$tgl_sekarang,$jam_sekarang);
         echo "<script>window.location='?page=list_user';</script>";
      }
      else
       if ($_GET['act'] == 'hapus') {
        $data = $query->get_user($id);
        if ($data['user_image'] != '') {
            unlink("../picture/users/$data[user_image]");

            $query->hapus_user($id);
             // Log Aktifitas
            $query->log($_SESSION[id_user],'Menghapus seorang pengguna (user)',$tgl_sekarang,$jam_sekarang);
            echo "<script>window.location='?page=list_user';</script>";
        } else {
            $query->hapus_user($id);
             // Log Aktifitas
             $query->log($_SESSION[id_user],'Menghapus seorang pengguna (user)',$tgl_sekarang,$jam_sekarang);
            echo "<script>window.location='?page=list_user';</script>";
        }
    }



