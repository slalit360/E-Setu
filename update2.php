<?php
	session_start();
if(!isset($_POST['submitform']))
{	if($_SESSION["new"])
	{
		   $yes=$_SESSION["new"]["uname"];
	}
	else
	{
		header("Location:adminmain.php");
	}

}
$yes=$_SESSION["new"]["uname"];
if(isset($_POST['submitform'])) 
{ $con=new MongoClient();
  $db=$con->setu; 
  $collection=$db->customer; 
  $uname =$_POST['uname']; 
  $pass = $_POST['pname'];
  $mob =$_POST['mob']; 
  $name =strtoupper($_POST['name']); 
  $email =$_POST['email'];
  $gender =$_POST['sex']; 
  $qry1 = array("uname"=>$name);
  $yes1=$collection->findOne($qry1);
	
	if(!$yes1)
	{
	$result=$collection->update(array("uname"=>$yes),array('$set'=>array("uname"=>$uname,"pass"=>$pass,"name"=>$name,"mob"=>$mob,"email"=>$email,"gender"=>$gender))); 
		
		if($result)
			{ echo "<script type='text/javascript'>alert('Data Updated !')</script>"; } 
		else
			{ echo "<script type='text/javascript'>alert('! Update failed!')</script>"; } 
	}
	else
		{ echo "<script type='text/javascript'>alert('Username Already exist!')</script>"; }
  $con->close();
//session_destroy();  
} 	
?>
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
  	
  	var x = document.forms["myForm"]["name"].value;
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
  <?php //include( 'header.php'); ?>

  <table class="">
   <tr>
    <td>
     <div>
      <fieldset class="abc" style="margin-left:30px;">
       <legend>Update User Profile </legend>
       <form name="myForm" action="" onsubmit="return validateForm()" method="post">
        <table class="login">
         <tr>
          <td>Full Name<sup>*</sup> :</td>
          <td>
           <input type="text" value="<?php echo $_SESSION["new"]["name"]; ?>" name="name" size="30" placeholder="Full Name" required>
          </td>
         </tr>
         <tr>
          <td>username<sup>*</sup> :</td>
          <td>
           <input type="text" value="<?php echo $_SESSION["new"]["uname"]; ?>" name="uname" size="25" placeholder="username" required>
          </td>
         </tr>
         <tr>
          <td>Password<sup>*</sup> :</td>
          <td>
           <input type="text" value="<?php echo $_SESSION["new"]["pass"]; ?>" name="pname" size="20" placeholder="password" required>
          </td>
         </tr>
         <tr>
          <td>Mobile No<sup>*</sup>:</td>
          <td>
           <input type="text" name="mob" value="<?php echo $_SESSION["new"]["mob"]; ?>" size="10" placeholder="9876543210" required>
          </td>
         </tr>
         <tr>
          <td>Email Id :</td>
          <td>
           <input type="email" value="<?php echo $_SESSION["new"]["email"]; ?>" name="email" size="25" placeholder="email@example.com"
           required>
          </td>
         </tr>
         <tr>
          <td>Gender :</td>
          <td>
           <input name="sex" value="male" type="radio" required  >Male
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
           <input class="bt" name="submitform" type="submit" value="Update">
           <input class="bt" type="Reset" value="Clear">
           <a href="adminmain.php">
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

  <?php //include( 'footer.php'); ?>
  </div>

 </center>
</body>

