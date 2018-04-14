<!-- Main nav -->
<ul class="nav nav-collapse collapse nav-collapse-primary">
    <li class="active">
        <span class="glow"></span>
        <a href="?page=dashboard">
            <i class="icon-home icon-2x"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <?php
    # role untuk admin
    if ($_SESSION['level_user'] == 'admin') {
        // Query untuk mencari menu           
        $main = mysql_query("SELECT * FROM module WHERE parent_id = '0' ORDER BY ordering");
        while ($r = mysql_fetch_array($main)) {

            echo "<li class='dark-nav active'>";
            echo "<span class='glow'></span>";
            echo "<a class='accordion-toggle collapsed ' data-toggle='collapse' href='#$r[url]'>";
            echo "<i class='$r[icon] icon-2x'></i>";
            echo "<span>$r[nama_module] <i class='icon-caret-down'></i></span>";
            echo "</a>";

            // Query untuk mencari sub menu  
            $sub = mysql_query("SELECT * FROM module WHERE parent_id = $r[id_module] AND parent_id !='0' ORDER BY ordering");
            $jml = mysql_num_rows($sub);
            // apabila sub menu ditemukan
            if ($jml > 0) {

                echo "<ul id='$r[url]' class='collapse '>";
                while ($w = mysql_fetch_array($sub)) {

                    if($page==$w[url]){
                    echo "<li class='active'>";
                    }else{
                     echo "<li>";  
                    }
                    echo "<a href='?page=$w[url]'>";
                    echo "<i class='$w[icon]'></i> $w[nama_module]";
                    echo "</a>";
                    echo "</li>";
                }
                echo "</ul>";

                echo "</li>";
            } else {
                echo "</li>";
            }
        }

        # end role admin
    } else {

        # role untuk user
        // Query untuk mencari menu           
        $main = mysql_query("SELECT * FROM module WHERE parent_id='0' AND baca='Y' ORDER BY ordering");
        while ($r = mysql_fetch_array($main)) {

            echo "<li class='dark-nav active'>";
            echo "<span class='glow'></span>";
            echo "<a class='accordion-toggle collapsed ' data-toggle='collapse' href='#$r[url]'>";
            echo "<i class='$r[icon] icon-2x'></i>";
            echo "<span>$r[nama_module] <i class='icon-caret-down'></i></span>";
            echo "</a>";

            // Query untuk mencari sub menu  
            $sub = mysql_query("SELECT * FROM module WHERE parent_id = $r[id_module] AND parent_id !='0' AND baca='Y' ORDER BY nama_module ASC");
            $jml = mysql_num_rows($sub);
            // apabila sub menu ditemukan
            if ($jml > 0) {

                echo "<ul id='$r[url]' class='collapse '>";
                while ($w = mysql_fetch_array($sub)) {

                    echo "<li>";
                    echo "<a href='?page=$w[url]'>";
                    echo "<i class='$w[icon]'></i> $w[nama_module]";
                    echo "</a>";
                    echo "</li>";
                }
                echo "</ul>";

                echo "</li>";
            } else {
                echo "</li>";
            }
        }
    }
    ?>

</ul>
<div class="hidden-tablet hidden-phone">
    <div class="text-center" style="margin-top: 60px">
        <div class="easy-pie-chart-percent" style="display: inline-block" data-percent="89"><span>89%</span></div>
    </div>
    <hr class="divider" style="margin-top: 60px" />
</div>
