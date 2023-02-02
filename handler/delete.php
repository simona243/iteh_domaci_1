<?php
    include '../config.php';
    include '../model/Knjiga.php'; 

    if(isset($_POST['deleteid'])){
        $status=Knjiga::obrisi($_POST['deleteid'],$conn);
        if ($status){
            echo "Success";
        }else{
            echo "Failed";
        }
    }

?>