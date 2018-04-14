
<div class="container-fluid padded">
    <div class="form-group">
        <a href="?page=tambah_module" class="btn btn-blue">Tambah Module</a>
    </div><br>

    <div class="row-fluid">
        <div class="box col">
            <div class="box-content">
                <!-- find me in partials/data_tables_custom -->
                <table cellpadding="0" cellspacing="0" border="0" class="table table-normal responsive">
                    <thead>
                        <tr>
                            <td style="width: 5%">No.</td>
                            <td style="width: 40%">Nama Module</td>
                            <td style="width: 20%">Path</td>
                            <td style="width: 5%">Icon</td>
                            <td style="width: 20%">URL</td>
                            <td style="width: 10%; text-align:center;">Aksi</td>
                        </tr>
                    </thead>

                    <tbody role="alert" aria-live="polite" aria-relevant="all">
                        <?php
                        // Query untuk mencari menu  
                        $no = 1;
                        $main = mysql_query("SELECT * FROM module WHERE parent_id = '0' ORDER by ordering");
                        while ($r = mysql_fetch_array($main)) {

                            echo "<tr class='status-info'>";
                            echo "<td style='text-align:center;'>$no </td>";
                            echo "<td>$r[nama_module] </td>";
                            echo "<td><i>none</i> </td>";
                            echo "<td style='text-align:center;'><i class='$r[icon]'></i></td>";
                            echo "<td style='text-align:center;'>#</td>";
                            echo"<td class=' last' style='text-align:center;'>
                                    <a title='Edit Main Module' href='?page=edit_parent&id=$r[id_module]' class='btn btn-blue'>Edit Main</a>
                                    </td>";

                            echo "</tr>";

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
                                    echo "<td>backoffice/pages/$w[dir] </td>";
                                    echo "<td style='text-align:center;'><i class='$w[icon]'></td>";
                                    echo "<td><a href='?page=$w[url]'>admin.php?page=$w[url]</a></td>";
                                    echo"<td class=' last' style='text-align:center;'>
                                    <a title='Edit Sub Module' href='?page=edit_module&id=$w[id_module]' class='btn btn-xs btn-green'><i class='icon-pencil'></i></a>
                                    <a href='?page=module&act=hapus&id=$w[id_module]' title='Hapus Sub Module'  class='btn btn-xs btn-red'><i class='icon-trash' onClick=\"return confirm('Apakah Anda yakin ingin menghapus sub module $w[nama_module] ?')\"></i></a>
                                    </td>";
                                }

                                echo "</tr>";
                            } else {
                                echo "</tr>";
                            }

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
// Proses Hapus
if ($_GET['act'] == 'hapus') {
    $id = $_GET['id'];
    $query->hapus_module($id);
     // Log Aktifitas
    $query->log($_SESSION[id_user],'Menghapus module',$tgl_sekarang,$jam_sekarang);
    echo "<script>window.location='?page=module';</script>";
}
