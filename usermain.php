<?php session_start(); if($_SESSION[ "result"]) 
{ $user=$_SESSION[ "result"]["name"]; } else { header( "Location:login.php"); } ?>
<html>

<head>
 <title>E-setu</title>
 <link href="styles.css" rel="stylesheet" type="text/css">
</head>

<body>
 <center>
  <?php include( 'header.php'); ?>
  </table>
  <hr>


  <table class="menu1">
   <tr>
    <td>
     <center>
      <div>

       <fieldset class="abc" style="margin-left:330px;">
        <legend>Welcome,
         <?php echo $user;?>.</legend>

        <table class="login">
         <tr>
          <td colspan="2">
           <center>Online Application Form</center>
          </td>
         </tr>
         <tr align="center">
          <td>
           <form action="caste.php">
            <input class="bt1" type="submit" Value="caste certicate.">
           </form>
          </td>
         </tr>
         <tr>
          <td>
           <form action="income.php">
            <input class="bt1" type="submit" Value="Income certicate.">
           </form>
          </td>
         </tr>

         <tr align="center">
          <td>
           <form action="senior.php">
            <input class="bt1" type="submit" Value="Senior citizen Id Card.">
           </form>
          </td>
         </tr>
         <tr>
          <td>
           <form action="domocile.php">
            <input class="bt1" type="submit" Value="Domacile certicate.">
           </form>
          </td>
         </tr>
         <tr>
          <!--<td>
           <form action="print.php">
            <input class="bt1" type="submit" Value="Print Document.">
           </form>
          </td>-->
          <td>
           <form action="logout.php">
            <input class="bt1" type="submit" Value="logout">
           </form>
          </td>
         </tr>
        </table>

       </fieldset>

      </div>
     </center>
    </td>

   </tr>

  </table>

  </ul>

  <?php include( 'footer.php'); ?>

 </center>

</body>
