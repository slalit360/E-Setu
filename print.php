<?php session_start(); $user=$_SESSION[ "result"]; 
$name=$_SESSION["result"]["name"]; ?>
<html>

<head>
 <title>E-setu</title>
 <link href="styles.css" rel="stylesheet" type="text/css">
</head>

<body>
 <center>

  <?php include( 'header.php'); ?>
  <table class="menu1">
   <tr>
    <td>
     <div>
      <fieldset class="abc" style="margin-left:px;>
       <legend>Print Your Document!</legend>
       <table class="login">
        <tr>
         <td>
          <form action="casteprint.php">
           <input class="bt1" type="submit" name="s1" Value="caste certicate">
          </form>
         </td>
         <td>
          <form action="domprint.php">
           <input class="bt1" type="submit" name="s2" Value="Income certicate">
          </form>
         </td>
        </tr>

        <tr>
         <td>
          <form action="incomeprint.php">
           <input class="bt1" type="submit" name="s3" Value="Senior citizen Id Card">
         </td>
         <td>
          <form action="seniorprint.php">
           <input class="bt1" type="submit" name="s4" Value="Domacile certicate">
          </form>
         </td>
        </tr>
        <tr>
         <td>
          <form action="usermain.php">
           <input class="bt1" type="submit" Value="Back menu">
          </form>
         </td>
         <td>
          <form action="login.php">
           <input class="bt1" type="submit" Value="logout">
          </form>
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