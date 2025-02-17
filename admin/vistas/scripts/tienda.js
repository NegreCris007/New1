var tabla;

//funcion que se ejecuta al inicio
function init(){
   mostrarform(false);
   listar();

$("#formulario").on("submit", function(e) {
    e.preventDefault();
    if ($("#idorganizacion").val() === "" || $("#idorganizacion").val() === null) {
        bootbox.alert("Por favor seleccione una organización.");
        return;
    }
    guardaryeditar(e);
});
}



// Cargamos los items al select organizacion
$.post("../ajax/organizacion.php?op=selectOrganizacion", function(r){
    $("#idorganizacion").html(r);
    $("#idorganizacion").selectpicker('refresh');
});


//funcion limpiar
function limpiar(){
	$("#idtienda").val("");
	$("#nombre").val("");
	$("#descripcion").val(""); 
}
 



//funcion mostrar formulario
function mostrarform(flag){
	limpiar();
	if(flag){
		$("#listadoregistros").hide();
		$("#formularioregistros").show();
		$("#btnGuardar").prop("disabled",false);
		$("#btnagregar").hide();
	}else{
		$("#listadoregistros").show();
		$("#formularioregistros").hide();
		$("#btnagregar").show();
	}
}

//cancelar form
function cancelarform(){
	limpiar();
	mostrarform(false);
}

//funcion listar
function listar(){
	tabla=$('#tbllistado').dataTable({
		"aProcessing": true,//activamos el procedimiento del datatable
		"aServerSide": true,//paginacion y filrado realizados por el server
		dom: 'Bfrtip',//definimos los elementos del control de la tabla
		buttons: [
                  'copyHtml5',
                  'excelHtml5',
                  'pdf'
		],
		"ajax":
		{
			url:'../ajax/tienda.php?op=listar',
			type: "get",
			dataType : "json",
			error:function(e){
				console.log(e.responseText);
			}
		},
		"bDestroy":true,
		"iDisplayLength":10,//paginacion
		"order":[[0,"desc"]]//ordenar (columna, orden)
	}).DataTable();
}
//funcion para guardaryeditar
function guardaryeditar(e){
     e.preventDefault();//no se activara la accion predeterminada 
     $("#btnGuardar").prop("disabled",true);
     var formData=new FormData($("#formulario")[0]);

     $.ajax({
     	url: "../ajax/tienda.php?op=guardaryeditar",
     	type: "POST",
     	data: formData,
     	contentType: false,
     	processData: false,

     	success: function(datos){
     		bootbox.alert(datos);
     		mostrarform(false);
     		tabla.ajax.reload();
     	}
     });

     limpiar();
}




function mostrar(idtienda) {
    $.post("../ajax/tienda.php?op=mostrar", { idtienda: idtienda }, function(data, status) {
        data = JSON.parse(data);
        mostrarform(true);

        $("#idtienda").val(data.idtienda);
        $("#nombre").val(data.nombre);
        $("#descripcion").val(data.descripcion);
        $("#idorganizacion").val(data.idorganizacion).selectpicker('refresh');
    });
}


//funcion para desactivar
function desactivar(idtienda){
	bootbox.confirm("¿Esta seguro de desactivar este dato?", function(result){
		if (result) {
			$.post("../ajax/tienda.php?op=desactivar", {idtienda : idtienda}, function(e){
				bootbox.alert(e);
				tabla.ajax.reload();
			});
		}
	})
}

function eliminar(idtienda) {
    bootbox.confirm("¿Está seguro de eliminar esta Tienda?", function(result) {
        if (result) {
            $.post("../ajax/tienda.php?op=eliminar", { idtienda: idtienda }, function(e) {
                bootbox.alert(e);
                tabla.ajax.reload();
            });
        }
    });
}


function activar(idtienda){
	bootbox.confirm("¿Esta seguro de activar este dato?" , function(result){
		if (result) {
			$.post("../ajax/tienda.php?op=activar" , {idtienda : idtienda}, function(e){
				bootbox.alert(e);
				tabla.ajax.reload();
			});
		}
	})
}



init();