
function prikazi(prikazid){
    
    
    $.post("handler/get.php",{prikazid:prikazid},function(data,status){
        console.log(data);
        var knjiga=JSON.parse(data);
        console.log(knjiga); 
        $('#nazivPreview').text(knjiga.naziv  );
        $('#autorPreview').text(knjiga.autor);

        $('#opisPreview').text(knjiga.opis);

    
 
      


    }); 

 
    
}

function obrisi(deleteid){


    request = $.ajax({  
        url: 'handler/delete.php',  
        type: 'post', 
        data: {deleteid:deleteid},


        success: function(data, status){
            location.reload(true);
            alert("Uspesno obrisano!");
        }


    });



}