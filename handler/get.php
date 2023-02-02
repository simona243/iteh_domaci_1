 
<?php
    include '../config.php';
    include '../model/Knjiga.php'; 
    
 
 
    if(isset($_POST['prikazid']) ){
        
        $rez = Knjiga::vrati($_POST['prikazid'],$conn);
    
        $response = array();
        while($red=mysqli_fetch_assoc($rez)){
            $response[] = $red;
        }
       
        echo json_encode($response[0]);

    }else{
        
        $response['status']=200;  
        $response['message']="Data not found";
    }

 






?>
 
