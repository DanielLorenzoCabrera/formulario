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
        //"<h1> $identificacion </h1>";


if(count($_REQUEST)>= count($DATOS_OBLIGATORIOS) && comprobarCamposVacios($DATOS_OBLIGATORIOS) === 0){
    // aqui va una funcion para comprobar que lo datos sean correctos
    
    print_r(comprobarDatosObligatorios($DATOS_OBLIGATORIOS));


}else{

    comprobarCamposVacios($DATOS_OBLIGATORIOS);
}








?>