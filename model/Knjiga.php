<?php
    class Proizvod{
        private $id;
        private $naziv; 
        private $opis; 
        private $cena; 
        private $zanr; 
        private $autor; 
 


        public function __construct($id=null, $opis=null, $cena=null, $naziv=null, $zanr=null,$autor=null){
            $this->naziv=$naziv;
            $this->id=$id;
            $this->opis=$opis;
            $this->cena=$cena;
            $this->zanr=$zanr;
            $this->autor=$autor;
 
        }   
    
    
    }
    

   


?>