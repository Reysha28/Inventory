<?php
	function generateRow(){
		$contents = '';
		include_once('koneksi.php');
		$sql = "SELECT * FROM barangmasuk";

		$query = $koneksi->query($sql);
		while($row = $query->fetch_assoc()){
			$contents .= "
			<tr>
				<td>".$row['kode']."</td>
				<td>".$row['nama']."</td>
				<td>".$row['idk']."</td>
				<td>".$row['tglmasuk']."</td>
                <td>".$row['kondisi']."</td>
                <td>".$row['jumlah']."</td>
                <td>".$row['status']."</td>
			</tr>
			";
		}
		
		return $contents;
	}

	require_once('tcpdf/tcpdf.php');  
    $pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
    $pdf->SetCreator(PDF_CREATOR);  
    $pdf->SetTitle("Laporan Kas LDKOM");  
    $pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
    $pdf->SetDefaultMonospacedFont('helvetica');  
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
    $pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);  
    $pdf->setPrintHeader(false);  
    $pdf->setPrintFooter(false);  
    $pdf->SetAutoPageBreak(TRUE, 5);  
    $pdf->SetFont('helvetica', '', 12);  
    $pdf->AddPage();  
    $content = '';  
    $content .= '
      	<h2 align="center">LAPORAN INVENTORY LDKOM</h2>
      	<h4>Daftar Barang</h4>
      	<table border="1" cellspacing="0" cellpadding="3">  
           <tr>  
                <th width="5%">Kode</th>
				<th width="15%">Nama</th>
				<th width="12%">Kategori</th>
				<th width="15%">Tanggal Masuk</th> 
                <th width="20%">Kondisi</th> 
                <th width="15%">Jumlah</th> 
                <th width="15%">Status</th> 
           </tr>  
      ';  
    $content .= generateRow();  
    $content .= '</table>';  
    $pdf->writeHTML($content);  
    $pdf->Output('laporan user.pdf', 'I');
	

?>