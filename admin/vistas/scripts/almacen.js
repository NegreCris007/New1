var tabla;

//funcion que se ejecuta al inicio
function init(){
   mostrarform(false);
   listar();

   $("#formulario").on("submit", function(e) {
       e.preventDefault();
       if ($("#idtienda").val() === "" || $("#idtienda").val() === null) {
           bootbox.alert("Por favor seleccione una Tienda.");
           return;
       }
       guardaryeditar(e);
   });
}

// Cargamos los items al select organizacion
$.post("../ajax/tienda.php?op=selectTienda", function(r){
    $("#idtienda").html(r);
    $("#idtienda").selectpicker('refresh');
});

//funcion limpiar
function limpiar(){
    $("#idalmacen").val("");
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
        "aProcessing": true,
        "aServerSide": true,
        dom: 'Bfrtip',
        buttons: ['copyHtml5','excelHtml5','pdf'],
        "ajax": {
            url:'../ajax/almacen.php?op=listar',
            type: "get",
            dataType : "json",
            error:function(e){
                console.log(e.responseText);
            }
        },
        "bDestroy":true,
        "iDisplayLength":10,
        "order":[[0,"desc"]]
    }).DataTable();
}

//funcion para guardaryeditar
function guardaryeditar(e){
    e.preventDefault();
    $("#btnGuardar").prop("disabled",true);
    var formData=new FormData($("#formulario")[0]);

    $.ajax({
        url: "../ajax/almacen.php?op=guardaryeditar",
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

function mostrar(idalmacen) {
    $.post("../ajax/almacen.php?op=mostrar", { idalmacen: idalmacen }, function(data, status) {
        data = JSON.parse(data);
        mostrarform(true);
        $("#idalmacen").val(data.idalmacen);
        $("#nombre").val(data.nombre);
        $("#descripcion").val(data.descripcion);
        $("#idorganizacion").val(data.idorganizacion).selectpicker('refresh');
    });
}

//funcion para desactivar
function desactivar(idalmacen){
    bootbox.confirm("¿Esta seguro de desactivar este dato?", function(result){
        if (result) {
            $.post("../ajax/almacen.php?op=desactivar", {idalmacen : idalmacen}, function(e){
                bootbox.alert(e);
                tabla.ajax.reload();
            });
        }
    });
}

//funcion para eliminar
function eliminar(idalmacen) {
    bootbox.confirm("¿Está seguro de eliminar este Almacén?", function(result) {
        if (result) {
            $.post("../ajax/almacen.php?op=eliminar", { idalmacen: idalmacen }, function(e) {
                bootbox.alert(e);
                tabla.ajax.reload();
            });
        }
    });
}

//funcion para activar
function activar(idalmacen){
    bootbox.confirm("¿Esta seguro de activar este dato?" , function(result){
        if (result) {
            $.post("../ajax/almacen.php?op=activar" , {idalmacen : idalmacen}, function(e){
                bootbox.alert(e);
                tabla.ajax.reload();
            });
        }
    });
}

init();
