<?php
session_start();
$name=$_SESSION["print"]["name"];
$add=$_SESSION["print"]["add"];
$mob=$_SESSION["print"]["mob"];
$dob=$_SESSION["print"]["dob"];
$idno=$_SESSION["print"]["idno"];

$d[0]=$_SESSION["print"]["date"]["mday"];
$d[1]=$_SESSION["print"]["date"]["month"];
$d[2]=$_SESSION["print"]["date"]["year"];

require_once('qrcode/qrcode.class.php');
$msg="ID Card No.:$idno 
	  Name :$name
	  DOB :$dob
	  contact : $mob
	  DOI: $d[0] $d[1] $d[2]";
$qrcode = new QRcode(utf8_encode($msg), 'L');

$html = "
<html>
<head>
<style>
td{font-size:15px;}
</style>
</head>
<body>
	<div style='border:0.6mm solid #000033; padding:10px 10px 10px 10px;'>
	<table>
	<tr><th align='center' colspan='3'><h2>Senior Citizen ID card.</h2></th></tr>
		<tr>
			<td width='150px' ><table><tr align='center'><td align='center'> Stick Passport Size Photo</td></tr></table></td>
			<td  align='center'><img  height='150px' width='120px' src='../img/india.png'/></td>
			<td  align='center'><img border='1' height='160px' width='158px' src='qrcode/image.php?msg=$msg &amp err=L' /></td>
		</tr>
		<tr>
		  <td>ID NO.:</td> <td><b>$idno</b></td>
		</tr>
		<tr>
		  <td>Name :</td> <td><b>$name</b></td>
		</tr>
		<tr>
		  <td>Add :</td> <td><b>$add</b></td>
		</tr>
		<tr>
		  <td>Contact No.:</td> <td><b>$mob</b></td>
		</tr>
		<tr>
		  <td>DOB :</td> <td><b>$dob</b></td>
		</tr>
		<tr>
			<td colspan='2' ><h4 align='left'>Date of Issue : $d[0]-$d[1]-$d[2].</h4></td><td><h4 align='right'>Sub.Divisional Officer.</h4></td>
	    </tr>
		<tr><th align='center' colspan='3'><h3>2015.E-Setu.</h3></th></tr>
	</table>
</body>
</html>";
include("mpdf.php");
$mpdf=new mPDF();
$mpdf->SetCreator('LAlIT_SUTHAR');
$mpdf->SetDisplayMode('fullpage');
$mpdf->WriteHTML($html);
$perm=array('print');
$mpdf->SetProtection ($perm,$mob,'admin',128);
$mpdf->Output(); 
exit;
 session_destroy();
?>




