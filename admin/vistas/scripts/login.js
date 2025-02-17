
$("#frmAcceso").on('submit', function(e) 
{

    // Previene el comportamiento por defecto del formulario (enviar la página)
    e.preventDefault();

    // Obtiene el valor del campo de entrada con id 'logina' y lo asigna a la variable 'logina'
    logina = $("#logina").val();

    // Obtiene el valor del campo de entrada con id 'clavea' y lo asigna a la variable 'clavea'
    clavea = $("#clavea").val();

    // Comprueba si alguno de los campos de entrada está vacío
    if ($("#logina").val() == "" || $("#clavea").val() == "")
    {

        // Muestra una alerta utilizando Bootbox si algún campo está vacío
       bootbox.alert("Asegurate de llenar todo los campos ");
   
    } else {

        // Realiza una solicitud POST al script 'usuario.php' con la acción 'verificar'
        $.post("../ajax/usuario.php?op=verificar",
            {
                "logina": logina, // Envía el valor del campo 'logina'
                "clavea": clavea  // Envía el valor del campo 'clavea'
            },
             function(data) { // Función de callback que se ejecuta cuando se recibe una respuesta del servidor

                // Imprime la respuesta del servidor en la consola
                console.log(data);
                
                     
                // Verifica si la respuesta del servidor es distinta de "null"
                if (data != "null") 
                    {
                     
                    // Redirige a la página 'escritorio.php' si la respuesta no es "null"
                    $(location).attr("href", "escritorio.php");
                    
                  

                }  else
                       {
                        bootbox.alert("Cedula y/o Password incorrectos ");
                    // Muestra una alerta utilizando Bootbox si la respuesta es "null"
                   
                    
                   }

            
                
            }
        );

    

        }
   

});
