/* Archivo para manejar conexiones con la BD en el CRUD con AJAX
*/
let page = 0;

$(document).ready(function()
{
    // Activate tooltip
	$('[data-toggle="tooltip"]').tooltip();
	
	// Select/Deselect checkboxes
	var checkbox = $('table tbody input[type="checkbox"]');
	$("#selectAll").click(function(){
		if(this.checked){
			checkbox.each(function(){
				this.checked = true;                        
			});
		} else{
			checkbox.each(function(){
				this.checked = false;                        
			});
		} 
	});
	checkbox.click(function(){
		if(!this.checked){
			$("#selectAll").prop("checked", false);
		}
	});
	
	//Función para obtener registros de las tablas de la BD
    function getTableData(value, offset = null)
    {
        var query = "table=" + value;
        var i = 1;
        if(offset != null)
        {
            query += "&offset=" + offset;
            i = 0; //Devolver índice a 0 si no necesitamos los encabezados
        }
        
        $.ajax({
            type: "POST",
            url: "php/crud.php",
            data: query, 
            success: function(data)
            {
                if (data != "") //Si la consulta fue exitosa
                {
                    var parsedData = JSON.parse(data);
                    if(offset == null) //Si no se dio un offset, removemos los encabezados
                    {
                        $("th").remove(".tbHeader");
                        
                        $(".addBtn").attr("href", "#add" + value + "Modal");
                        
                        for (const header of parsedData[0])
                        {
                            $("#tableHeader").append('<th class="tbHeader">' + header + '</th>'); //Añadimos los nuevos encabezados
                        }
                        
                        $("#tableHeader").append('<th class="tbHeader">Actions</th>'); //Si es CRUD, añadir columna de acciones
                        
                        page = 0; //Reiniciar contador de página
                    }
                    
                    $("tr").remove(".tbData"); //Remover datos anteriores
                    for (; i < parsedData.length; i++) //Añadir filas con datos de los registros
                    {
                        var row = '<tr class="tbData">';
                        
                        for (let data of parsedData[i])
                        {
                            if(data == null) data = "";
                            row += '<td>' + data + '</td>';
                        }
                        
                        row += '<td class="tbAction"><a href="#add' + value + 'Modal" class="edit" id="' + parsedData[i][0] + '" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a><a href="#deleteModal" id="' + parsedData[i][0] + '" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a></td>';
                        
                        $("#tableRows").append(row + '</tr>');
                    }
                }
                else console.log("Error fetching database data");
            }
        });
    }
    
    function sendTableData(table, formobj, formdata, action = "null")
    {
        var query = "table=" + table + "&action=" + action + "&" + formdata;
        var the_modal = formobj.parent().parent().parent();
        if(action == "Delete") the_modal = the_modal.parent().parent();
        else if (action == "Save")
        {
            let idx = query.indexOf("&%3Acod_usuario");
            let idx1 = query.indexOf("&", idx + 1);
            let substrCod = query.substr(idx, idx1 - idx);
            query = query.replace(substrCod, "");
            query += substrCod;
        }
        
        $.ajax({
          type: "POST",
          url: "php/crud.php",
          data: query,
          success: function(data) {
              if(data == "success")
              {
                  if(action != "Delete")
                  {
                      formobj[0].reset();
                  }
                  //console.log(formobj.parent().parent().parent());
                  the_modal.modal('hide');
              }
          }
      });
      setTimeout(() => { getTableData(table, 5*page); }, 200);
    }
    
    //Listener para cuando se cambia de tabla
    $("select").change(function()
    {
        if(this.value != "") getTableData(this.value);
    });
    
    //Listener para cambiar de página
    $('.page-item').click(function()
    {
        let table = $("select").val();
        if (table != "")
        {
            let id = $(this).attr("id");
            if(id == "next") page++;
            else if(id == "prev")
            {
                page--;
                if(page < 0) page = 0;
            }
            getTableData(table, 5*page); //Obtener datos por offset del número de página
        }
  });
  
  //Listener para limpiar campos cuando se cierre un modal
  $('.btn-default, .close').click(function(){
      $(this).parent().parent()[0].reset();
  });
  
  //Listener para cuando se sube la información de un modal
  $(".addForm").on("submit", function(event)
    {
        let table = $("select").val();
        let formdata = $(this).serialize();
        let action = $(this).find("input[type=submit]:focus").val();
        sendTableData(table, $(this), formdata, action);
        event.preventDefault();
        return false;
    });
    
    //Listener para cuando se lanza un modal de eliminación
    $(document).on('shown.bs.modal', '#deleteModal', function (event)
    {
        var triggerElement = $(event.relatedTarget); // Button that triggered 
        var delButton = $(this).find("input[type=submit]");
        delButton.attr("id", triggerElement.attr("id")); //Añadir id de la fila que está afectando
    });
    
    //Listener para cuando se lanza un modal de añadir o edición
    $(document).on('shown.bs.modal', '.addModal', function (event)
    {
        var triggerElement = $(event.relatedTarget); // Button that triggered
        var actionButton = $(this).find("input[type=submit]");
        var fields = $(this).find("input[type=text], input[type=email], input[type=tel], textarea"); //Obtener campos
        
        if(triggerElement.hasClass("edit")) //Si es edición, desactivar campo de llave primaria y rellenar información
        {
            actionButton.attr("value", "Save");
            $(fields[0]).attr("readonly", "");
            var cells = triggerElement.parent().parent().find("td");
            for(let i = 0; i < fields.length; ++i) fields[i].value = cells[i].innerText;
        }
        else
        {
            actionButton.attr("value", "Add");
            $(fields[0]).removeAttr("readonly"); //Si el campo de llave primaria estaba desactivado, volver a activarlo
        }
    });
    
    //Listener para cuando se confirma una eliminación
    $('.btn-danger').click(function()
    {
        let table = $("select").val(); //Pasar tabla e id para eliminar el registro
        sendTableData(table, $(this), ":id=" + $(this).attr("id"), "Delete");
        event.preventDefault();
    });
  
});