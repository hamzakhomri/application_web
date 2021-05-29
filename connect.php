<?php 
     try{ 
    $Con = new PDO('mysql:host=localhost;dbname=radid_khomri;charset=utf8','root','');
     }catch(Exception $e){
         die('Erreur: '.$e->getMessage());

     }
   
   
/* try{  
        $server="sql311.epizy.com";
        $dbName = "epiz_28149983_gs_hh_yy";
        $userName="epiz_28149983";
        $password="eCEZrFVixl";
    $Con = new PDO("mysql:host=$server;dbname=$dbName;charset=utf8",$userName,$password);
     }catch(Exception $e){
         die('Erreur: '.$e->getMessage());

     }
   
   */ 

?>