<?php
session_start();
if(isset($_POST['submitform']))
{
	$con=new MongoClient();
	$db=$con->setu;
	$collection=$db->customer;
	$uname = $_POST['uname'];
	$pass = $_POST['pname'];
	$qry = array("uname"=>$uname, "pass"=>$pass);
	$result = $collection->findOne($qry);
            if($result)
			{
                echo"<script>window.alert('welcome : $uname');
				window.location ='http://localhost/setu/usermain.php';</script>";
				
				$_SESSION["result"]=$result;

				
            }
            else
			{
              echo"<script>window.alert('Please Enter a valid email or password');window.location ='http://localhost/setu/login.php';</script>";
			  
            }


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
          alert("Please enter UserName !");
          return false;
      }
  	var y = document.forms["myForm"]["pname"].value;
      if (y == null || y == "") 
  	{
          alert("Please Enter Password !");
          return false;
      }
  	return true;
  }
 </script>

</head>

<body>
 <center>
  <?php

	include('header.php');	

	?>
   <table class="menu1">
    <tr>
     <td>
      <div>
       <fieldset class="abc" style="margin-left:365px;">
        <legend>User Login</legend>
        <form name="myForm" onsubmit="return validateForm()" action=""method="post">
         <table class="login">
          <tr>
           <td>Username<sup>*<sup> :</td>

           <td>

            <input type="text" name="uname" size="22" placeholder="username" required >

           </td>

          </tr>

          <tr>

           <td>Password<sup>*<sup> :</td>

           <td>

            <input type="password" name="pname" size="20" placeholder="password" required>

           </td>

          </tr>

		  <tr>

           <td colspan="2" align="right">

            <h6 style="color:black;">* is Mandatory</h6>

           </td>

          </tr>

          <tr>

           <td align="right">

            <input class="bt" type="submit" name="submitform" value="Login">

            <td>

             <a href="signup.php">

              <input class="bt" type="button" value="Signup">

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