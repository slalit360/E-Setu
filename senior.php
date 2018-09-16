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

	$collection=$db->senior;

	$name=null;
	$add =null;
	$mob =null;
	$email =null;
	$gender = null;
	$doc= null;
	$today = getdate();
	$name = strtoupper($_POST['name']);
	$add = $_POST['add'];
	$dd = $_POST['dd'];
	$mm = $_POST['mm'];
	$yy = $_POST['yy'];
	$mob = $_POST['mob'];
	$email = $_POST['email'];
	$gender = $_POST['sex'];
	$doc[0] = $_POST['doc0'];
	$doc[1] = $_POST['doc1'];
    $dob="$dd-$mm-$yy";

	function random($length)
		{
		$random= "";
		srand((double)microtime()*1000000);
		$data = "12234556788974O416345858952";
		$data .= "1234567890";
		for($i = 0; $i < $length; $i++)
		{
		$random .= substr($data, (rand()%(strlen($data))), 1);
		}

		return $random;
		}

	$idno=random(5);
	$_SESSION["idno"]=$idno;

	$qry = array("idno"=>$idno, "name"=>$name,"mob"=>$mob, "email"=>$email,     "gender"=>$gender,"dob"=>$dob,"add"=>$add,"doc"=>$doc,"date"=>$today,);
	echo "<script type='text/javascript'>function aa{  var b=confirm('Do you want to continue !');return b;}</script>";
	$b="aa()";
	$d=$today["year"];
	$diff=$d-$yy;
	$rrr=60-$diff;
	if($diff>=60)
	{
		if(isset($b))
		{
		$result=$collection->insert($qry);
		$pp=$collection->findOne($qry);
		$_SESSION["print"]=$pp;
		}
	}
	if(isset($result))
	{	
		echo "<script type='text/javascript'>alert('Form Submitted ! Please Note Your ID card No.: $idno .');
		window.location ='http://localhost/setu/mpdf/seniorpdf.php';</script>";
		
	}
	else{
		echo "<script type='text/javascript'>alert('Sorry You are not Senior Citizen ! wait for $rrr Years.');
		window.location ='http://localhost/setu/usermain.php';</script>";
	}
	$con->close();
	}

?>
<html>

<head>
 <title>E-setu</title>
 <link href="styles.css" rel="stylesheet" type="text/css">
 <script>
  function validateForm() 
  {
      var x = document.forms["myForm"]["name"].value;
      if (x == null || x == "") 
  	{
          alert("Please enter Name !");
          return false;
      }
  
  	var mob1=document.forms["myForm"]["mob"].value;
  	if( mob1.length < 10 || mob1.length > 11)
  	{ alert("Mobile No Invalid(length)"); return false;}
  	
  	var email2=document.forms["myForm"].email;
  	if( email2.value==null || email2.value=="" )
  	{ alert("Enter valid email id.");email2.focus();return false;}
  	
  	
  	if(! document.myForm.sex[0].checked && ! document.myForm.sex[0].checked )
  	{ alert("select gender.");return false;}
  	
  
  	return true;
  	
  }
 </script>
</head>

<body>
 <center>
  <?php include( 'header.php'); ?>
  <table class="menu1">
   <tr>
    <td>
     <div>
      <fieldset class="abc" style="margin-left:280px;">
       <legend>Senior Citizen ID Application Form</legend>
       <form name="myForm" onsubmit="return validateForm()" action="" method="post">
        <table class="login" width="500pt">
         <tr>
          <td>Full Name<sup>*</sup> :</td>
          <td>
           <input type="text" name="name" size="30"  	value="<?php echo $sname;?>"  placeholder="Full Name" required>
		  
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
           <input name="sex" value="male" type="radio">Male
           <br>
           <input name="sex" value="female" type="radio">Female</td>
         </tr>
         <tr>
          <td>Date Of Birth<sup>*</sup> :</td>
          <td>
           <input type="text" name="dd" size="2"  placeholder="DD" required>-<input type="text" name="mm" size="2"  placeholder="MM" required>-<input type="text" name="yy" size="4"  placeholder="YYYY" required>.
		  </td>
         </tr>
         <tr>
          <td>Document<sup>*</sup>:</td>
          <td>
           <input name="doc0" value="Birth Certificate" type="checkbox">Birth Certificate
           <br>
           <input name="doc1" value="Addhar card" type="checkbox">Addhar card</td>
         </tr>

         <tr>
          <td colspan="2" align="right">
           <h6>* is Mandatory</h6>
          </td>
         </tr>
         <tr align="center">
          <td colspan="2">
           <input class="bt" name="submitform" type="submit" value="Submit">
           <input class="bt" type="Reset" value="Reset">
           <a href="login.php">
            <input class="bt" type="button" value="Logout">
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

  <?php include( 'footer.php'); ?>
  </div>
 </center>
</body>