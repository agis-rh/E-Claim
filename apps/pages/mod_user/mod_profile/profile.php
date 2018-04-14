<div class="container-fluid padded">
 

    <div class="row-fluid">
        <div class="span12">

            <ul class="chat-box timeline">
                <li class="arrow-box-left gray">
                    <div class="avatar"><img class="avatar-small" src="../assets/img/user.png" /></div>
                    <div class="info">
                        <span class="name">
                            <span class="label label-green"><?php echo "$profil[level]"; ?></span> <strong class="indent"><?php echo "$profil[nama_lengkap]"; ?></strong>
                        </span>
                    </div>
                    <div class="content">
                        <ul class="thumbnails padded">

                            <li class="span3">
                                <a href="#" class="thumbnail">
                                    <img src="<?php echo "../picture/users/$profil[user_image]"; ?>" alt="" />
                                </a>
                            </li>

                            <li class="span5">
                               <div class="action-nav-normal">
                                <div class="row-fluid">
                                 <div class="span6 action-nav-button">
                                        <a href="#" title="User">
                                            <i class="icon-user"></i>
                                            <span><?php echo "$profil[nama_lengkap]"; ?></span>
                                        </a>
                                        <span class="triangle-button red"><span class="inner"></span><i class="icon-plus"></i></span>
                                    </div>

                                    <div class="span6 action-nav-button">
                                        <a href="#" title="Artikel">
                                            <i class="icon-file-alt"></i>
                                            <?php
                                            $artikel_user = $query->total_user_artikel($_SESSION['id_user']);
                                            
                                            echo "<span>$artikel_user Kontribusi Artikel</span>";
                                            ?>
                                        </a>
                                       <span class="triangle-button blue"><span class="inner"></span><i class="icon-plus"></i></span>
                                    </div>

                                </div>

                                <div class="row-fluid">
                                    <div class="span6 action-nav-button">
                                        <a href="#" title="E-Mail">
                                            <i class="icon-envelope"></i>
                                            <span><?php echo "$profil[user_email]"; ?></span>
                                        </a>
                                         <span class="triangle-button green"><span class="inner"></span><i class="icon-plus"></i></span>
                                    </div>

                                    <div class="span6 action-nav-button">
                                        <a href="#" title="Phone Number">
                                            <i class="icon-phone"></i>
                                            <span><?php echo "$profil[user_phone]"; ?></span>
                                        </a>
                                        <span class="triangle-button orange"><span class="inner"></span><i class="icon-plus"></i></span>
                                    </div>
                                </div>

                            </div>
                            </li>


                        </ul>
                        <div class="clearfix actions">
                        <span class="note"><i class="icon-time"></i> <?php 
                        $t = waktu_indo($profil['last_login']);
                        echo "Login terakhir : $t"; ?></span>
                        <div class="pull-right faded-toolbar">
                            <a href="?page=edit_profile&id_user=<?php echo "$profil[id_user]"; ?>" class="btn btn-blue btn-mini">Edit Profil</a>
                        </div>
                    </div>
                    </div>
                </li>

                      <li class="arrow-box-left gray">
                    <div class="avatar"><img class="avatar-small" src="../assets/img/user.png" /></div>
                    <div class="info">
                        <span class="name">
                         Aktivitas terbaru yang dilakukan oleh <strong>Anda</strong>
                        </span>
                        <span class="time"><i class="icon-time"></i> Daily activity</span>
                    </div>
                    <div class="content">
                          <div class="box col">
                <div class="box-content">
                    <!-- find me in partials/data_tables_custom -->
                    <table cellpadding="0" cellspacing="0" border="0" class="dTable responsive dataTable" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
                        <thead>
                            <tr>
                                <td style="width: 5%"><input type="checkbox" id="check-all"></td>
                                <td style="width: 65%">Aktifitas</td>
                                <td style="width: 15%">Tanggal</td>
                                <td style="width: 15%">Jam</td>
                            </tr>
                        </thead>
                        <tbody role="alert" aria-live="polite" aria-relevant="all">
                        <?php
                        $data = $query->view_log($_SESSION['id_user']);
                        foreach ($data as $row) {

                            echo"<tr class='status-pending'>
                                                  <td class='a-center '><input type='checkbox' class='flat' name='table_records' ></td>
                                                  <td>$row[aktivitas]</td>
                                                  <td>" . tgl_indo($row[tanggal]) . "</td>
                                                  <td>$row[waktu] WIB</td>
                            </tr>";
                        }
                        ?>
                        </tbody>
                    </table>

                </div>
            </div>
                    </div>
                </li>
            </ul>

        </div>
    </div>

</div>
</div>
