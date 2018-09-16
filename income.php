<?php
	session_start();
if(!isset($_POST['submitform']))
{
	if($_SESSION["result"])
	{
		$sname=$_SESSION["result"]["name"];
		$smob=$_SESSION["result"]["mob"];
		$semail=$_SESSION["result"]["email"];
		}
	else
	{
		header("Location:login.php");
	}
}
if(isset($_POST['submitform']))
{
$con=new MongoClient();
$db=$con->setu;
$collection=$db->income;

$name=null;
$add =null;
$mob =null;
$email =null;
$gender =null;
$doc= null;
$income =null;
$purpose =null;
$today = getdate();
$name =strtoupper($_POST['name']);
$add =$_POST['add'];
$mob =$_POST['mob'];
$email =$_POST['email'];
$income =$_POST['income'];
$purpose=$_POST['purpose'];
$gender =$_POST['sex'];
$doc[0]=$_POST['doc0'];
$doc[1]=$_POST['doc1'];
$doc[2]=$_POST['doc2'];
$doc[3]=$_POST['doc3'];

function randomPrefix($length)
{
$random= "";
srand((double)microtime()*1000000);
$data = "AB12CD23EF45GH56IJ78KL89MN74OP41QR63ST45UV85WX89YZ52";
$data .= "1234567890";
for($i = 0; $i < $length; $i++)
{
$random .= substr($data, (rand()%(strlen($data))), 1);
}

return $random;
}

$cert=randomPrefix(6);

$_SESSION["cert_no"]=$cert;

$qry = array("cert_no"=>$cert, "name"=>$name,"mob"=>$mob, "email"=>$email,"gender"=>$gender,"add"=>$add,"doc"=>$doc,"income"=>$income,"purpose"=>$purpose,"date"=>$today,);
echo "<script type='text/javascript'>function aa{  var b=confirm('Do you want to continue !');return b;}</script>";
$b="aa()";

if(isset($b))
{
$result=$collection->insert($qry);
$pp=$collection->findOne($qry);

$_SESSION["print"]=$pp;
}
if(isset($result))
{	
	echo "<script type='text/javascript'>alert('Form Submitted ! Please Note Your certificate no.: $cert .');
	window.location ='http://localhost/setu/incomeprint.php';</script>";
	
}
else{
	echo "<script type='text/javascript'>alert('! Sorry SomeThing is Wrong!');
	window.location ='http://localhost/setu/usermain.php';</script>";
}
$con->close();
}

?>
<html>

<head>
 <title>E-setu</title>
 <link href='styles.css' rel='stylesheet' type='text/css'>
 <script>
  function validateForm() 
  {
      var x = document.forms['myForm']['fname'].value;
      if (x == null || x == "") 
  	{
          alert('Please enter Name !');
          return false;
      }
  	
  	var x = document.forms['myForm']['uname'].value;
      if (x == null || x == "") 
  	{
          alert('Please enter UserName !');
          return false;
      }
  	
  	var y = document.forms['myForm']['pname'].value;
      if (y == null || y == "") 
  	{
          alert('Please Enter Password !');
          return false;
      }
  	
  	var mob1=document.forms['myForm']['mob'].value;
  	if( mob1.length < 10 || mob1.length > 11)
  	{ alert('Mobile No Invalid(length)'); return false;}
  	
  	var email2=document.forms['myForm'].email;
  	if( email2.value==null || email2.value=="" )
  	{ alert('Enter valid email id.');email2.focus();return false;}
  	
  	
  	if(! document.myForm.sex[0].checked && ! document.myForm.sex[0].checked )
  	{ alert('select gender.');return false;}
  	
  
  	return true;
  	
  }
 </script>
</head>

<body >
 <center>
  <?php

	include('header.php');	
	?>
   <table class='menu1'>
    <tr>
     <td>
      <div>
       <fieldset class='abc'  style="margin-left:280px;">
        <legend>Income Certificate </legend>
        <form name='myForm' action="" onsubmit='return validateForm()' method='post'>
         <table class='login' width='500pt'>
          <tr>
           <td>Full Name<sup>*</sup> :</td>
           <td>
            <input type='text'  size='38' name='name' value="<?php  echo $sname; ?>" placeholder='Surname  First_name  Middle_name' required>
           </td>
          </tr>
          <tr>
           <td>Address :</td>
           <td>
            <textarea cols="25" rows="3" name="add" value="" placeholder="house no./name/apartment, street name,area_name, village/town/city, district,pincode:123456"></textarea>
           </td>
          </tr>
          <tr>
           <td>Mobile No<sup>*</sup>:</td>
           <td>
            <input type="text" name="mob" size="10" value="<?php echo $smob; ?>" placeholder="9876543210" required>
           </td>
          </tr>
          <tr>
           <td>Email Id:</td>
           <td>
            <input type="email" name="email" size="25" value="<?php echo $semail; ?>" placeholder="abc@example.com">
           </td>
          </tr>
          <tr>
           <td>Gender :</td>
           <td>
            <input name="sex" value="male" type="radio" required>Male.&nbsp;
            <input name="sex" value="female" type="radio"required>Female</td>
          </tr>
          
          <tr>
           <td>Document<sup>*</sup>:</td>
           <td>
            <input name="doc0" value="Ration_card" type="checkbox" >Ration card
            <br>
            <input name="doc1" value="Income_Proof/Receipt" type="checkbox" >Income Proof/Receipt
            <br>
            <input name="doc2" value="Birth_Certificate" type="checkbox" >Birth Certificate 
			<br>
            <input name="doc3" value="Adhaar_card" type="checkbox" >Adhaar card</td>
          </tr>
		  <tr>
			<td>Annual income <sup>*</sup>:</td><td><input type="text" name="income" size="15" required placeholder="In Rupees"/></td>
		  </tr>
		  <tr>
			<td>Purpose<sup>*</sup>:</td><td><input type="text" name="purpose" size="40" required placeholder="Eg.: Education,judicial,scholarship"/></td>
		  </tr>
          <tr>
           <td colspan="2" align="right">
            <h6 style="color:black;">* is Mandatory</h6>
           </td>
          </tr>
          <tr align="center">
           <td colspan="2">
            <input class="bt" type="submit" name="submitform" value="Submit">
            <input class="bt" type="Reset" value="Reset">
            <a href="usermain.php">
             <input class="bt" type="button" value="Home">
            </a>
           </td>
          </tr>
         </table>
        </form>
       </fieldset>
      </div>
     </td>
    </tr>
   </table>


  </ul>
<?php

	include('footer.php');	

?>
  </div>
 </center>
</body>
</html>
<?php


?>
