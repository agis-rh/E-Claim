<?php
/*
 * *****************************************************************************
 * Filename  : library.php
 * Creator   : Agis Rahma Herdiana
 * © Copyright 2016                         
 * *****************************************************************************
 */

//fungsi multiple select yang telah terpilih
function GetSelected($table, $key, $Nilai='', $ordering) {
  $s = "select * from $table order by $ordering";
  $r = mysql_query($s);
  $_arrNilai = explode(',', $Nilai);
  $str = '';
  while ($w = mysql_fetch_array($r)) {
    $_ck = (array_search($w[$key], $_arrNilai) === false)? '' : 'selected';
    $str .= "<option value='$w[$key]' $_ck>$w[nama_tag]</option> ";
  }
  return $str;
}



// fungsi title seo
function seo_title($s) {
    $c = array (' ');
    $d = array ('-','/','\\',',','.','#',':',';','\'','"','[',']','{','}',')','(','|','`','~','!','@','%','$','^','&','*','=','?','+');

    $s = str_replace($d, '', $s); // Hilangkan karakter yang telah disebutkan di array $d
    
    $s = strtolower(str_replace($c, '-', $s)); // Ganti spasi dengan tanda - dan ubah hurufnya menjadi kecil semua
    return $s;
}

// fungsi sensor kata jelek
function sensor($teks){
    $w = mysql_query("SELECT * FROM sensorkata");
    while ($r = mysql_fetch_array($w)){
        $teks = str_replace($r['kata'], $r['ganti'], $teks);       
    }
    return $teks;
}

// fungsi injeksi
function anti_injection($data){
    $filter = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
    return $filter;
}

// fungsi validasi
function validasi($str, $tipe){
    switch($tipe){
      default:
      case'sql':
        $str = stripcslashes($str); 
        $str = htmlspecialchars($str);        
        $str = preg_replace('/[^A-Za-z0-9]/','',$str);        
        return intval($str);
      break;
      case'xss':
        $str = stripcslashes($str); 
        $str = htmlspecialchars($str);
        $str = preg_replace('/[\W]/','', $str);
        return $str;
      break;
    }
  }