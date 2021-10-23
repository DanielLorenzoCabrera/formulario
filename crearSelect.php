<?php

function crearSelect($array, $nombreSelect, $atributo){
    echo "<select name='{$nombreSelect}'> ";
    foreach($array as $elemento) { 
        echo "<option value='{$elemento[$atributo]}'> {$elemento[$atributo]}</option>"; 
    }
    echo "</select>";
}
   

    /*
        
        La primera posición es el array de paises
        La segunda el país dentro del array de paises
        La tercera los atributos de los paises

        $array hace referencia al la variable que contiene el json
        $nombreSelect es el valor del atributo 'name0 que le vamos a dar al elemento <select> de HTML
        $atributo es la propiedad del elemento por el cual vamos a seleccionar
    */
    
    

    //crearSelect($array_paises, 'paises', 'name_es');






?>


 