<?php
/*
 * *****************************************************************************
 * Filename  : timezone.php
 * Creator   : Agis Rahma Herdiana
 * © Copyright 2016
 * *****************************************************************************
 */
	function waktu_indo($tgl){
			$tanggal = substr($tgl,8,2);
			$bulan = getBulan(substr($tgl,5,2));
			$tahun = substr($tgl,0,4);
            $jam   = substr($tgl,11,19);
			return $tanggal.' '.$bulan.' '.$tahun.' Pukul : '.$jam.' '.WIB;
	}

        function tgl_indo($tgl){
			$tanggal = substr($tgl,8,2);
			$bulan = getBulan(substr($tgl,5,2));
			$tahun = substr($tgl,0,4);
			return $tanggal.' '.$bulan.' '.$tahun;
	}


		function tgl($tgl){
				$tanggal = substr($tgl,8,2);
				$bulan = Bulan(substr($tgl,5,2));
				$tahun = substr($tgl,0,4);
				return $tanggal.' '.$bulan.' '.$tahun;
		}

        function dateLine($datenow, $dateline) {
                        $date_line        = explode("-", $dateline);
                        $DateLine         = $date_line[2]."-".$date_line[1]."-".$date_line[0];
                        $date_now         = explode("-", $datenow);
                        $DateNow          = $date_now[2]."-".$date_now[1]."-".$date_now[0];
                        $Hitung_selisih   = strtotime($DateLine) - strtotime($DateNow);
                        $Tampil_selisih   = $Hitung_selisih / 86400;

                        return $Tampil_selisih;
        }


       function Bulan($bln){
				switch ($bln){
					case 1:
						return "Jan";
						break;
					case 2:
						return "Feb";
						break;
					case 3:
						return "Mar";
						break;
					case 4:
						return "Apr";
						break;
					case 5:
						return "Mei";
						break;
					case 6:
						return "Jun";
						break;
					case 7:
						return "Jul";
						break;
					case 8:
						return "Agu";
						break;
					case 9:
						return "Sep";
						break;
					case 10:
						return "Okt";
						break;
					case 11:
						return "Nov";
						break;
					case 12:
						return "Des";
						break;
				}
			}

	function getBulan($bln){
				switch ($bln){
					case 1:
						return "Januari";
						break;
					case 2:
						return "Februari";
						break;
					case 3:
						return "Maret";
						break;
					case 4:
						return "April";
						break;
					case 5:
						return "Mei";
						break;
					case 6:
						return "Juni";
						break;
					case 7:
						return "Juli";
						break;
					case 8:
						return "Agustus";
						break;
					case 9:
						return "September";
						break;
					case 10:
						return "Oktober";
						break;
					case 11:
						return "November";
						break;
					case 12:
						return "Desember";
						break;
				}
			}



// FUNCTION TIME AGO

function time_since($original) {
  $chunks = array(
      array(60 * 60 * 24 * 365, 'tahun'),
      array(60 * 60 * 24 * 30, 'bulan'),
      array(60 * 60 * 24 * 7, 'minggu'),
      array(60 * 60 * 24, 'hari'),
      array(60 * 60, 'jam'),
      array(60, 'menit'),
  );

  $today = time();
  $since = $today - $original;

  if ($since > 604800)
  {
    $print = date("M jS", $original);
    if ($since > 31536000)
    {
      $print .= ", " . date("Y", $original);
    }
    return $print;
  }

  for ($i = 0, $j = count($chunks); $i < $j; $i++)
  {
    $seconds = $chunks[$i][0];
    $name = $chunks[$i][1];

    if (($count = floor($since / $seconds)) != 0)
      break;
  }

  $print = ($count == 1) ? '1 ' . $name : "$count {$name}";
  return $print . ' ';
}

function timeAgo($timestamp){
    $time = time() - $timestamp;

    if ($time < 60) {
        return ( $time > 1 ) ? $time . ' detik' : ' 1 detik';
    }
    elseif ($time < 3600) {
        $tmp = floor($time / 60);
        return ($tmp > 1) ? $tmp . ' menit' : ' 1 menit';
    }
    elseif ($time < 86400) {
        $tmp = floor($time / 3600);
        return ($tmp > 1) ? $tmp . ' jam ' : ' 1 jam ';
    }
    elseif ($time < 2592000) {
        $tmp = floor($time / 86400);
        return ($tmp > 1) ? $tmp . ' hari ' : ' 1 hari ';
    }
    elseif ($time < 946080000) {
        $tmp = floor($time / 2592000);
        return ($tmp > 1) ? $tmp . ' bulan ' : ' 1 bulan ';
    }
    else {
        $tmp = floor($time / 946080000);
        return ($tmp > 1) ? $tmp . ' tahun ' : ' 1 tahun ';
    }
}
?>
