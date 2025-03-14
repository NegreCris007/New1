var tabla;

//funcion que se ejecuta al inicio
function init(){
   mostrarform(false);
   listar();

   $("#formulario").on("submit",function(e){
   	guardaryeditar(e);
   })
}

//funcion limpiar
function limpiar(){
	$("#idorganizacion").val("");
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
			url:'../ajax/organizacion.php?op=listar',
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
     	url: "../ajax/organizacion.php?op=guardaryeditar",
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

function mostrar(idorganizacion){
	$.post("../ajax/organizacion.php?op=mostrar",{idorganizacion : idorganizacion},
		function(data,status)
		{
			data=JSON.parse(data);
			mostrarform(true);

			$("#nombre").val(data.nombre);
			$("#descripcion").val(data.descripcion);
			$("#idorganizacion").val(data.idorganizacion);
		})
}


//funcion para desactivar
function desactivar(idorganizacion){
	bootbox.confirm("¿Esta seguro de desactivar este dato?", function(result){
		if (result) {
			$.post("../ajax/organizacion.php?op=desactivar", {idorganizacion: idorganizacion}, function(e){
				bootbox.alert(e);
				tabla.ajax.reload();
			});
		}
	})
}

function eliminar(idorganizacion) {
    bootbox.confirm("¿Está seguro de eliminar esta Organización?", function(result) {
        if (result) {
            $.post("../ajax/organizacion.php?op=eliminar", { idorganizacion: idorganizacion }, function(e) {
                bootbox.alert(e);
                tabla.ajax.reload();
            });
        }
    });
}


function activar(idorganizacion){
	bootbox.confirm("¿Esta seguro de activar este dato?" , function(result){
		if (result) {
			$.post("../ajax/organizacion.php?op=activar" , {idorganizacion : idorganizacion}, function(e){
				bootbox.alert(e);
				tabla.ajax.reload();
			});
		}
	})
}

init();