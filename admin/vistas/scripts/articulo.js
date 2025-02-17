var tabla;

// Función que se ejecuta al inicio
function init() {
    mostrarform(false);
    listar();

    $("#formulario").on("submit", function(e) {
        guardaryeditar(e);
    });
}

//cargamos los items al select categoria
$.post("../ajax/categoria.php?op=selectCategoria", function(r){
    $("#idcategoria").html(r);
    $('#idcategoria').selectpicker('refresh'); 
});

// Función limpiar
function limpiar() {
    $("#idarticulo").val("");
    $("#nombre").val("");
    $("#codigo").val("");
    $("#descripcion").val("");
    $("#marca").val("");
    $("#modelo").val("");
    $("#puerto").val("");
    $("#generacion").val("");
    $("#ram").val("");
    $("#rom").val("");
    $("#categoria").val("");
}

// Función mostrar formulario
function mostrarform(flag) {
    limpiar();
    if (flag) {
        $("#listadoregistros").hide();
        $("#formularioregistros").show();
        $("#btnGuardar").prop("disabled", false);
        $("#btnagregar").hide();
    } else {
        $("#listadoregistros").show();
        $("#formularioregistros").hide();
        $("#btnagregar").show();
    }
}

// Cancelar formulario
function cancelarform() {
    limpiar();
    mostrarform(false);
}

// Función listar
function listar() {
    tabla = $('#tbllistado').dataTable({
        "aProcessing": true, // Activamos el procesamiento del datatables
        "aServerSide": true, // Paginación y filtrado realizados por el servidor
        dom: 'Bfrtip', // Definimos los elementos del control de la tabla
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'pdf'
        ],
        "ajax": {
            url: '../ajax/articulo.php?op=listar',
            type: "get",
            dataType: "json",
            error: function(e) {
                console.log(e.responseText);
            }
        },
        "bDestroy": true,
        "iDisplayLength": 10, // Paginación
        "order": [[0, "desc"]] // Ordenar (columna, orden)
    }).DataTable();
}

// Función para guardar y editar
function guardaryeditar(e) {
    e.preventDefault(); // No se activará la acción predeterminada del evento
    $("#btnGuardar").prop("disabled", true);
    var formData = new FormData($("#formulario")[0]);

    $.ajax({
        url: "../ajax/articulo.php?op=guardaryeditar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,

        success: function(datos) {
            bootbox.alert(datos);
            mostrarform(false);
            tabla.ajax.reload();
        }
    });

    limpiar();
}

// Función para mostrar los datos en el formulario
function mostrar(idarticulo) {
    $.post("../ajax/articulo.php?op=mostrar", { idarticulo: idarticulo }, function(data, status) {
        data = JSON.parse(data);
        mostrarform(true);

        $("#idarticulo").val(data.idarticulo);
        $("#nombre").val(data.nombre);
        $("#codigo").val(data.codigo);
        $("#descripcion").val(data.descripcion);
        $("#marca").val(data.marca);
        $("#modelo").val(data.modelo);
        $("#puerto").val(data.puerto);
        $("#generacion").val(data.generacion);
        $("#ram").val(data.ram);
        $("#rom").val(data.rom);
        $("#categoria").val(data.categoria);
    });
}

// Función para desactivar
function desactivar(idarticulo) {
    bootbox.confirm("¿Está seguro de desactivar este artículo?", function(result) {
        if (result) {
            $.post("../ajax/articulo.php?op=desactivar", { idarticulo: idarticulo }, function(e) {
                bootbox.alert(e);
                tabla.ajax.reload();
            });
        }
    });
}

// Función para activar
function activar(idarticulo) {
    bootbox.confirm("¿Está seguro de activar este artículo?", function(result) {
        if (result) {
            $.post("../ajax/articulo.php?op=activar", { idarticulo: idarticulo }, function(e) {
                bootbox.alert(e);
                tabla.ajax.reload();
            });
        }
    });
}

// Función para eliminar
function eliminar(idarticulo) {
    bootbox.confirm("¿Está seguro de eliminar este artículo?", function(result) {
        if (result) {
            $.post("../ajax/articulo.php?op=eliminar", { idarticulo: idarticulo }, function(e) {
                bootbox.alert(e);
                tabla.ajax.reload();
            });
        }
    });
}





init();