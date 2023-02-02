<?php
    include 'config.php';  
    include 'model/Knjiga.php';  
    include 'model/Zanr.php';  
 
 
    $sveKnjige = Knjiga::vratiSve($conn);

    $zanrovi = Zanr::vratiSve($conn);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
 
    <style>
        .pocetna{
            margin: 10%;
        }
    </style>

</head>
<body style="background: #faf8d4;";>
        <nav class="navbar navbar-light bg-dark">
                <form class="form-inline">

        
                        
                   
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" id="pretraga" onkeyup="searchTable()" >
                            
                  
                </form>
                </nav>

        <div class="pocetna">


                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">Dodaj novu knjigu</button>
                <button type="button" class="btn btn-primary" onclick="sortTable()" >Sortiraj rastuce</button>


                <table class="table table-dark" id="table">
                <thead>
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">NAZIV</th>
                    <th scope="col">CENA</th>
                    <th scope="col">ZANR</th>
                    <th scope="col">OPCIJE</th>
                    </tr>
                </thead>
                <tbody>
                <?php  while($red = $sveKnjige->fetch_array()):   ?>
                        <tr>
                            <th  >   <?php   echo $red['id'];        ?>     </th>
                            <td> <?php   echo $red['naziv'];        ?> </td>
                            <td> <?php   echo $red['cena'];        ?> </td>
                            <td> <?php   echo $red['naziv_zanra'];        ?> </td>

                            <td><button type="button" class="btn btn-danger" onclick="obrisi(<?php echo   $red['id'];?>)">Obrisi</button>
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalDiscount" onclick="prikazi(<?php echo   $red['id'];?>)"   >Detalji</button></td>
                        </tr>
                        

                <?php endwhile;?>
                </tbody>
                </table>
               

        </div>

  
 






        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Dodaj novu knjigu</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="addForm" method="post">
      <div class="modal-body mx-3">
        <div class="md-form mb-5">
  
          <input type="text" id="form3" class="form-control validate"  name="naziv" id="naziv">
          <label data-error="wrong" data-success="right" for="form3">Naziv knjige</label>
        </div>

        <div class="md-form mb-4">
     
          <input type="email" id="form2" class="form-control validate" name="opis" id="opis">
          <label data-error="wrong" data-success="right" for="form2">Opis knjige</label>
        </div>


        <div class="md-form mb-4">
     
          <input type="email" id="form2" class="form-control validate" name="cena" id="cena">
          <label data-error="wrong" data-success="right" for="form2">Cena knjige</label>
        </div>

        <div class="md-form mb-4">
     
            <input type="email" id="form2" class="form-control validate" name="autor" id="autor">
            <label data-error="wrong" data-success="right" for="form2">Autor knjige</label>
        </div>


        <div style="font-size:20px" >
            <label for="zanr">Odaberi zanr</label>
            <select name="zanr" id="zanr">
            <?php
                 
                while($red = $zanrovi->fetch_array()): 
                ?>
                  <option value=<?php echo $red["id_zanra"]?>><?php echo $red["naziv_zanra"]?></option> 

                <?php   endwhile;   ?>
            </select>
        </div>

      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-indigo" onclick="dodaj()">Dodaj </button>
      </div>
      </form>
    </div>
  </div>
</div>

 



























 
    <!--Modal: modalDiscount-->
    <div class="modal fade right" id="modalDiscount" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
      aria-hidden="true" data-backdrop="true">
      <div class="modal-dialog modal-side modal-bottom-right modal-notify modal-danger" role="document">
        <!--Content-->
        <div class="modal-content">
          <!--Header-->
          <div class="modal-header">
            <p class="heading" id="nazivPreview"> 
               
            </p>

            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true" class="white-text">&times;</span>
            </button>
          </div>

          <!--Body-->
          <div class="modal-body">
            <div class="row">      

              <div class="col-9">
                <p id="opisPreview"> </p>
           
                <h2>
                  <span class="badge" id="autorPreview" > </span>
                </h2>

              </div>
            </div>
          </div>

        
        </div>
        <!--/.Content-->
      </div>
    </div>
    <!--Modal: modalDiscount-->























        <script src="js/main.js"></script>

       

        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
            


    </body>
</html>