<?php
    class Zanr{
        private $id_zanra;
        private $naziv_zanra; 

        public function __construct($id_zanra=null, $naziv_zanra=null){
            $this->id_zanra=$id_zanra;
            $this->naziv_zanra=$naziv_zanra; 
        }
 
        public static function vratiSve($conn){
            $upit = "select * from zanr";
            return $conn->query($upit);
        }
      
    }
    

   



?>