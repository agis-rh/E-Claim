

<div class="container-fluid padded">
    <div class="row-fluid">

        <div class="span12">
            <!-- find me in partials/action_nav_normal -->

            <!--big normal buttons-->
            <div class="action-nav-normal">

                <div class="row-fluid">
                    <div class="span4 action-nav-button">
                        <a href="#" title="Claim">
                            <i class="icon-file-alt"></i>
                            <?php
                            $count_klaim   = mysql_query("SELECT count(*) AS jml_klaim FROM klaim");
                            $val_klaim     = mysql_fetch_assoc($count_klaim);
                            $jml_klaim     = $val_klaim['jml_klaim'];
                            ?>
                            <span><?php echo $jml_klaim; ?> Claim</span>
                        </a>
                        <span class="triangle-button red"><i class="icon-plus"></i></span>
                    </div>

                     <div class="span4 action-nav-button">
                        <a href="#" title="Kantor">
                            <i class="icon-home"></i>
                            <?php
                            $count_kantor   = mysql_query("SELECT count(*) AS jml_kantor FROM kantor");
                            $val_kantor     = mysql_fetch_assoc($count_kantor);
                            $jml_kantor     = $val_kantor['jml_kantor'];
                            ?>
                            <span><?php echo $jml_kantor; ?> Kantor</span>
                        </a>
                        <span class="triangle-button blue"><span class="inner"><?php echo $jml_kantor; ?></span></span>
                    </div>
                    
                     <div class="span4 action-nav-button">
                        <a href="#" title="Karyawan">
                            <i class="icon-user"></i>
                            <?php
                            $count_karyawan = mysql_query("SELECT count(*) AS jml_karyawan FROM karyawan");
                            $val_karyawan   = mysql_fetch_assoc($count_karyawan);
                            $jml_karyawan   = $val_karyawan['jml_karyawan'];
                            ?>
                            <span><?php echo $jml_karyawan; ?> Karyawan</span>
                        </a>
                        <span class="triangle-button green"><span class="inner"><?php echo $jml_karyawan; ?></span></span>
                    </div>
                   
                </div>


            </div>
        </div>

    </div>

    <div class="row-fluid">
        <div class="span12">
            <div class="box">
                <div class="box-header">
                    <div class="title">Full calendar</div>
                </div>

                <div class="box-content">
                    <div id="calendar"></div>
                </div>
            </div>
        </div>

       
         
    </div>

    

</div>
</div>
