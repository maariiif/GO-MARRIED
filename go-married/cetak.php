<?php

//sertakan library fpdf
require_once ("fpdf/fpdf.php");
$pdf = new FPDF();
$pdf->AddPage();

//koneksi ke database
$host = "localhost"; 
$user = "root"; 
$pass = ""; 
$dbnm = "go_married"; 
  
$conn = mysql_connect($host, $user, $pass); 
if ($conn) { 
    $open = mysql_select_db($dbnm); 
    if (!$open) { 
        die ("Database tidak dapat dibuka karena ".mysql_error()); 
    } 
} else { 
    die ("Server MySQL tidak terhubung karena ".mysql_error());
}
//akhir koneksi
//Query
$query = "SELECT * FROM biodata";
$sql = mysql_query ($query);
$data = array(); 
while ($row = mysql_fetch_assoc($sql)) { 
    array_push($data, $row); 
}
//akhir Query

$header = array( 
    array("label"=>"FORMULIR PENCATATAN PERKAWINAN", "length"=>0, "align"=>"C"),
    array("label"=>"KUA KONOHA SELATAN", "length"=>0, "align"=>"C")
);

$pdf->SetFont('Arial','B','12');
$pdf->SetFillColor(255);
$pdf->SetTextColor(0,0,0);
$pdf->SetDrawColor(255);
foreach ($header as $kolom) {
    $pdf->Cell($kolom['length'], 5, $kolom['label'], 1, '0', $kolom['align'], true);
    $pdf->Ln();
}

$header = array( 
    array("label"=>"email: go-married@gmail.com fax: 0317998678 web: http://go-married.com/", "length"=>0, "align"=>"C")
);

$pdf->SetFont('Arial','I','10');
$pdf->SetFillColor(255);
$pdf->SetTextColor(0,0,0);
$pdf->SetDrawColor(255);
foreach ($header as $kolom) {
    $pdf->Cell($kolom['length'], 5, $kolom['label'], 1, '0', $kolom['align'], true);
    $pdf->Ln();
}


$pdf->SetDrawColor(0,0,0);
$pdf->Cell(0,1, "", 1, 0, 'C');
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();

$header = array( 
    array("label"=>"", "length"=>15, "align"=>"L"),
    array("label"=>"", "length"=>55, "align"=>""),
    array("label"=>"Keterangan calon mempelai pria", "length"=>60, "align"=>"C"),
    array("label"=>"Keterangan calon mempelai wanita", "length"=>60, "align"=>"C")
);

$pdf->SetFont('Arial','I','9');
$pdf->SetFillColor(255);
$pdf->SetTextColor(0,0,0);
$pdf->SetDrawColor(255);
$pdf->Cell(53,5, "I. Biodata Mempelai", 1, '0', 'L');
$pdf->Ln();
foreach ($header as $kolom) {
    $pdf->Cell($kolom['length'], 5, $kolom['label'], 1, '0', $kolom['align'], true);
}
$pdf->Ln();
$pdf->Ln();


foreach ($data as $baris) {
	$i=0;
    $pdf->SetFont('Arial','','10');
    $pdf->Cell(7,5, "", 1, '0', 'C');
    $pdf->Cell(8,5, "1.", 1, '0', 'C');
    $pdf->Cell(53,5, "Nama", 1, '0', 'L');
    $pdf->Cell(2,5, ":", 1, '0', 'L');
    $pdf->Cell(60,5, $baris["nama"], 1, '0', 'L');
    $pdf->Cell(60,5, $baris["nama_cw"], 1, '0', 'L');

    $pdf->Ln();
    $pdf->Cell(7,5, "", 1, '0', 'C');
    $pdf->Cell(8,5, "2.", 1, '0', 'C');
    $pdf->Cell(53,5, "Tempat, Tanggal Lahir / umur *)", 1, '0', 'L');
    $pdf->Cell(2,5, ":", 1, '0', 'L');
    $pdf->Cell(60,5, $baris["tempat_lahir"].", ".date("d F Y", strtotime($baris["tgl_lahir"]))." / ".$baris["umur"]."th", 1, '0', 'L');
    $pdf->Cell(60,5, $baris["tempat_lahir_cw"].", ".date("d F Y", strtotime($baris["tgl_lahir_cw"]))." / ".$baris["umur_cw"]."th", 1, '0', 'L');

    $pdf->Ln();
    $pdf->Cell(7,5, "", 1, '0', 'C');
    $pdf->Cell(8,5, "3.", 1, '0', 'C');
    $pdf->Cell(53,5, "Agama", 1, '0', 'L');
    $pdf->Cell(2,5, ":", 1, '0', 'L');
    $pdf->Cell(60,5, $baris["agama"], 1, '0', 'L');
    $pdf->Cell(60,5, $baris["agama_cw"], 1, '0', 'L');

    $pdf->Ln();
    $pdf->Cell(7,5, "", 1, '0', 'C');
    $pdf->Cell(8,5, "4.", 1, '0', 'C');
    $pdf->Cell(53,5, "Alamat", 1, '0', 'L');
    $pdf->Cell(2,5, ":", 1, '0', 'L');
    $pdf->Cell(60,5, $baris["alamat"], 1, '0', 'L');
    $pdf->Cell(60,5, $baris["alamat_cw"], 1, '0', 'L');

    $pdf->Ln();
    $pdf->Cell(7,5, "", 1, '0', 'C');
    $pdf->Cell(8,5, "5.", 1, '0', 'C');
    $pdf->Cell(53,5, "Sudah/Belum pernah kawin **)", 1, '0', 'L');
    $pdf->Cell(2,5, ":", 1, '0', 'L');
    $pdf->Cell(60,5, $baris["status_kawin"], 1, '0', 'L');
    $pdf->Cell(60,5, $baris["status_kawin_cw"], 1, '0', 'L');

    $pdf->Ln();
    $pdf->Cell(7,5, "", 1, '0', 'C');
    $pdf->Cell(8,5, "6.", 1, '0', 'C');
    $pdf->Cell(53,5, "Status Kewarganegaraan **)", 1, '0', 'L');
    $pdf->Cell(2,5, ":", 1, '0', 'L');
    $pdf->Cell(60,5, $baris["status_wn"], 1, '0', 'L');
    $pdf->Cell(60,5, $baris["status_wn_cw"], 1, '0', 'L');

    $pdf->Ln();
}


$header2 = array( 
    array("label"=>"", "length"=>15, "align"=>"L"),
    array("label"=>"", "length"=>55, "align"=>""),
    array("label"=>"Bapak Mempelai Pria", "length"=>60, "align"=>"C"),
    array("label"=>"Bapak Mempelai Wanita", "length"=>60, "align"=>"C")
);

$pdf->SetFont('Arial','I','9');
$pdf->SetFillColor(255);
$pdf->SetTextColor(0,0,0);
$pdf->SetDrawColor(255);
$pdf->Ln();
$pdf->Ln();
$pdf->Cell(53,5, "II. Biodata Orang Tua Mempelai", 1, '0', 'L');
$pdf->Ln();
foreach ($header2 as $kolom) {
    $pdf->Cell($kolom['length'], 5, $kolom['label'], 1, '0', $kolom['align'], true);
}
$pdf->Ln();
$pdf->Ln();

foreach ($data as $baris) {
	$i=0;
    $pdf->SetFont('Arial','','10');
    $pdf->Cell(7,5, "", 1, '0', 'C');
    $pdf->Cell(8,5, "1.", 1, '0', 'C');
    $pdf->Cell(53,5, "Nama", 1, '0', 'L');
    $pdf->Cell(2,5, ":", 1, '0', 'L');
    $pdf->Cell(60,5, $baris["nama_ay"], 1, '0', 'L');
    $pdf->Cell(60,5, $baris["nama_ay_cw"], 1, '0', 'L');

    $pdf->Ln();
    $pdf->Cell(7,5, "", 1, '0', 'C');
    $pdf->Cell(8,5, "2.", 1, '0', 'C');
    $pdf->Cell(53,5, "Tanggal Lahir", 1, '0', 'L');
    $pdf->Cell(2,5, ":", 1, '0', 'L');
    $pdf->Cell(60,5, date("d F Y", strtotime($baris["tgl_lahir_ay"])), 1, '0', 'L');
    $pdf->Cell(60,5, date("d F Y", strtotime($baris["tgl_lahir_ay_cw"])), 1, '0', 'L');

    $pdf->Ln();
    $pdf->Cell(7,5, "", 1, '0', 'C');
    $pdf->Cell(8,5, "3.", 1, '0', 'C');
    $pdf->Cell(53,5, "Agama", 1, '0', 'L');
    $pdf->Cell(2,5, ":", 1, '0', 'L');
    $pdf->Cell(60,5, $baris["agama_ay"], 1, '0', 'L');
    $pdf->Cell(60,5, $baris["agama_ay_cw"], 1, '0', 'L');

    $pdf->Ln();
    $pdf->Cell(7,5, "", 1, '0', 'C');
    $pdf->Cell(8,5, "4.", 1, '0', 'C');
    $pdf->Cell(53,5, "Alamat", 1, '0', 'L');
    $pdf->Cell(2,5, ":", 1, '0', 'L');
    $pdf->Cell(60,5, $baris["alamat_ay"], 1, '0', 'L');
    $pdf->Cell(60,5, $baris["alamat_ay_cw"], 1, '0', 'L');

    $pdf->Ln();
}

$header3 = array( 
    array("label"=>"", "length"=>15, "align"=>"L"),
    array("label"=>"", "length"=>55, "align"=>""),
    array("label"=>"Ibu Mempelai Pria", "length"=>60, "align"=>"C"),
    array("label"=>"Ibu Mempelai Wanita", "length"=>60, "align"=>"C")
);
$pdf->SetFont('Arial','I','9');
$pdf->SetFillColor(255);
$pdf->SetTextColor(0,0,0);
$pdf->SetDrawColor(255);
foreach ($header3 as $kolom) {
    $pdf->Cell($kolom['length'], 5, $kolom['label'], 1, '0', $kolom['align'], true);
}
$pdf->Ln();
$pdf->Ln();

foreach ($data as $baris) {
	$i=0;
    $pdf->SetFont('Arial','','10');
    $pdf->Cell(7,5, "", 1, '0', 'C');
    $pdf->Cell(8,5, "1.", 1, '0', 'C');
    $pdf->Cell(53,5, "Nama", 1, '0', 'L');
    $pdf->Cell(2,5, ":", 1, '0', 'L');
    $pdf->Cell(60,5, $baris["nama_ibu"], 1, '0', 'L');
    $pdf->Cell(60,5, $baris["nama_ibu_cw"], 1, '0', 'L');

    $pdf->Ln();
    $pdf->Cell(7,5, "", 1, '0', 'C');
    $pdf->Cell(8,5, "2.", 1, '0', 'C');
    $pdf->Cell(53,5, "Tanggal Lahir", 1, '0', 'L');
    $pdf->Cell(2,5, ":", 1, '0', 'L');
    $pdf->Cell(60,5, date("d F Y", strtotime($baris["tgl_lahir_ibu"])), 1, '0', 'L');
    $pdf->Cell(60,5, date("d F Y", strtotime($baris["tgl_lahir_ibu_cw"])), 1, '0', 'L');

    $pdf->Ln();
    $pdf->Cell(7,5, "", 1, '0', 'C');
    $pdf->Cell(8,5, "3.", 1, '0', 'C');
    $pdf->Cell(53,5, "Agama", 1, '0', 'L');
    $pdf->Cell(2,5, ":", 1, '0', 'L');
    $pdf->Cell(60,5, $baris["agama_ibu"], 1, '0', 'L');
    $pdf->Cell(60,5, $baris["agama_ibu_cw"], 1, '0', 'L');

    $pdf->Ln();
    $pdf->Cell(7,5, "", 1, '0', 'C');
    $pdf->Cell(8,5, "4.", 1, '0', 'C');
    $pdf->Cell(53,5, "Alamat", 1, '0', 'L');
    $pdf->Cell(2,5, ":", 1, '0', 'L');
    $pdf->Cell(60,5, $baris["alamat_ibu"], 1, '0', 'L');
    $pdf->Cell(60,5, $baris["alamat_ibu_cw"], 1, '0', 'L');

    $pdf->Ln();
}

$header4 = array( 
    array("label"=>"", "length"=>15, "align"=>"L"),
    array("label"=>"", "length"=>55, "align"=>""),
    array("label"=>"Saksi Mempelai Pria", "length"=>60, "align"=>"C"),
    array("label"=>"Saksi Mempelai Wanita", "length"=>60, "align"=>"C")
);

$pdf->SetFont('Arial','I','9');
$pdf->SetFillColor(255);
$pdf->SetTextColor(0,0,0);
$pdf->SetDrawColor(255);
$pdf->Ln();
$pdf->Ln();
$pdf->Cell(53,5, "II. Biodata Saksi Mempelai", 1, '0', 'L');
$pdf->Ln();
foreach ($header4 as $kolom) {
    $pdf->Cell($kolom['length'], 5, $kolom['label'], 1, '0', $kolom['align'], true);
}
$pdf->Ln();
$pdf->Ln();

foreach ($data as $baris) {
	$i=0;
    $pdf->SetFont('Arial','','10');
    $pdf->Cell(7,5, "", 1, '0', 'C');
    $pdf->Cell(8,5, "1.", 1, '0', 'C');
    $pdf->Cell(53,5, "Nama", 1, '0', 'L');
    $pdf->Cell(2,5, ":", 1, '0', 'L');
    $pdf->Cell(60,5, $baris["nama_s"], 1, '0', 'L');
    $pdf->Cell(60,5, $baris["nama_scw"], 1, '0', 'L');

    $pdf->Ln();
    $pdf->Cell(7,5, "", 1, '0', 'C');
    $pdf->Cell(8,5, "2.", 1, '0', 'C');
    $pdf->Cell(53,5, "Tanggal Lahir", 1, '0', 'L');
    $pdf->Cell(2,5, ":", 1, '0', 'L');
    $pdf->Cell(60,5, date("d F Y", strtotime($baris["tgl_lahir_s"])), 1, '0', 'L');
    $pdf->Cell(60,5, date("d F Y", strtotime($baris["tgl_lahir_scw"])), 1, '0', 'L');

    $pdf->Ln();
    $pdf->Cell(7,5, "", 1, '0', 'C');
    $pdf->Cell(8,5, "3.", 1, '0', 'C');
    $pdf->Cell(53,5, "Alamat", 1, '0', 'L');
    $pdf->Cell(2,5, ":", 1, '0', 'L');
    $pdf->Cell(60,5, $baris["alamat_s"], 1, '0', 'L');
    $pdf->Cell(60,5, $baris["alamat_scw"], 1, '0', 'L');

    $pdf->Ln();
    $pdf->Ln();
}

$header5 = array( 
    array("label"=>"", "length"=>5, "align"=>"L"),
    array("label"=>"*) lampirkan fotocopy akta kelahiran", "length"=>65, "align"=>""),
    array("label"=>"", "length"=>50, "align"=>"C"),
    array("label"=>"Surabaya, ".date("d F Y"), "length"=>70, "align"=>"L")
);

$pdf->SetFont('Arial','I','9');
$pdf->SetFillColor(255);
$pdf->SetTextColor(0,0,0);
$pdf->SetDrawColor(255);
$pdf->Ln();
$pdf->Ln();

foreach ($header5 as $kolom) {
    $pdf->Cell($kolom['length'], 2, $kolom['label'], 1, '0', $kolom['align'], true);
}

$header6 = array( 
    array("label"=>"", "length"=>5, "align"=>"L"),
    array("label"=>"**) lampirkan surat pernyataan persetujuan", "length"=>65, "align"=>""),
    array("label"=>"", "length"=>50, "align"=>"C"),
    array("label"=>"Pemohon,", "length"=>70, "align"=>"L")
);

$pdf->SetFont('Arial','I','9');
$pdf->SetFillColor(255);
$pdf->SetTextColor(0,0,0);
$pdf->SetDrawColor(255);
$pdf->Ln();
$pdf->Ln();

foreach ($header6 as $kolom) {
    $pdf->Cell($kolom['length'], 2, $kolom['label'], 1, '0', $kolom['align'], true);
}

foreach ($data as $baris) {

	$pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();
    $pdf->SetFont('Arial','','10');
    $pdf->Cell(7,5, "", 1, '0', 'C');
    $pdf->Cell(8,5, "", 1, '0', 'C');
    $pdf->Cell(53,5, "", 1, '0', 'L');
    $pdf->Cell(2,5, "", 1, '0', 'L');
    $pdf->Cell(60,5, "", 1, '0', 'L');
    $pdf->Cell(60,5, $baris["nama"], 1, '0', 'L');


}


$pdf->Output(); 

?>