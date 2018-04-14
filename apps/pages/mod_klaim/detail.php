<?php
$noletter = $_GET['id'];
$data     = $query->detail_klaim($noletter);
$karyawan = $query->get_karyawan($data['id_karyawan']);
$jabatan  = $query->get_jabatan($karyawan['id_jabatan']);
$golongan = $query->get_golongan($jabatan['id_golongan']);
function rupiah($angka)
{
    return 'Rp '. number_format($angka,2,',','.');
}
?>
<script type="text/javascript">
    $(document).ready(function(){
    $('.reason').hide();
    $('#reject').change(function(){
        if(this.checked)
            $('.reason').fadeIn('slow');
        else
            $('.reason').fadeOut('slow');

    });
    $('#pending').change(function(){
        if(this.checked)
            $('.reason').fadeOut('slow');

    });
    $('#verify').change(function(){
        if(this.checked)
            $('.reason').fadeOut('slow');

    });
    $('#approved').change(function(){
        if(this.checked)
            $('.reason').fadeOut('slow');

    });
});
</script>
 <div class="container-fluid padded">
 <div class="box">
                <div class="box-header">
                    <div class="title">Detail Request Claim</div>
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
                        <div class="span4 separate-sections" style="margin-top: 5px;">

                            <div class="row-fluid">
                                <div class="span12">
                                    <div class="dashboard-stats">
                                          <div class="stats-label">No. Transaksi</div>
                                            <li class="count" style="color:#3a87ad;"><?php echo $data[no_letter]; ?></li>
                                    </div>
                                </div>
                            </div>

                            <div class="row-fluid" style="margin-top:30px;">
                                <div class="span6">
                                    <div class="dashboard-stats small">
                                        <div class="stats-label">ID Karyawan</div>
                                        <i class="icon-tag"></i> <?php echo $data[id_karyawan]; ?>
                                    </div>
                                </div>

                                <div class="span6">
                                    <div class="dashboard-stats small">
                                        <div class="stats-label">Nama Karyawan</div>
                                        <i class="icon-user"></i> <?php echo $karyawan[nama_karyawan]; ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row-fluid" style="margin-top:30px;">
                                <div class="span6">
                                    <div class="dashboard-stats small">
                                        <div class="stats-label">Golongan</div>
                                        <i class="icon-list"></i> <?php echo $golongan[nama_golongan]; ?>
                                    </div>
                                </div>

                                <div class="span6">
                                    <div class="dashboard-stats small">
                                        <div class="stats-label">Tanggal Berobat</div>
                                        <i class="icon-calendar"></i> <?php echo tgl_indo($data[tanggal_pengobatan]); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="action-nav-normal" style="margin-top:30px;">

                                <div class="row-fluid">
                                    <div class="span6 action-nav-button">
                                        <a title="Biaya">
                                           Biaya :
                                            <span style="color:#3a87ad;"><?php echo rupiah($data[biaya]); ?></span>
                                        </a>
                                    </div>

                                    <div class="span6 action-nav-button">
                                        <a title="Pajak">
                                            Pajak (<?php echo $golongan[pajak]; ?>%) :
                                            <span style="color:#3a87ad;"><?php echo rupiah($data[pajak]); ?></span>
                                        </a>
                                    </div>
                                </div>

                                <div class="row-fluid">
                                    <div class="span12 action-nav-button">
                                        <a title="Total Biaya">
                                           Grand Total :
                                            <h4 style="color:#3a87ad;"><?php echo rupiah($data[total]); ?></h4>
                                        </a>
                                    </div>
                                </div>

                                <?php
                                if($data[status]=='approved'){
                                echo "<a href='pages/mod_klaim/print.php?noletter=$data[no_letter]&user=$_SESSION[id_karyawan]' target='_blank' class='btn btn-blue'><i class='icon-print'></i> Cetak</a>";
                                }
                                ?>

                            </div>


                        </div>

                        <div class="span8">
                                    <ul class="chat-box timeline">
                                       <li class="arrow-box-left gray">
                                <div class="avatar"><img class="avatar-small" src="../assets/img/user.png"></div>
                                <div class="info">
                                    <span class="name">
                                        <span class="label label-green">DIAGNOSA</span>  Catatan diagnosa yang disampaikan: <strong><?php echo $karyawan[nama_karyawan]; ?></strong>
                                    </span>
                                </div>
                                <div class="content">
                                    <blockquote>
                                        <?php echo $data[diagnosa]; ?>
                                    </blockquote>
                                    <div>
                                    <?php
                                    if($data[file]!=''){
                                        echo "<a href='../upload/document/$data[file]' target='_blank' title='Download File'><i class='icon-paper-clip'></i> <b>$data[file]</b></a>";
                                    }
                                    ?>
                                    </div>
                                </div>
                            </li>
                            </ul>

                            <?php
                            if($data[alasan]!=''){
                            ?>

                            <ul class="chat-box timeline">
                                <li class="arrow-box-left gray">
                                <div class="avatar"><img class="avatar-small" src="../assets/img/user.png"></div>
                                <div class="info">
                                    <span class="name">
                                        <span class="label label-red">ALASAN</span>  Alasan penolakan dari : <strong><?php echo $data[action_by]; ?></strong>
                                    </span>
                                </div>
                                <div class="content">
                                    <blockquote>
                                        <?php echo $data[alasan]; ?>
                                    </blockquote>
                                </div>
                            </li>
                            </ul>

                            <?php
                            }
                            if($_SESSION['id_karyawan']==$data[approval] AND ($data[status]!='approved' AND $data[status]!='reject')){
                            ?>

                            <div class="span8" style="margin-left: 60px">
                            <div class="box closable-chat-box">
                            <div class="box-content padded">

                                <div class="fields">
                                    <div class="avatar"><img class="avatar-small" src="../assets/img/user.png"></div>
                                    <ul>
                                        <li><b><a>Respon Permintaan Klaim...</a></b></li>
                                        <li class="note">Silahkan pilih salah satu tindakan dibawah ini !</li>
                                    </ul>
                                </div>
                                 <div class="fields">
                                <form class="fill-up" action="" method="POST">
                                <input type="hidden" name="noletter" value="<?php echo $data[no_letter]; ?>">
                                <input type="hidden" name="action_by" value="<?php echo $profil[nama_karyawan]; ?>">
                                    <div class="span12">
                                            <div class="dashboard-stats small">
                                                <ul class="inline">
                                                    <li class="glyph"><input type="radio" id="pending" <?php if($data[status]=='pending'){echo "checked";} ?> value="pending" name="status"></li>
                                                    <li>Pending</li>
                                                    <li class="glyph"><input type="radio" id="reject" <?php if($data[status]=='reject'){echo "checked";} ?> value="reject" name="status"></li>
                                                    <li>Reject</li>
                                                    <li class="glyph"><input type="radio" id="verify" <?php if($data[status]=='verify'){echo "checked";} ?> value="verify" name="status"></li>
                                                    <li>Verify</li>
                                                </ul>
                                            </div>
                                        </div>

                                         <textarea style="margin-top: 15px" name="reason" rows="5" class="reason" placeholder="Silahkan beri alasan penolakan !"></textarea>

                                       <div class="pull-right faded-toolbar" style="margin-top: 30px">
                                                <input type="submit" name="save" class="btn btn-blue btn-mini" value="Respon">
                                      </div>
                                
                                </form>
                                </div>
                                </div>
                                </div>
                                </div>
                                <?php
                                }elseif($_SESSION['id_karyawan']=='admin' AND $data[status]=='verify'){
                                ?>

                                <div class="span8" style="margin-left: 60px">
                            <div class="box closable-chat-box">
                            <div class="box-content padded">

                                <div class="fields">
                                    <div class="avatar"><img class="avatar-small" src="../assets/img/user.png"></div>
                                    <ul>
                                        <li><b><a>Respon Permintaan Klaim...</a></b></li>
                                        <li class="note">Silahkan pilih salah satu tindakan dibawah ini !</li>
                                    </ul>
                                </div>
                                 <div class="fields">
                                <form class="fill-up" action="" method="POST">
                                <input type="hidden" name="noletter" value="<?php echo $data[no_letter]; ?>">
                                <input type="hidden" name="action_by" value="Admin">
                                    <div class="span12">
                                            <div class="dashboard-stats small">
                                                <ul class="inline">
                                                    <li class="glyph"><input type="radio" id="pending" <?php if($data[status]=='pending'){echo "checked";} ?> value="pending" name="status"></li>
                                                    <li>Pending</li>
                                                    <li class="glyph"><input type="radio" id="reject" <?php if($data[status]=='reject'){echo "checked";} ?> value="reject" name="status"></li>
                                                    <li>Reject</li>
                                                    <li class="glyph"><input type="radio" id="verify" <?php if($data[status]=='verify'){echo "checked";} ?> value="verify" name="status"></li>
                                                    <li>Verify</li>
                                                    <li class="glyph"><input type="radio" id="approved" <?php if($data[status]=='approved'){echo "checked";} ?> value="approved" name="status"></li>
                                                    <li>Approved</li>
                                                </ul>
                                            </div>
                                        </div>

                                         <textarea style="margin-top: 15px" name="reason" rows="5" class="reason" placeholder="Silahkan beri alasan penolakan !"></textarea>

                                       <div class="pull-right faded-toolbar" style="margin-top: 30px">
                                                <input type="submit" name="save" class="btn btn-blue btn-mini" value="Respon">
                                                
                                      </div>
                                
                                </form>
                                </div>
                                </div>
                                </div>
                                </div>
                            

                                <?php
                                }
                                if($data[status]=='approved'){
                                    $icon = "icon-ok";
                                }elseif($data[status]=='reject'){
                                    $icon = "icon-remove";
                                }elseif($data[status]=='verify'){
                                    $icon = "icon-arrow-right";
                                }elseif($data[status]=='pending'){
                                    $icon = "icon-time";
                                    $note = "Menunggu respon...";
                                }
                                ?>


                            <div class="span8">
                            <div class="box-section news with-icons">
                            <div class="avatar cyan"><i class="<?php echo $icon; ?> icon-2x"></i></div>
                            <div class="news-content">
                                <div class="news-title"><a><?php echo ucwords($data[status]); ?></a></div>
                                <div class="news-text">
                                <span class="time">
                                <?php echo $note; ?>
                                 <?php 
                                if($data[action_by]!=''){
                                    echo "<i class='icon-time'></i> ".tgl_indo($data[tanggal_proses]);
                                    echo " (Oleh : $data[action_by])</span>";} ?>
                                </div>
                            </div>
                            </div>
                            </div>

                           


                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
$noletter       = $_POST['noletter'];
$status         = $_POST['status'];
$tanggal_proses = date('Y-m-d');
$alasan         = $_POST['reason'];
$action_by      = $_POST['action_by'];
if (isset($_POST['save'])) {
    $query->respons($noletter,$status,$tanggal_proses,$alasan,$action_by);
    // Log Aktifitas
    $query->log($_SESSION[id_user],'Merespon permintaan klaim',$tgl_sekarang,$jam_sekarang);
    echo "<script>window.location='admin.php?page=detail_klaim&id=$noletter';</script>";
 }

                        