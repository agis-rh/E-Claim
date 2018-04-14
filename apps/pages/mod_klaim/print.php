<?php
require_once("../../../system/functions.php");
include "../../../assets/fpdf/fpdf.php";
require_once("../../../system/time.php");
// membuat fungsi baru
$query = new Functions();
//membuat koneksi
$db = new Connection();

    function rupiah($angka)
    {
        return 'Rp '. number_format($angka,0,',','.');
    }

$noletter = $_GET[noletter];
$data     = $query->slip_klaim($noletter);
$approval = $query->get_karyawan($data['approval']);
//mencari data

$user = $_GET[user];
$by   = $query->get_karyawan($user);
if($user!='admin'){
    $printed = $by[nama_karyawan]."-".$by[id_karyawan];
}else{
    $printed = $_GET[user];
}
//extending class fpdf
class pdf extends FPDF{
    function letak($gambar){
        //memasukkan gambar untuk header
        $this->Image($gambar,45,3,25,25);
        //menggeser posisi sekarang
    }
    function judul($teks1, $teks2, $teks3){
       
        $this->Cell(25);
        $this->SetFont('Times','B','15');
        $this->Cell(0,5,$teks1,0,1,'C');
        $this->Cell(25);
        $this->SetFont('Times','I','8');
        $this->Cell(0,5,$teks2,0,1,'C');
        $this->Cell(25);
        $this->Cell(0,2,$teks3,0,1,'C');
    }
    function garis(){
        $this->SetLineWidth(1);
        $this->Line(10,31,200,31);
        $this->SetLineWidth(0);
        $this->Line(10,32,200,32);
    }
    function surat($nomor, $golongan, $hal, $no_rekening, $an_rekening){
        $this->Ln(15);
        $this->SetFont('Times','',12);
        $this->Cell(10,5,'Perihal',0,0,'L');
        $this->Cell(15);
        $this->Cell(2,5,':',0,0,'L');
        $this->Cell(5);
        $this->Cell(1,5,$hal,0,1,'L');
        $this->Cell(10,5,'No. Transaksi',0,0,'L');
        $this->Cell(15);
        $this->Cell(2,5,':',0,0,'L');
        $this->Cell(5);
        $this->Cell(1,5,$nomor,0,1,'L');
        $this->Cell(10,5,'Golongan',0,0,'L');
        $this->Cell(15);
        $this->Cell(2,5,':',0,0,'L');
        $this->Cell(5);
        $this->Cell(1,5,$golongan,0,1,'L');
        $this->SetFont('Times','',12);
        $this->Cell(10,5,'No. Rekening',0,0,'L');
        $this->Cell(15);
        $this->Cell(2,5,':',0,0,'L');
        $this->Cell(5);
        $this->Cell(1,5,$no_rekening,0,1,'L');
        $this->SetFont('Times','',12);
        $this->Cell(10,5,'an. Rekening',0,0,'L');
        $this->Cell(15);
        $this->Cell(2,5,':',0,0,'L');
        $this->Cell(5);
        $this->Cell(1,5,$an_rekening,0,1,'L');
        $this->SetFont('Times','',12);

    }

    function rincian($biaya, $pajak, $total){
        $this->Ln(1);
        $this->SetFont('Times','',12);
        $this->Cell(40);
        $this->Cell(0,5,'________________________________',0,1,'L');
        $this->Cell(40);
        $this->Cell(10,5,'Biaya',0,0,'L');
        $this->Cell(15);
        $this->Cell(2,5,':',0,0,'L');
        $this->Cell(5);
        $this->Cell(1,5,$biaya,0,1,'L');
        $this->Cell(25);
        $this->Cell(15);
        $this->Cell(10,5,'Pajak',0,0,'L');
        $this->Cell(15);
        $this->Cell(2,5,':',0,0,'L');
        $this->Cell(5);
        $this->Cell(1,5,$pajak,0,1,'L');
        $this->Cell(15);
        $this->Cell(25);
        $this->Cell(10,5,'Total',0,0,'L');
        $this->Cell(15);
        $this->Cell(2,5,':',0,0,'L');
        $this->Cell(5);
        $this->Cell(1,5,$total,0,1,'L');
    }

    function data_transaksi($id, $nama, $jabatan){
        $this->Ln(20);
        $this->Cell(25);
        $this->SetFont('Times','',12);
        $this->Cell(15);
        $this->Cell(10,5,'NIK',0,0,'L');
        $this->Cell(15);
        $this->Cell(2,5,':',0,0,'L');
        $this->Cell(5);
        $this->Cell(1,5,$id,0,1,'L');
        $this->Cell(25);
        $this->Cell(15);
        $this->Cell(10,5,'Nama',0,0,'L');
        $this->Cell(15);
        $this->Cell(2,5,':',0,0,'L');
        $this->Cell(5);
        $this->Cell(1,5,$nama,0,1,'L');
        $this->Cell(15);
        $this->Cell(25);
        $this->Cell(10,5,'Jabatan',0,0,'L');
        $this->Cell(15);
        $this->Cell(2,5,':',0,0,'L');
        $this->Cell(5);
        $this->Cell(1,5,$jabatan,0,1,'L');
    }
    function status($status){
        $this->Ln(5);
        $this->Cell(25);
        $this->SetFont('Times','',15);
        $this->Cell(10);
        $this->Ln(5);
        $this->Cell(0, 5,$status,0,1,'C');
        $this->Cell(0, 5,'___________',0,1,'C');
    }
    function disetujui(){
        $this->Ln(15);
        $this->SetFont('Times','',12);
        $this->Cell(130);
        $this->Cell(0,5,'Disetujui Oleh,',0,1,'L'); 
    }
    function approval($head,$nik){
        $this->Ln(20);
        $this->Cell(130);
        $this->SetFont('Times','B',12);
        $this->Cell(0,5,$head,0,1,'L');
        $this->SetFont('Times','',12);
        $this->Cell(130);
        $this->Cell(0,5,'NIK.'.$nik,0,1,'L');
    }
    function legalitas($legal){
        $this->Ln(0);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,3,$legal,0,1,'L');
    }
}

//instantisasi objek
$pdf=new pdf('L','mm', array(216,139.5));;

//properti dokumen
$pdf->SetAuthor('AGIS_RH | agis.rahma.herdiana@gmail.com');
$pdf->SetTitle('SLIP REQUEST CLAIM');
//Mulai dokumen
$pdf->AddPage('P', 'A4');
//meletakkan gambar
$pdf->letak('../../../assets/img/urindo.png');
//meletakkan judul disamping logo diatas
$pdf->judul('PT. DEMO APPLICATION','Alamat :Jl.letjen R. Suprapto Telpon (0730) 621920 KODE POS 31527', 'E-Mail: man. pagaralam@kemenag .go.id NSM 311160402005');
//membuat garis ganda tebal dan tipis
$pdf->garis();
//membuat header surat dan penomoran
$pdf->surat($noletter, $data[nama_golongan], 'Permintaan Klaim Pengobatan',$data[no_rekening],$data[an_rekening]);
$pdf->data_transaksi($data[id_karyawan], $data[nama_karyawan], $data[nama_jabatan]);
$pdf->rincian(rupiah($data[biaya]),rupiah($data[pajak]),rupiah($data[total]));
$pdf->status(strtoupper($data[status]));
$pdf->disetujui();
$pdf->approval($approval[nama_karyawan],$approval[id_karyawan]);
$date = date('d-M-Y  h:i:s');
$pdf->legalitas('printed on: '.$date.' by '.$printed );
$pdf->output();
?>