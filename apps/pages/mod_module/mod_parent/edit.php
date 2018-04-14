<?php
$id = $_GET['id'];
$module = $query->get_module($id);
?>

<div class="container-fluid padded">
    <div class="box">
        <div class="box-header">
            <div class="title">Parent Module</div>
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
                <div class="span8 separate-sections">
                    <form class="form-horizontal fill-up validatable" action=""  method="POST">
                        <div class="form-group">
                            <label class="control-label span2">Nama :</label>
                            <div class="span10">
                                <input type="hidden" name="id" value="<?php echo $module[id_module]; ?>">
                                <input type="text" name="nama" value="<?php echo $module[nama_module]; ?>" class="validate[required]" data-prompt-position="topLeft">
                                <span class="help-block note"><i class="icon-required"></i></span><br>
                            </div> 
                        </div>
                        <div class="form-group">
                            <label class="control-label span2">Icon :</label>
                            <div class="span10">
                                <select class="select2-container select2-container-multi chzn-select" name="icon">
                                    <option value="0">Pilih Icon</option>
                                    <option value="icon-glass" <?php if ($module[icon] == 'icon-glass') {
    echo "selected";
} ?>>icon glass</option>
                                    <option value="icon-music"  <?php if ($module[icon] == 'icon-music') {
    echo "selected";
} ?>>icon music</option> 
                                    <option value="icon-envelope"  <?php if ($module[icon] == 'icon-envelope') {
    echo "selected";
} ?>>icon envelope</option>
                                    <option value="icon-heart"  <?php if ($module[icon] == 'icon-heart') {
    echo "selected";
} ?>>icon heart</option> 
                                    <option value="icon-star"  <?php if ($module[icon] == 'icon-star') {
    echo "selected";
} ?>>icon star</option> 
                                    <option value="icon-star-empty "  <?php if ($module[icon] == 'icon-star-empty') {
    echo "selected";
} ?>>icon star-empty </option> 
                                    <option value="icon-user"  <?php if ($module[icon] == 'icon-user') {
    echo "selected";
} ?>>icon user</option> 
                                    <option value="icon-film"  <?php if ($module[icon] == 'icon-film') {
    echo "selected";
} ?>>icon film</option> 

                                    <option value="icon-th-large"  <?php if ($module[icon] == 'icon-th-large') {
    echo "selected";
} ?>>icon th-large </option>
                                    <option value="icon-th"  <?php if ($module[icon] == 'icon-th') {
    echo "selected";
} ?>>icon th</option> 
                                    <option value="icon-th-list"  <?php if ($module[icon] == 'icon-th-list') {
    echo "selected";
} ?>>icon th-list</option> 
                                    <option value="icon-ok"  <?php if ($module[icon] == 'icon-ok') {
    echo "selected";
} ?>>icon ok</option> 
                                    <option value="icon-remove"  <?php if ($module[icon] == 'icon-remove') {
    echo "selected";
} ?>>icon remove</option> 
                                    <option value="icon-zoom-in "  <?php if ($module[icon] == 'icon-zoom-in') {
    echo "selected";
} ?>>icon zoom-in </option> 
                                    <option value="icon-zoom-out"  <?php if ($module[icon] == 'icon-zoom-out') {
    echo "selected";
} ?>>icon zoom-out</option>
                                    <option value="icon-off"  <?php if ($module[icon] == 'icon-off') {
    echo "selected";
} ?>>icon off</option> 

                                    <option value="icon-signal "  <?php if ($module[icon] == 'icon-signal') {
    echo "selected";
} ?>>icon signal </option>
                                    <option value="icon-cog"  <?php if ($module[icon] == 'icon-cog') {
    echo "selected";
} ?>>icon cog</option> 
                                    <option value="icon-trash"  <?php if ($module[icon] == 'icon-trash') {
    echo "selected";
} ?>>icon trash</option> 
                                    <option value="icon-home"  <?php if ($module[icon] == 'icon-home') {
    echo "selected";
} ?>>icon home</option> 
                                    <option value="icon-time"  <?php if ($module[icon] == 'icon-time') {
    echo "selected";
} ?>>icon time</option> 
                                    <option value="icon-road "  <?php if ($module[icon] == 'icon-road') {
    echo "selected";
} ?>>icon road </option> 
                                    <option value="icon-download-alt"  <?php if ($module[icon] == 'icon-download-alt') {
    echo "selected";
} ?>>icon download-alt</option> 
                                    <option value="icon-download"  <?php if ($module[icon] == 'icon-download') {
    echo "selected";
} ?>>icon download</option>   

                                    <option value="icon-upload "  <?php if ($module[icon] == 'icon-upload') {
    echo "selected";
} ?>>icon upload </option>
                                    <option value="icon-inbox"  <?php if ($module[icon] == 'icon-inbox') {
    echo "selected";
} ?>>icon inbox</option> 
                                    <option value="icon-play-circle"  <?php if ($module[icon] == 'icon-play-circle') {
    echo "selected";
} ?>>icon play-circle</option> 
                                    <option value="icon-repeat"  <?php if ($module[icon] == 'icon-repeat') {
    echo "selected";
} ?>>icon repeat</option> 
                                    <option value="icon-refresh"  <?php if ($module[icon] == 'icon-refresh') {
    echo "selected";
} ?>>icon refresh</option> 
                                    <option value="icon-list-alt "  <?php if ($module[icon] == 'icon-list-alt') {
    echo "selected";
} ?>>icon list-alt </option> 
                                    <option value="icon-lock"  <?php if ($module[icon] == 'icon-lock') {
    echo "selected";
} ?>>icon lock</option> 
                                    <option value="icon-flag"  <?php if ($module[icon] == 'icon-flag') {
    echo "selected";
} ?>>icon flag</option>   

                                    <option value="icon-headphones "  <?php if ($module[icon] == 'icon-headphones') {
    echo "selected";
} ?>>icon headphones </option>
                                    <option value="icon-volume-off"  <?php if ($module[icon] == 'icon-volume-off') {
    echo "selected";
} ?>>icon volume-off</option> 
                                    <option value="icon-volume-down"  <?php if ($module[icon] == 'icon-volume-down') {
    echo "selected";
} ?>>icon volume-down</option> 
                                    <option value="icon-volume-up"  <?php if ($module[icon] == 'icon-volume-up') {
    echo "selected";
} ?>>icon volume-up</option> 
                                    <option value="icon-qrcode"  <?php if ($module[icon] == 'icon-qrcode') {
    echo "selected";
} ?>>icon qrcode</option> 
                                    <option value="icon-barcode "  <?php if ($module[icon] == 'icon-barcode') {
    echo "selected";
} ?>>icon barcode </option> 
                                    <option value="icon-tag"  <?php if ($module[icon] == 'icon-tag') {
    echo "selected";
} ?>>icon tag</option> 
                                    <option value="icon-tags"  <?php if ($module[icon] == 'icon-tags') {
    echo "selected";
} ?>>icon tags</option> 

                                    <option value="icon-book" <?php if ($module[icon] == 'icon-book') {
    echo "selected";
} ?>>icon book </option>
                                    <option value="icon-bookmark" <?php if ($module[icon] == 'icon-bookmark') {
    echo "selected";
} ?>>icon bookmark</option> 
                                    <option value="icon-print" <?php if ($module[icon] == 'icon-print') {
    echo "selected";
} ?>>icon print</option> 
                                    <option value="icon-camera" <?php if ($module[icon] == 'icon-camera') {
    echo "selected";
} ?>>icon camera</option> 
                                    <option value="icon-font" <?php if ($module[icon] == 'icon-font') {
        echo "selected";
    } ?>>icon font</option> 
                                    <option value="icon-bold" <?php if ($module[icon] == 'icon-bold') {
        echo "selected";
    } ?>>icon bold </option> 
                                    <option value="icon-italic" <?php if ($module[icon] == 'icon-italic') {
        echo "selected";
    } ?>>icon italic</option> 
                                    <option value="icon-text-height" <?php if ($module[icon] == 'icon-text-height') {
        echo "selected";
    } ?>>icon text-height</option> 

                                    <option value="icon-text-width" <?php if ($module[icon] == 'icon-text-width') {
        echo "selected";
    } ?>>icon text-width</option> 
                                    <option value="icon-align-left" <?php if ($module[icon] == 'icon-align-left') {
        echo "selected";
    } ?>>icon align-left</option> 
                                    <option value="icon-align-center" <?php if ($module[icon] == 'icon-align-center') {
        echo "selected";
    } ?>>icon align-center</option> 
                                    <option value="icon-align-right" <?php if ($module[icon] == 'icon-align-right') {
        echo "selected";
    } ?>>icon right</option> 
                                    <option value="icon-align-justify" <?php if ($module[icon] == 'icon-align-justify') {
        echo "selected";
    } ?>>icon align-justify </option> 
                                    <option value="icon-list" <?php if ($module[icon] == 'icon-list') {
        echo "selected";
    } ?>>icon list</option> 
                                    <option value="icon-indent-left" <?php if ($module[icon] == 'icon-indent-left') {
        echo "selected";
    } ?>>icon indent-left</option>

                                    <option value="icon-indent-right" <?php if ($module[icon] == 'icon-indent-right') {
        echo "selected";
    } ?>>icon indent-right </option>
                                    <option value="icon-facetime-video" <?php if ($module[icon] == 'icon-facetime-video') {
        echo "selected";
    } ?>>icon facetime-video</option> 
                                    <option value="icon-picture" <?php if ($module[icon] == 'icon-picture') {
        echo "selected";
    } ?>>icon picture</option> 
                                    <option value="icon-pencil" <?php if ($module[icon] == 'icon-pencil') {
        echo "selected";
    } ?>>icon pencil</option> 
                                    <option value="icon-map-marker" <?php if ($module[icon] == 'icon-map-marker') {
        echo "selected";
    } ?>>icon map-marker</option> 
                                    <option value="icon-adjust" <?php if ($module[icon] == 'icon-adjust') {
        echo "selected";
    } ?>>icon adjust </option> 
                                    <option value="icon-tint" <?php if ($module[icon] == 'icon-tint') {
        echo "selected";
    } ?>>icon tint</option> 
                                    <option value="icon-edit" <?php if ($module[icon] == 'icon-edit') {
        echo "selected";
    } ?>>icon edit</option>   

                                    <option value="icon-share" <?php if ($module[icon] == 'icon-share') {
        echo "selected";
    } ?>>icon share </option>
                                    <option value="icon-check" <?php if ($module[icon] == 'icon-check') {
        echo "selected";
    } ?>>icon check</option> 
                                    <option value="icon-move" <?php if ($module[icon] == 'icon-move') {
        echo "selected";
    } ?>>icon move</option> 
                                    <option value="icon-step-backward" <?php if ($module[icon] == 'icon-step-backward') {
        echo "selected";
    } ?>>icon step-backward</option> 
                                    <option value="icon-fast-backward" <?php if ($module[icon] == 'icon-fast-backward') {
        echo "selected";
    } ?>>icon fast-backward</option> 
                                    <option value="icon-backward" <?php if ($module[icon] == 'icon-backward') {
        echo "selected";
    } ?>>icon backward </option> 
                                    <option value="icon-play" <?php if ($module[icon] == 'icon-play') {
        echo "selected";
    } ?>>icon play</option> 
                                    <option value="icon-pause" <?php if ($module[icon] == 'icon-pause') {
        echo "selected";
    } ?>>icon pause</option>

                                    <option value="icon-stop" <?php if ($module[icon] == 'icon-stop') {
        echo "selected";
    } ?>>icon stop </option>
                                    <option value="icon-forward" <?php if ($module[icon] == 'icon-forward') {
        echo "selected";
    } ?>>icon forward</option> 
                                    <option value="icon-fast-forward" <?php if ($module[icon] == 'icon-fast-forward') {
        echo "selected";
    } ?>>icon fast-forward</option> 
                                    <option value="icon-step-forward" <?php if ($module[icon] == 'icon-step-forward') {
        echo "selected";
    } ?>>icon step-forward</option> 
                                    <option value="icon-eject" <?php if ($module[icon] == 'icon-eject') {
        echo "selected";
    } ?>>icon eject</option> 
                                    <option value="icon-chevron-left" <?php if ($module[icon] == 'icon-chevron-left') {
        echo "selected";
    } ?>>icon chevron-left </option> 
                                    <option value="icon-chevron-right" <?php if ($module[icon] == 'icon-chevron-right') {
        echo "selected";
    } ?>>icon right</option> 
                                    <option value="icon-plus-sign" <?php if ($module[icon] == 'icon-plus-sign') {
        echo "selected";
    } ?>>icon plus-sign</option> 

                                    <option value="icon-minus-sign" <?php if ($module[icon] == 'icon-minus-sign') {
        echo "selected";
    } ?>>icon minus-sign </option>
                                    <option value="icon-remove-sign" <?php if ($module[icon] == 'icon-remove') {
        echo "selected";
    } ?>>icon remove-sign</option> 
                                    <option value="icon-ok-sign"> <?php if ($module[icon] == 'icon-ok-sign') {
        echo "selected";
    } ?>icon ok-sign</option> 
                                    <option value="icon-question-sign" <?php if ($module[icon] == 'icon-question-sign') {
        echo "selected";
    } ?>>icon question-sign</option> 
                                    <option value="icon-info-sign" <?php if ($module[icon] == 'icon-info-sign') {
        echo "selected";
    } ?>>icon info-sign</option> 
                                    <option value="icon-screenshot" <?php if ($module[icon] == 'icon-screenshot') {
        echo "selected";
    } ?>>icon screenshot </option> 
                                    <option value="icon-remove-circle" <?php if ($module[icon] == 'icon-remove-circle') {
        echo "selected";
    } ?>>icon remove-circle</option> 
                                    <option value="icon-ok-circle" <?php if ($module[icon] == 'icon-ok-circle') {
        echo "selected";
    } ?>>icon ok-circle</option>

                                </select>
                                <span class="help-block note"><i class="icon-required"></i></span><br>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label span2">ID URL :</label>
                            <div class="span2">
                                <input type="text" name="url" readonly value="<?php echo $module[url]; ?>" class="validate[required]" data-prompt-position="topLeft">
                                <span class="help-block note"><i class="icon-required"></i></span><br>
                            </div>
                        </div>

                        <div class="span10 separate-sections pull-right" style="margin-top: 100px;">
                            <div class="form-group">
                                <button type="submit" name="save" class="btn btn-blue">Simpan</button>
                                <button type="button" class="btn btn-default">Batal</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php
$id = $_POST['id'];
$nama = $_POST['nama'];
$icon = $_POST['icon'];


if (isset($_POST['save'])) {

    $query->edit_parent($id, $nama, $icon);
     // Log Aktifitas
    $query->log($_SESSION[id_user],'Mengubah parent module',$tgl_sekarang,$jam_sekarang);
    echo "<script>window.location='admin.php?page=module';</script>";
}