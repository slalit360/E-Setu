<?php
session_start();
$name=$_SESSION["print"]["name"];
$add=$_SESSION["print"]["add"];
$caste=$_SESSION["print"]["caste"];
switch($caste)
{case 'OBC' :$caste='OBC (Other Backword Class)';break;
 case 'SC' :$caste='SC (Schedule Class)';break;
 case 'ST' :$caste='ST (Schedule Tribes)';break;
 case 'NT-A' :$caste='NT (Nomadic Tribes - A)';break;
 case 'NT-B' :$caste='NT (Nomadic Tribes - B)';break;
 }
$cert=$_SESSION["print"]["cert_no"];

$d[0]=$_SESSION["print"]["date"]["mday"];
$d[1]=$_SESSION["print"]["date"]["month"];
$d[2]=$_SESSION["print"]["date"]["year"];

//require_once('qrcode/qrcode.class.php');
//$msg="Certificate no. :$cert 
	//  Name :$name
	  //Caste:$caste
	  //DOI: $d[0] $d[1] $d[2]";
//$qrcode = new QRcode(utf8_encode($msg), 'L');

$html = "
<style>
.logo{margin-left:260px;}
</style>
.qrcode{ border:0.3mm solid #000033;display:inline-block;width:400px;height:40%;border-style:solid;margin-bottom:10px;margin-right:10px;}
.sign{border:0.3mm solid #000033;display:inline-block;width:360px;height:100px;border-style:solid;margin-bottom:10px;}
<body>
<div style='border:0.6mm solid #000033; padding:30px 30px 30px 30px;'>
	<div>
	<img class='logo' src='../img/india.png'  width='90' height='150'/>
	<h3 align='center'>SETU SUVIDHA KENDRA , MAHARASHTRA</h3>
	<h4 align='center'><u>CASTE CERTIFICATE (PART - A)</u></h4>
	<p>1. This is certify that Mr/Ms/Shri <b>$name</b> whose residential address is <b>$add, Maharashtra </b> which is recognised as a <b>$caste</b> Under the Government Resolution No. 1361/m 21st Nov 1961.</p>
	<p>2. Mr/Ms/Shri <b>$name</b> and his family ordinarily resides in District/Division of Maharashtra.</P>
  	<h4 align='center'><u>NON CREAMYLAYER CERTIFICATE (PART - B)</u></h4>
	<p>3. This is certify that Mr/Ms/Shri <b>$name</b> does not belong to the person/sections (Creamy Layer) mentioned in the Government of maharashtra Gazette, Part IV-B, dated 29th Jan,2004.</p>
	<p>Maharashtra State Public, Service (Reservation for $caste Act,2001 ) and instruction and guidelines laid down in Government Resolution, Social Justice,Culture Affairs,Sports and Special Assistance Department No. CBC-10/2001/Pra.Kra.120/Mavak-5, dated 1st Nov,2001 CBC-1049/Pra.Kra.86/Mavak-5,dated 5th june,1997 and Government Resolution No.CBC-10/2001/Pra.Kra.111/Mavak-5, dated 29th May,2003.</p>
	<p>4. This Certificate is valid for the period of 5 years from the date of issue. </p>
	</div>

	
	
<div align='right' style='margin-left:350px;width:250px;height:20px;'><h4 align='right'>Sub.Divisional Officer(Revenue)</h4></div>
<h5>Date of Issue:$d[0] $d[1] $d[2]</h5>
</div>";


//if (!defined('_MPDF_PATH')) 
//define('_MPDF_PATH','localhost/setu/mpdf/mpdf.php');
//require_once('mpdf.php');

include("mpdf.php");
$mpdf=new mPDF();
$mpdf->SetWatermarkImage('logo1.wmf', 0.1, 'F','F');
$mpdf->showWatermarkImage = true;
$mpdf->SetCreator('LALIT_SUTHAR');
$mpdf->SetDisplayMode('fullpage');
$mpdf->WriteHTML($html);
$perm=array('print');
$mpdf->SetProtection ($perm,$mob,'admin',128);
$mpdf->Output(); 
exit;
 session_destroy();

// <div  style='width:150px;height:150px;'><h4 align='center'> SR NO. : $cert</h4><img src='qrcode/image.php?msg=$msg &amp err=L' /> </div>
 ?>




