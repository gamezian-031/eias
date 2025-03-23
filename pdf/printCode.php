<?php
require('vendor/autoload.php');

$con=mysqli_connect('localhost','root','','eias');
$res=mysqli_query($con,"SELECT * FROM `tbl_items` INNER JOIN tbl_location ON tbl_items.location_id=tbl_location.location_id INNER JOIN tbl_category ON tbl_items.category_id = tbl_category.category_id INNER JOIN tbl_brands ON tbl_items.brand_id = tbl_brands.brand_id");

$PNG_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'phpqrcode/temp'.DIRECTORY_SEPARATOR;
                                            
//html PNG location prefix
$PNG_WEB_DIR = 'phpqrcode/temp/';

//  include $_SERVER['DOCUMENT_ROOT']."/phpqrcode/qrlib.php";
//  include "phpqrcode/qrlib.php";
 include "phpqrcode/qrlib.php";
 $PNG_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'phpqrcode/temp'.DIRECTORY_SEPARATOR;
//   $PNG_TEMP_DIR =  $_SERVER['DOCUMENT_ROOT'].'/eias/phpqrcode/temp'.DIRECTORY_SEPARATOR;
                                            
 //html PNG location prefix
 $PNG_WEB_DIR = 'phpqrcode/temp/';
 $res=mysqli_query($con,"SELECT * FROM `tbl_items` INNER JOIN tbl_location ON tbl_items.location_id=tbl_location.location_id INNER JOIN tbl_category ON tbl_items.category_id = tbl_category.category_id INNER JOIN tbl_brands ON tbl_items.brand_id = tbl_brands.brand_id");


if(mysqli_num_rows($res)>0){
	
	$html='<div class="login100-form-title" style="background-image: url(dist/images/PUPLogo.png);"></div>
	
	<center style="text-align:center; color: maroon;"><b>POLYTECHNIC UNIVERSITY OF THE PHILIPPINES</b></center>
	<center style="text-align:center;">Taguig Branch</center>
	<center style="text-align:center;">Gen. Santos Ave., Lower Bicutan, Taguig City</center>
	<center style="text-align:center;"><b>_________________________________________________________________________________________________________________</b></center>
	<h1 style="text-align: center;" "font-family: "Times New Roman", Times, serif;"> Item Information </h1>
	<p>Date/Time: <span id="datetime"></span></p>
	<script>var dt = new Date();
document.getElementById("datetime").innerHTML=dt.toLocaleString();</script>
		<style></style><table cellspacing="0" cellpadding="5" border="1">';
		$html.='<tr>
		<td width="5%"> <center><b>QR Code</b></center> </td>
		<td width="10%"> <center><b>Item Name</b></center>  </td>
		<td width="10%"> <center><b>Item Code</b></center>  </td>
		<td width="10%"> <center><b>Brand</b></center>  </td>
		<td width="10%"> <center><b>Location</b></center>  </td>
	 	</tr>';
		while($row=mysqli_fetch_assoc($res)){
		    $filename = $PNG_TEMP_DIR.'qrcode-'.$row['item_id'].'.png';
		       $errorCorrectionLevel = 'L';
                  $errorCorrectionLevel = 'L';
                    $matrixPointSize = 4;
                    $qritem = 'https://csovernightstaguig.online/eias/scanview.php?id='.$row['item_id'];
                    QRcode::png($qritem, $filename, $errorCorrectionLevel, $matrixPointSize, 2);
			$html.='<tr><td><center><img src="'.$PNG_WEB_DIR.basename($filename).'" style="width: 70px"/></td><td><center>'.$row['category_name'].'</td><td><center>'.$row['item_name'].'</td><td><center>'.$row['brand_name'].'</td><td><center>'.$row['location_name'].'</td></tr>';
		}
		
	$html.='</table>';
}else{
	$html="No Data Available...";
}
$mpdf=new \Mpdf\Mpdf([
	'default_font_size' => 12,
	'default_font' => 'FreeSans',
	'mode' => 'utf-8', 'format' => 'A4-L'
]);
$mpdf->WriteHTML($html);
$mpdf->Image('PUPLogo.png', 70, 13, 20, 20, 'png', '', true, false);
$mpdf->SetHTMLHeader($htmlHeader);
$file='History_Log/'.time().'.pdf';
$mpdf->output($file,'I');
$html='<img src'.$inputPath.'/>';
// $mpdf->imageVars['myvariable'] = file_get_contents('bg-pupt.jpg');
// $htmls = '<img src="var:myvariable" />';
// $mpdf->WriteHTML($htmls);
//D
//I
//F
//S
?>
 