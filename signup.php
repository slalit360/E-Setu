<html>

<head>
 <title>E-setu</title>
 <link href="styles.css" rel="stylesheet" type="text/css">
 <script>
  function validateForm() 
  {
      var x = document.forms["myForm"]["fname"].value;
      if (x == null || x == "") 
  	{
          alert("Please enter Name !");
          return false;
      }
  	
  	var x = document.forms["myForm"]["uname"].value;
      if (x == null || x == "") 
  	{
          alert("Please enter UserName !");
          return false;
      }
  	
  	var y = document.forms["myForm"]["pname"].value;
      if (y == null || y == "") 
  	{
          alert("Please Enter Password !");
          return false;
      }
  	
  	var mob1=document.forms["myForm"]["mob"].value;
  	if( mob1.length < 10 || mob1.length > 11)
  	{ alert("Mobile No Invalid(length)"); return false;}
  	
  	var email2=document.forms["myForm"].email;
  	if( email2.value==null || email2.value=="" )
  	{ alert("Enter valid email id.");email2.focus();return false;}
  	
  	
  	if(document.myForm.sex[0].checked && !document.myForm.sex[0].checked )
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
      <fieldset class="abc" style="margin-left:340px;">
       <legend>Signup</legend>
       <form name="myForm" onsubmit="return validateForm()" method="post">
        <table class="login">
         <tr>
          <td>Full Name<sup>*</sup> :</td>
          <td>
           <input type="text" value="" name="fname" size="30" placeholder="Full Name" required>
          </td>
         </tr>
         <tr>
          <td>username<sup>*</sup> :</td>
          <td>
           <input type="text" value="" name="uname" size="25" placeholder="username" required>
          </td>
         </tr>
         <tr>
          <td>Password<sup>*</sup> :</td>
          <td>
           <input type="password" value="" name="pname" size="20" placeholder="password" required>
          </td>
         </tr>
         <tr>
          <td>Mobile No<sup>*</sup>:</td>
          <td>
           <input type="text" name="mob" value="" size="10" placeholder="9876543210" required>
          </td>
         </tr>
         <tr>
          <td>Email Id :</td>
          <td>
           <input type="email" value="" name="email" size="25" placeholder="email@example.com"
           required>
          </td>
         </tr>
         <tr>
          <td>Gender :</td>
          <td>
           <input name="sex" value="male" type="radio" required>Male
           <br>
           <input name="sex" value="female" type="radio" required>Female</td>
         </tr>
         <tr>
          <td colspan="2" align="right">
           <h6 style="color:black;">* is Mandatory</h6>
          </td>
         </tr>
         <tr align="center">
          <td colspan="2" class="value">
           <input class="bt" name="submitform" type="submit" value="Submit">
           <input class="bt" type="Reset" value="Reset">
           <a href="login.php">
            <input class="bt" type="button" value="Login">
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

<?php if(isset($_POST[ 'submitform'])) 
{ $con=new MongoClient();
  $db=$con->setu; 
  $collection=$db->customer; 
  $uname=null; 
  $pass =null; 
  $mob =null; 
  $name =null;
  $email =null; 
  $gender =null; 
  $uname =$_POST['uname']; 
  $pass = $_POST['pname'];
  $mob =$_POST['mob']; 
  $name =strtoupper($_POST['fname']); 
  $email =$_POST['email'];
  $gender =$_POST['sex']; 
  $qry = array("uname"=>$uname,"pass"=>$pass,"name"=>$name,"mob"=>$mob,"email"=>$email,"gender"=>$gender);
  $qry1 = array("uname"=>$uname);
  $yes=$collection->findOne($qry1);
	echo "<script type='text/javascript'>function aa{ var a=confirm('Do you want to continue !');return a;}</script>";
	$b="aa()";
	if(!$yes)
	{
		if(isset($b)) 
		{ $result=$collection->insert($qry); } 
		
		if(isset($result))
			{ echo "<script type='text/javascript'>alert('You  successfully Registered !')</script>"; } 
		else
			{ echo "<script type='text/javascript'>alert('! Sorry You Not Registered !')</script>"; } 
	}
	else
		{ echo "<script type='text/javascript'>alert('Username Already exist!')</script>"; }
  $con->close(); 
} 
?>
