$(document).ready(function() {
  $(".edit").click(function() {

    $("#editModal").modal("show");
    let valores = [] ;

    $(this).parents("tr").find("td").each(function() {
      valores.push($(this).text());
     // valores += $(this).text();
    });
    console.log(valores);
    var data = valores;
    
    /*var data= "";
    //valores obtendra el dato del td por posciones [0]
   // var sa = $(this).find("td:last-child").text();
    
    $(this).parents("tr").find(".sau").each(function() {
          data += $(this).html() + "\n";
        });
    
    
    /*$tr = (this).closest("tr");
     var data = $tr.children("td").map(function(){
        return $(this).text();
    }).get(); 
    console.log(data);*/
    $('#id_update').val(data[0]);
    $('#name').val(data[1]);
    $('#lastName').val(data[2]);
    $('#email').val(data[3]);
    $('#phone').val(data[4]);
    $('#rfid').val(data[5]);
    $('#hab').val(data[6]);
    $('#estadia').val(data[7]);
    $('#fecha').val(data[8]);
    $('#hora').val(data[9]);
        
  });
});