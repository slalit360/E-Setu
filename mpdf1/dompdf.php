<?php
session_start();
$name=$_SESSION["print"]["name"];
$add=$_SESSION["print"]["add"];
$mob=$_SESSION["print"]["mob"];
$dob=$_SESSION["print"]["dob"];
$bplace=$_SESSION["print"]["bplace"];
$mobile=$_SESSION["print"]["mob"];
$gender=$_SESSION["print"]["gender"];

if ($gender =='male')
{$hs='He';
 $self='Himself';}
else {$hs='She';$self='herself';}

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
$dd=$d[2]+5;
require_once('qrcode/qrcode.class.php');
$msg="Certificate no. :$cert 
	  Name :$name
	  type: Domacile Certificate.
	  DOB: $dob.
	  DOI: $d[0] $d[1] $d[2]";
$qrcode = new QRcode(utf8_encode($msg), 'L');

$html = "
<style>
.logo{margin-left:260px;}
</style>
.qrcode{ border:0.3mm solid #000033;display:inline-block;width:400px;height:40%;border-style:solid;margin-bottom:10px;margin-right:10px;}
.sign{border:0.3mm solid #000033;display:inline-block;width:360px;height:100px;border-style:solid;margin-bottom:10px;}
<body>
<div style='border:0.6mm solid #000033; padding:20px 20px 20px 20px;'>
	<div>
	<img class='logo' src='../img/india.png'  width='90' height='150'/>
	<h3 align='center'>SETU SUVIDHA KENDRA , MAHARASHTRA</h3>
	<h4 align='center'><u>CERTIFICATE OF AGE , NATIONALITY & DOMICILE</u></h4>
	<h5 align='center'>( Issued By Authorities in State of Maharashtra )</h5>
	<h3 align='center'><u><b>CERTIFICATE</b></u></h3>
	<p style='font-size:14px;'> On Submission of the Proof noted below , it is hereby Certified that, Mr/Mrs/Shri <b>$name</b>  was born on <b>$dob</b> at Village/town/city/state <b>$bplace </b> within the Territory of India and $hs having Currently Residence At <b>$add, Maharashtra </b> and that $hs is CITIZEN OF INDIA and $hs is domiciled in the State of Maharashtra By Residence and choice. </p>
	<h4 align='center'>Particulers of Proof Submitted </h4>
	<ul>Application Details : $d[0] $d[1] $d[2]</ul>
	<ul> $str1 </ul>
	<ul> $str2 </ul>
	<ol> $str3 </ol>
	<ol> $str4 </ol>
	</div>
<div  style='width:140px;height:140px;'><h4 align='center'>SR NO.: $cert</h4><img src='qrcode/image.php?msg=$msg &amp err=L' /> </div>
<div align='right' style='margin-left:350px;width:250px;height:20px;'><h4 align='right'><b>Executive Magistrate </b></h4></div>
<h5>Date of Issue:$d[0] $d[1] $d[2] . Valid upto $d[0] $d[1] $dd. </h5>
</div>";
include("mpdf.php");
$mpdf=new mPDF();
$mpdf->SetWatermarkImage('logo1.wmf', 0.1, 'F','F');
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




