<?php
 
     
        $hostname = "localhost";
        $username = "root";
        $password = "";
        $database = "biblioteka";
        
        $conn = mysqli_connect($hostname,$username,$password,$database) or die("Database connection failed");
     

?>