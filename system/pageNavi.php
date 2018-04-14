<?php
/*
 * *****************************************************************************
 * Filename  : pageNavi.php
 * Creator   : Agis Rahma Herdiana
 * © Copyright 2016                         
 * *****************************************************************************
 */
	
	// PAGE NAVI HOT NEWS
	class pageNavi_HotNews{
		// Fungsi untuk mencek halaman dan posisi data
		function cariPosisi($batas) {
			if(empty($_GET['artikel-terbaru'])) {
				$posisi = 0;
				$_GET['artikel-terbaru'] = 1;
			} else {
				$posisi = ($_GET['artikel-terbaru'] - 1) * $batas;
			}
			return $posisi;
		}
		
		// Fungsi untuk menghitung total halaman
		function jumlahHalaman($jmldata, $batas) {
			$jmlhalaman = ceil($jmldata/$batas);
			return $jmlhalaman;
		}
		
		// Fungsi untuk link halaman 1,2,3 
		function navHalaman($halaman_aktif, $jmlhalaman) {
			global $link;
			
			$link_halaman = "";
		
			// Link ke halaman pertama (first) dan sebelumnya (prev)
			if($halaman_aktif > 1) {
				$prev = $halaman_aktif - 1;
	
				if($prev > 1) { 
					$link_halaman .= "<a class=\"first\" href=\"artikel-terbaru-1.html\"></a>";
				}			
				$link_halaman .= "<a class=\"previouspostslink\" href=\"artikel-terbaru-".$prev.".html\"></a>";
			}
		
			// Link halaman 1,2,3, ...
			$angka = ($halaman_aktif > 3 ? "<span>...</span>" : " "); 
			for($i = $halaman_aktif-2;$i < $halaman_aktif;$i++) {
				if ($i < 1) continue;
				$angka .= "<a href=\"artikel-terbaru-".$i.".html\">".$i."</a>";
			}
			$angka .= "<span class=\"current\">".$halaman_aktif."</span>";
			  
			for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++) {
				if($i > $jmlhalaman) break;
				$angka .= "<a href=\"artikel-terbaru-".$i.".html\">".$i."</a>";
			}
			$angka .= ($halaman_aktif+2 < $jmlhalaman ? "<span>...</span><a href=\"artikel-terbaru-".$jmlhalaman.".html\">".$jmlhalaman."</a>" : " ");
		
			$link_halaman .= $angka;
			
			// Link ke halaman berikutnya (Next) dan terakhir (Last) 
			if($halaman_aktif < $jmlhalaman) {
				$next = $halaman_aktif + 1;
				$link_halaman .= "<a class=\"nextpostslink\" href=\"artikel-terbaru-".$next.".html\"></a>";
				
				if($halaman_aktif != $jmlhalaman - 1) {
					$link_halaman .= "<a class=\"last\" href=\"artikel-terbaru-".$jmlhalaman.".html\"></a>";
				}
			}
			
			return $link_halaman;
		}
	}	


	// PAGE NAVI CATEGORY
	class pageNavi_Category{
		// Fungsi untuk mencek halaman dan posisi data
		function cariPosisi($batas) {
			if(empty($_GET['halaman-kategori'])) {
				$posisi = 0;
				$_GET['halaman-kategori'] = 1;
			} else {
				$posisi = ($_GET['halaman-kategori'] - 1) * $batas;
			}
			return $posisi;
		}
		
		// Fungsi untuk menghitung total halaman
		function jumlahHalaman($jmldata, $batas) {
			$jmlhalaman = ceil($jmldata/$batas);
			return $jmlhalaman;
		}
		
		// Fungsi untuk link halaman 1,2,3 
		function navHalaman($halaman_aktif, $jmlhalaman) {
			global $link;
			
			$link_halaman = "";
		
			// Link ke halaman pertama (first) dan sebelumnya (prev)
			if($halaman_aktif > 1) {
				$prev = $halaman_aktif - 1;
	
				if($prev > 1) { 
					$link_halaman .= "<a class=\"first\" href=\"halaman-kategori-$_GET[id_kategori]-1.html\"></a>";
				}			
				$link_halaman .= "<a class=\"previouspostslink\" href=\"halaman-kategori-$_GET[id_kategori]-".$prev.".html\"></a>";
			}
		
			// Link halaman 1,2,3, ...
			$angka = ($halaman_aktif > 3 ? "<span>...</span>" : " "); 
			for($i = $halaman_aktif-2;$i < $halaman_aktif;$i++) {
				if ($i < 1) continue;
				$angka .= "<a href=\"halaman-kategori-$_GET[id_kategori]-".$i.".html\">".$i."</a>";
			}
			$angka .= "<span class=\"current\">".$halaman_aktif."</span>";
			  
			for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++) {
				if($i > $jmlhalaman) break;
				$angka .= "<a href=\"halaman-kategori-$_GET[id_kategori]-".$i.".html\">".$i."</a>";
			}
			$angka .= ($halaman_aktif+2 < $jmlhalaman ? "<span>...</span><a href=\"halaman-kategori-$_GET[id_kategori]-".$jmlhalaman.".html\">".$jmlhalaman."</a>" : " ");
		
			$link_halaman .= $angka;
			
			// Link ke halaman berikutnya (Next) dan terakhir (Last) 
			if($halaman_aktif < $jmlhalaman) {
				$next = $halaman_aktif + 1;
				$link_halaman .= "<a class=\"nextpostslink\" href=\"halaman-kategori-$_GET[id_kategori]-".$next.".html\"></a>";
				
				if($halaman_aktif != $jmlhalaman - 1) {
					$link_halaman .= "<a class=\"last\" href=\"halaman-kategori-$_GET[id_kategori]-".$jmlhalaman.".html\"></a>";
				}
			}
			
			return $link_halaman;
		}
	}

	// PAGE NAVI Hits
	class pageNavi_Hits{
		// Fungsi untuk mencek halaman dan posisi data
		function cariPosisi($batas) {
			if(empty($_GET['artikel-populer'])) {
				$posisi = 0;
				$_GET['artikel-populer'] = 1;
			} else {
				$posisi = ($_GET['artikel-populer'] - 1) * $batas;
			}
			return $posisi;
		}
		
		// Fungsi untuk menghitung total halaman
		function jumlahHalaman($jmldata, $batas) {
			$jmlhalaman = ceil($jmldata/$batas);
			return $jmlhalaman;
		}
		
		// Fungsi untuk link halaman 1,2,3 
		function navHalaman($halaman_aktif, $jmlhalaman) {
			global $link;
			
			$link_halaman = "";
		
			// Link ke halaman pertama (first) dan sebelumnya (prev)
			if($halaman_aktif > 1) {
				$prev = $halaman_aktif - 1;
	
				if($prev > 1) { 
					$link_halaman .= "<a class=\"first\" href=\"artikel-populer-1.html\"></a>";
				}			
				$link_halaman .= "<a class=\"previouspostslink\" href=\"artikel-populer-".$prev.".html\"></a>";
			}
		
			// Link halaman 1,2,3, ...
			$angka = ($halaman_aktif > 3 ? "<span>...</span>" : " "); 
			for($i = $halaman_aktif-2;$i < $halaman_aktif;$i++) {
				if ($i < 1) continue;
				$angka .= "<a href=\"artikel-populer-".$i.".html\">".$i."</a>";
			}
			$angka .= "<span class=\"current\">".$halaman_aktif."</span>";
			  
			for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++) {
				if($i > $jmlhalaman) break;
				$angka .= "<a href=\"artikel-populer-".$i.".html\">".$i."</a>";
			}
			$angka .= ($halaman_aktif+2 < $jmlhalaman ? "<span>...</span><a href=\"artikel-populer-".$jmlhalaman.".html\">".$jmlhalaman."</a>" : " ");
		
			$link_halaman .= $angka;
			
			// Link ke halaman berikutnya (Next) dan terakhir (Last) 
			if($halaman_aktif < $jmlhalaman) {
				$next = $halaman_aktif + 1;
				$link_halaman .= "<a class=\"nextpostslink\" href=\"artikel-populer-".$next.".html\"></a>";
				
				if($halaman_aktif != $jmlhalaman - 1) {
					$link_halaman .= "<a class=\"last\" href=\"artikel-populer-".$jmlhalaman.".html\"></a>";
				}
			}
			
			return $link_halaman;
		}
	}	
	
?>