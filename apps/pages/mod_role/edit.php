<?php
$id = $_GET['id'];
$row = $query->get_module($id);
?>

<div class="container-fluid padded">
    <div class="row-fluid">
        <div class="span12">
            <form method="POST" action="">

                <div class="box">
                    <div class="box-header">
                        <div class="title">Management Role</div>
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
                            <div class="span6">
                                <ul class="chat-box timeline">
                                    <li class="arrow-box-left gray">
                                        <div class="avatar"><img class="avatar-small" src="../assets/img/user.png" /></div>
                                        <div class="info">
                                            <span class="name">
                                                <span class="label label-green">INFO</span>
                                            </span>
                                            <span class="time"><i class="icon-cog"></i></span>
                                        </div>
                                        <div class="content">
                                            <blockquote>
                                                <strong>READ &nbsp; &nbsp; :</strong> Mengijinkan user untuk melihat data tanpa bisa mengelola / merubahnya.<br>
                                                <strong>CREATE :</strong> Mengatur user agar bisa menambahkan data (input data).<br>
                                                <strong>UPDATE :</strong> Mengijinkan user agar bisa merubah data yang telah disimpan.<br>
                                                <strong>DELETE :</strong> Mengijinkan user agar memiliki hak untuk bisa menghapus data.<br>
                                                <div><br><br>
                                                    <a href="#"><i class="icon-bookmark"></i> Pengelolaan Role Module: <strong><?php echo $row[nama_module]; ?></strong></a>
                                                </div>
                                        </div>
                                    </li>
                            </div>
                            <div class="span2 separate-sections" style="margin-top: 20px;">
                                <div class="row-fluid">
                                    <div class="span12">
                                        <div class="dashboard-stats">
                                            <ul class="inline">
                                                <li class="count"><h4><?php echo $row[nama_module]; ?></h4></li>
                                            </ul>
                                            <hr>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="span4">
                                <table class="table" border="0" style="margin-top:70px;">
                                    <tbody>
                                    <input type="hidden" name="id" value="<?php echo $row[id_module]; ?>">
                                    <tr class="status-pending">
                                        <td style="width:10%;"><input type="checkbox" value="Y" <?php if ($row[baca] == 'Y') {
    echo 'checked';
} ?> name="read"></td>
                                        <td>Read</td>
                                    </tr>
                                    <tr class="status-pending">
                                        <td style="width:10%;"><input type="checkbox" value="Y" <?php if ($row[tambah] == 'Y') {
    echo 'checked';
} ?> name="create"></td>
                                        <td>Create</td>
                                    </tr>
                                    <tr class="status-pending">
                                        <td style="width:10%;"><input type="checkbox" value="Y" <?php if ($row[edit] == 'Y') {
    echo 'checked';
} ?> name="update"></td>
                                        <td>Update</td>
                                    </tr>
                                    <tr class="status-pending">
                                        <td style="width:10%;"><input type="checkbox" value="Y" <?php if ($row[hapus] == 'Y') {
    echo 'checked';
} ?> name="delete"></td>
                                        <td>Delete</td>
                                    </tr>
                                    </tbody>
                                </table>

                                <div class="form-group" style="margin-top:30px; text-align:right;">
                                    <button type="submit" name="save" class="btn btn-blue">Simpan</button>
                                    <button type="button" class="btn btn-default">Batal</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
$id = $_POST['id'];
$c = $_POST['create'];
$r = $_POST['read'];
$u = $_POST['update'];
$d = $_POST['delete'];
if (isset($_POST['save'])) {
    $query->active_role($id, $c, $r, $u, $d);
    // Log Aktifitas
    $query->log($_SESSION[id_user],'Mengelola hak akses user (user role)',$tgl_sekarang,$jam_sekarang);
    echo "<script>window.location='admin.php?page=role';</script>";
}



