<?php


session_start();
$pageTitle='Journal Par  Produit ';//title pages
   $novabar='';

    include("init.php");
    
    if(isset($_SESSION["nomUtilisateur_admin"])){  
        if($_SERVER["REQUEST_METHOD"]=="POST"){ 
              
                    

      
            
      

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <style>
    #imlogo{
       float:right;
    width:350px
       
    }
    

   
       
    </style>
</head>
<body>
<?php 
 
 include($templates."navModeStock.php");

?> 

<br> <br>
<form action="" method="POST">
<fieldset style="background-color:whitesmoke"> 
<div class="container"> 
<img id="imlogo" src="../YY_HH_GS/Gestion_Stock/layouts/images/faculté.jfif">
<br><br>
<h2>Université Chouaib Doukkali</h2>
<h2>Faculté des Sciences</h2> 
<br>
<h4>El Jadida Le : <script>
let today = new Date().toLocaleDateString()
document.write(today)</script></h4>
<br>
<h2 style="text-align:center;text-decoration:underline"> Journal Bon des Sorties Par Produit </h2>
<br><br>
<h4> <span  style="text-decoration:underline;font-size:25px;font-weight:600" >Entre :</span>  <?php $newDate = date("d-m-Y", strtotime($_POST["datefirst"])); echo $newDate;?>  <span  style="text-decoration:underline;font-size:25px;font-weight:600" >Et :</span>  <?php $newDate = date("d-m-Y", strtotime($_POST["datesecond"])); echo $newDate;?></h4>
<br> <br>
<fieldset border="2"> 
 <legend></legend>

<h4><span style="text-decoration:underline;font-size:25px;font-weight:600">Désignation :</span> <?php 
            $stmt=$Con->prepare("SELECT *from article where  code_art = ? ");
            $stmt->execute(array($_POST["selectproduit"]));
            $row=$stmt->fetch();
            echo $row["designation_art"];


?></h4>
<br>
<h4><span style="text-decoration:underline;font-size:25px;font-weight:600" >Type  :</span> <?php 
           
            echo $row["Type_Art"];


?></h4>
<br>
<h4><span style="text-decoration:underline;font-size:25px;font-weight:600" >Num Inventaire  :</span> <?php 
           
            echo $row["NumInventaire"];


?></h4>
<br>

<h4 ><span  style="text-decoration:underline;font-size:25px;font-weight:600" >Catégorie : </span> <?php 
 
            $stmt=$Con->prepare("SELECT *from categorie 
        where numCategorie = ?");
           $stmt->execute(array($row["num_cat"]));
           $rows = $stmt->fetch();
          
           echo $rows["designation_categorie"];
            


?></h4>

</fieldset>
  <br> 
<h3 style="text-align:center"><span style="text-decoration:underline;font-size:25px;font-weight:600;text-align:center">Les Produits Sorties  :</span></h3>
   
   <table style="text-align: center;" class="table table-striped" border="1">
<thead>
<tr class="table-light">

 <th scope="col">Nom</th>
 <th scope="col">Email</th>
 <th scope="col">Tél</th>
 <th scope="col">Service</th>
 <th scope="col">Date Sortie</th>
 
    </tr>
</thead>
<tbody> 
<?php 
$total=0;
      $stmt=$Con->prepare("SELECT *from fonctionnaire f , bonsorite b 
                          where f.Num_Fonctionnaire=b.num_funct
                          and b.code_art= ? and Date_Sorite between ? and ? ");
    $stmt->execute(array($_POST["selectproduit"],$_POST["datefirst"],$_POST["datesecond"]));
    $row=$stmt->fetchAll();
    $count=$stmt->rowCount();
    
    
    if($count>0){

        foreach($row as $fr){ $total=$total+1; ?>
       
       <tr class="table-info">
    
      <td > <?php echo $fr[1];?></td>
      <td > <?php echo $fr[2];?></td>
      <td > <?php echo $fr[3];?></td>
      <td >
      
       <?php
        
        $frs= $fr[4];
              $stmt=$Con->prepare("SELECT *from departement where NumDepartement = ? ");
              $stmt->execute(array($frs));
              $myrow = $stmt->fetch();
              echo $myrow[1];
       
      
       ?>
       
       </td>
      
      <td > <?php 
      
      
      $newDate = date("d-m-Y", strtotime($fr[7])); echo $newDate;?>
      
      </td>
     
      
    
      
      
      
      
      
    </tr>
<?php 
 
}
    }else{ 

      echo "<script>alert('aucune résultat trouvé')</script>";
   
  
    }
            ?> 

             <tr> <td colspan="9">  <input type="button" onclick="window.print()" style="width:100%;font-size:25px" value="Enregistrer" ></td> </tr>

</tbody>
   </table>           

</div>
</fieldset> 
 



<?php 
     }else{
      header("location:produitjr.php");
      exit();
     }
 
}else{
        header("location:index.php");
        exit();
    }
  
    include($templates."footer.php");
    

?>