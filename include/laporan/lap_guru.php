<?php
require('fpdf.php');

class PDF extends FPDF
{
    // Page header
    function Header()
    {
        // Arial bold 15
        $this->SetFont('Arial','B',15);
        // logo
        $this->Image('../../millenium.jpg', 10, 5, -300);
        // Title
        $this->Cell(276, 5,'LAPORAN GURU PADA PRIVATE LES MILLENIUM', 0, 0,'C');
        // Line break
        $this->Ln(10);
        $this->SetFont('Times', '', '12');
        $this->Cell(276, 5,'Jl. Gereja No.54, Sei Agul, Kec. Medan Bar., Kota Medan, Sumatera Utara 20114', 0, 0,'C');
        $this->Ln(20);
    }

    // Page footer
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Page number
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }

    function headerTable() {
        $this->SetFont('Arial','B',12);
        $this->cell(10,10,'No',1 ,0, 'C');
        $this->cell(70,10,'Nama',1 ,0, 'C');
        $this->cell(95,10,'Alamat',1 ,0, 'C');
        $this->cell(40,10,'Jenis Kelamin',1 ,0, 'C');
        $this->cell(35,10,'No Telepon',1 ,0, 'C');
        $this->cell(30,10,'Agama',1 ,0, 'C');
        $this->ln();
    }

    function viewTable() {
        include_once '../config.php';
        $this->SetFont('Arial','',12);
        // $start = $_REQUEST['start'];
        // $end = $_REQUEST['end'];
        $sql = $db -> query("SELECT * FROM pengajar ");
        $no=1;
        while ($ambil = $sql -> fetch(PDO::FETCH_ASSOC)) {
            $this->cell(10,10,$no++,1 ,0, 'C');
            $this->cell(70,10, $ambil['nama'] ,1 ,0, 'C');
            $this->cell(95,10, $ambil['alamat'] ,1 ,0, 'C');
            $this->cell(40,10, $ambil['jk'] ,1 ,0, 'C');
            $this->cell(35,10, $ambil['notel'] ,1 ,0, 'C');
            $this->cell(30,10, $ambil['agama'] ,1 ,0, 'C');
            $this->ln();
        }
    }
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage('L', 'A4', 0);
$pdf->SetFont('Times','',12);
$pdf->headerTable();
$pdf->viewTable();

$pdf->ln(40);
$pdf->cell(130, 5, '( Pimpinan )', 0,0);
$pdf->cell(59, 5, '', 0,1);

$fileName = 'Laporan Data Guru.pdf';
$pdf->Output('D', $fileName);
?>