<?php
session_start();
$name=$_SESSION["print"]["name"];
$add=$_SESSION["print"]["add"];
$mob=$_SESSION["print"]["mob"];
$income=$_SESSION["print"]["income"];
$purpose=$_SESSION["print"]["purpose"];
$gender=$_SESSION["print"]["gender"];

if ($gender =='male')
{$hs='He';
 $self='Himself'; $hhs='His';}
else {$hs='She';$self='herself'; $hhs='Her';}

$doc=$_SESSION["print"]["doc"];
if($doc[0]!=null)
{$str1="Ration Card Submitted in Name Of family Head : $name.";}
if($doc[1]!=null)
{$str2="Income Proof/Receipt Submitted in Name : $name.";}
if($doc[2]!=null)
{$str3="Birth certificate Submitted in Name of $self : $name.";}
if($doc[3]!=null)
{$str4="Aaddhar Card Submitted in Name Of $self : $name.";}

$cert=$_SESSION["print"]["cert_no"];
$d[0]=$_SESSION["print"]["date"]["mday"];
$d[1]=$_SESSION["print"]["date"]["month"];
$d[2]=$_SESSION["print"]["date"]["year"];
$dd=$d[2]+1;
require_once('qrcode/qrcode.class.php');
$msg="Certificate no. :$cert 
	  Name :$name
	  type: Income Certificate.
	  Annual Income: $income Rs.
	  Purpose :$purpose.
	  DOI: $d[0] $d[1] $d[2].
	  valid upto :$d[0] $d[1] $dd.";
$qrcode = new QRcode(utf8_encode($msg), 'L');

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
	<h5 align='center'><u>INCOME CERTIFICATE</u></h5>
	<h5 align='center'>( Issued By Authorities in State of Maharashtra )</h5>
	<h4 align='center'><u><b>CERTIFICATE</b></u></h4>
	<ul style='font-size:11px;'> On Submission of the Proof noted below , it is hereby Certified that, Mr/Mrs/Shri <b> $name </b>, $hs having Currently Residence At <b>$add, Maharashtra </b>is having total family Income from all Sources is as:-</ul>
		<table border='1' align='center'>
		<tr align='center'>
		  <th>Year</th><th>Total Income(Rs)</th>
		</tr>
		<tr align='center'>
		  <td>$d[2] - $dd.</td><td align='center'> $income Rs.</td>
		</tr>
		</table>
	<ul style='font-size:11px;'>Currently this certificate Is Provided to Mr/Mrs/Shri <b> $name </b>, for the Purpose of $purpose for $hhs Son/Daughter/$self. </ul>	
	<h4 align='center'>Particulers of Proof Submitted </h4>
	<ul style='font-size:11px;'>Application Details : $d[0] $d[1] $d[2].</ul>
	<ul style='font-size:11px;'> $str1 .</ul> <ul style='font-size:11px;'>$str2 .</ul> <ul style='font-size:11px;'>$str3.</ul style='font-size:11px;'> $str4. </ul>

	</div>
<div  style='width:140px;height:140px;'><h4 align='center'> SR NO. : $cert</h4><img src='qrcode/image.php?msg=$msg &amp err=L' /> </div>
<div align='right' style='margin-left:350px;width:250px;height:20px;'><ul align='right'><b>Executive Magistrate </b></ul></div>
<h5>Date of Issue:$d[0] $d[1] $d[2]. valid upto $d[0] $d[1] $dd.</h5>
</div>";
include("mpdf.php");
$mpdf=new mPDF();
$mpdf->SetWatermarkImage('logo1.png', 0.1, 'F','F');
$mpdf->showWatermarkImage = true;
$mpdf->SetCreator('LAlIT_SUTHAR');
$mpdf->SetDisplayMode('fullpage');
$mpdf->WriteHTML($html);
$perm=array('print');
$mpdf->SetProtection ($perm,$mob,'admin',128);
$mpdf->Output(); 
exit;
 session_destroy();
?>




