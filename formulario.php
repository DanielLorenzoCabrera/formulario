<?php

/*
Cosas a validar
- Que los campos obligatorios no estén vacíos [X] .
- Que el tipo de dato sea el correcto [X].
- Que la información sea correcta.
- Que no haya carácteres especiales.



*/

include_once 'index.php';
include_once 'funciones.php';
        


if(count($_REQUEST)>= count($DATOS_OBLIGATORIOS) && count(comprobarCamposVacios($DATOS_OBLIGATORIOS)) === 0 ){
    // aqui va una funcion para comprobar que lo datos sean correctos
    if(!(count(comprobarDatosObligatorios($DATOS_OBLIGATORIOS)) === 0 && count(comprobarDatosOpcionales($DATOS_OPCIONALES)) === 0)){
        count(comprobarDatosObligatorios($DATOS_OBLIGATORIOS)) === 0 ? ' ' : crearSeccion("Datos obligatorios erroneos",comprobarDatosObligatorios($DATOS_OBLIGATORIOS));
        count(comprobarDatosOpcionales($DATOS_OPCIONALES)) === 0 ? ' ' : crearSeccion("Datos opcionales erroneos", comprobarDatosOpcionales($DATOS_OPCIONALES));
    }else{
    
        if(subidaArchivos('dni_file') === true  && subidaArchivos('certificacion_file') === true){
            guardarFormulario();
            echo "<p class='solicitud_completada'>Su solicitud será procesada. En breve nos pondremos 
            en contacto con uds para facilitarle más información</p>";
        }
    }
}else{
    if(isset($_REQUEST["enviar"])) crearSeccion("Datos Obligatorios incompletos",comprobarCamposVacios($DATOS_OBLIGATORIOS));
}








?>