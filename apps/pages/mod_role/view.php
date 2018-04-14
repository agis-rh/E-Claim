
<div class="container-fluid padded">
    <div class="row-fluid">
        <div class="box col">
            <div class="box-content">
                <!-- find me in partials/data_tables_custom -->
                <table cellpadding="0" cellspacing="0" border="0" class="table table-normal responsive">
                    <thead>
                        <tr>
                            <td style="width: 5%">No.</td>
                            <td style="width: 40%">Nama Module</td>
                            <td style="width: 10%">Read</td>
                            <td style="width: 10%">Create</td>
                            <td style="width: 10%">Update</td>
                            <td style="width: 10%">Delete</td>
                            <td style="width: 15%; text-align:center;">Aksi</td>
                        </tr>
                    </thead>
                    <tbody role="alert" aria-live="polite" aria-relevant="all">
                        <?php
                        // Query untuk mencari menu      
                        $main = mysql_query("SELECT * FROM module WHERE parent_id = '0' ORDER by ordering");
                        while ($r = mysql_fetch_array($main)) {

                            if ($r[baca] == 'Y') {
                                echo "<tr class='status-success'>";
                                echo "<td style='text-align:center;'><i class='icon-unlock'></i></td>";
                            } else {
                                echo "<tr class='status-info'>";
                                echo "<td style='text-align:center;'><i class='icon-lock'></i></td>";
                            }

                            echo "<td>$r[nama_module] </td>";
                            if ($r[baca] == 'Y') {
                                echo "<td colspan='4' style='text-align:center;'>Role $r[nama_module] sudah diaktifkan....</td>";
                            } else {
                                echo "<td colspan='4' style='text-align:center;'>Untuk mengelola role silahkan aktifkan !</td>";
                            }
                            echo"<td class=' last' style='text-align:center;'>";
                            if ($r[baca] == 'Y') {
                                echo "<a title='non aktifkan' href='?page=role&act=non_active&id=$r[id_module]' class='btn btn-green'>Non Aktifkan</a>";
                            } else {
                                echo "<a title='aktifkan' href='?page=role&act=active&id=$r[id_module]' class='btn btn-blue'>Aktifkan</a>";
                            }

                            echo"</td>";

                            echo "</tr>";

                            if ($r[baca] == 'Y') {

                                // Query untuk mencari sub menu  
                                $sub = mysql_query("SELECT * FROM module WHERE parent_id = $r[id_module] AND parent_id !='0' ORDER BY nama_module ASC");
                                $jml = mysql_num_rows($sub);
                                // apabila sub menu ditemukan
                                echo "<tr>";
                                if ($jml > 0) {

                                    while ($w = mysql_fetch_array($sub)) {
                                        echo "<tr>";
                                        echo "<td style='text-align:center;'>- </td>";
                                        echo "<td>$w[nama_module] </td>";
                                        if ($w[baca] == 'Y') {
                                            echo "<td class='icon status-info' style='text-align:center;'><i class='icon-ok'></i></td>";
                                        } else {
                                            echo "<td class='icon status-error' style='text-align:center;'><i class='icon-remove'></i></td>";
                                        }

                                        if ($w[tambah] == 'Y') {
                                            echo "<td class='icon status-info' style='text-align:center;'><i class='icon-ok'></i></td>";
                                        } else {
                                            echo "<td class='icon status-error' style='text-align:center;'><i class='icon-remove'></i></td>";
                                        }

                                        if ($w[edit] == 'Y') {
                                            echo "<td class='icon status-info' style='text-align:center;'><i class='icon-ok'></i></td>";
                                        } else {
                                            echo "<td class='icon status-error' style='text-align:center;'><i class='icon-remove'></i></td>";
                                        }

                                        if ($w[hapus] == 'Y') {
                                            echo "<td class='icon status-info' style='text-align:center;'><i class='icon-ok'></i></td>";
                                        } else {
                                            echo "<td class='icon status-error' style='text-align:center;'><i class='icon-remove'></i></td>";
                                        }

                                        echo"<td class=' last' style='text-align:center;'>
                                    <a title='Kelola Role' href='?page=edit_role&id=$w[id_module]' class='btn btn-default'>Kelola Role
                                    </td>";
                                    }

                                    echo "</tr>";
                                } else {
                                    echo "</tr>";
                                }
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



<?php
if ($_GET['act'] == 'active') {
    $active = 'Y';

    $id = $_GET['id'];
    $query->active_role($id, $active, $active, $active, $active);
     // Log Aktifitas
    $query->log($_SESSION[id_user],'Mengaktifkan suatu hak akses',$tgl_sekarang,$jam_sekarang);
    echo "<script>window.location='?page=role';</script>";
} elseif ($_GET['act'] == 'non_active') {
    $non_active = 'N';

    $id = $_GET['id'];
    $query->active_role($id, $non_active, $non_active, $non_active, $non_active);
    $query->nonactive_role($id);
     // Log Aktifitas
     $query->log($_SESSION[id_user],'Me-non aktifkan suatu hak akses',$tgl_sekarang,$jam_sekarang);
    echo "<script>window.location='?page=role';</script>";
}
