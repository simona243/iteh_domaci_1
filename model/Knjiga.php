<?php
    class Knjiga{
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
    
        public static function dodaj($proizvod, $conn){
            $upit = "insert into knjiga(naziv,opis,cena,autor,zanr) values('$proizvod->naziv','$proizvod->opis',$proizvod->cena,'$proizvod->autor',$proizvod->zanr)";
            
            return $conn->query($upit);
        }
        public static function vratiSveProizvode($conn){
            $upit = "select * from knjiga k inner join zanr z on k.zanr=z.id_zanra";
            return $conn->query($upit);
        }        
        public static function vrati($id, $conn){
            $upit = " select * from knjiga k inner join zanr z on k.zanr=z.id_zanra where id=$id";
            return $conn->query($upit);
        }
        public static function obrisi($id, $conn){
            $upit = " delete from knjiga where id=$id";
            return $conn->query($upit);
        }
    }
    

   


?>