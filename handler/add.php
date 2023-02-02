<?php
    include '../config.php';
    include '../model/Knjiga.php'; 

    
    if ( isset($_POST['naziv']) && isset($_POST['opis']) && isset($_POST['cena']) && isset($_POST['autor'])   ) {
 

        $knjiga = new Knjiga(null,$_POST['opis'],$_POST['cena'],$_POST['naziv'],$_POST['zanr'],$_POST['autor']);
  
       
        $status=Knjiga::dodaj($knjiga,$conn);
        
        
            
            if($status){
                
                echo 'Success';
            }else{
                echo $status;
                echo 'Failed';
            }



      }else{
          echo "Greska";
      }
 




?>