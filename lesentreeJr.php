<?php


session_start();
$pageTitle='Journal Des Entrees';//title pages
   $novabar='';

    include("init.php");
    
    if(isset($_SESSION["nomUtilisateur_admin"])){  

      if($_SERVER["REQUEST_METHOD"]=="POST"){ 
              
      }
      

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <style>
    #imlogo{
       float:right;
    width:150
       
    }
    
    *{
        font-size:17px;
        font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif
    }
    </style>
</head>
<body>
<?php 
 
 include($templates."navModeStock.php");

?> 

<br> <br>
<form action="lesentreesjrAfficher.php"<?php if(isset($_POST["datefirst"])){echo $_POST['datefirst'];}?><?php if(isset($_POST['datesecond'])){echo $_POST['datesecond'];}?>  method="POST">
<fieldset style="background-color:whitesmoke"> 
<div class="container"> 
<img id="imlogo" src="../YY_HH_GS/Gestion_Stock/layouts/images/unnamed.png">
<br><br>
<h2>Université Chouaib Doukkali</h2>
<h2>Faculté des Sciences</h2> 

<h4>El Jadida</h4>
<br><br>
<h5 id="date"> 
La Date:
<script>
let today = new Date().toLocaleDateString()
document.write(today)</script>
</h5> 
<h2 style="text-align:center;text-decoration:underline"> Journal  Bon des Entrees </h2>

<div class="container">
<table class="table">
 
  <tbody>
    <tr>
     
      <th>Premier Date</th>
      <th>deuxième date</th>
    
    </tr>
    <tr>

      <td><input type="date" id="datefirst" name="datefirst" ></td>
      <td><input type="date" id="datesecand" name="datesecond"></td>
      
    </tr>
    <tr>
    <tr>
    <td colspan="2"><input type="submit" id="mybtn" class="btn btn-info"  onclick="test()" name="testing" value="Rechercher"></td>
    </tr>
    
  </tr>
  </tbody>
</table>
</div>
</fieldset> 
<hr>

</form>
                            <script>
                            function test(){
                              if(datefirst.value==""){
                                alert("Merci De choisir la Premier Date svp");
                            
                              } 
                              if(datesecand.value==""){
                                alert("Merci De choisir la Deuxiéme Date svp");
                               
                              }
                            
                            }
                            
                            
                            </script>
<?php 
    
}else{
        header("location:index.php");
        exit();
    }
  
    include($templates."footer.php");
    

?>