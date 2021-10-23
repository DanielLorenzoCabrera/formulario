<?php


 #datos
 
 $DATOS_OBLIGATORIOS = [
    "identificacion" => "",
    "nombre" => "",
    "apellido1" => "",
    "apellido2" => "",
    "calidad_de" => ["guardador_de_hecho","patria_potestad","representante_voluntario","tutor"],
    "movil" => "",
    "correo" => "",
    "via" => ["avenida","calle","carretera","otros"],
    "nombre_via" => "",
    "numero_via" => "",
    "paises" => getDatos("./json/paises.json"),
    "provincias" => getDatos("./json/provincias.json"),
    "islas" => getDatos("./json/islas.json"),
    "municipios" => getDatos("./json/municipios.json"),
    "localidad" => "",
    "codigo_postal" => ""
];

#funciones

function getDatos($fichero){
    $datosJSON =  file_get_contents($fichero); // Transmite un fichero completo a una cadena
    $datosArray = json_decode($datosJSON, true); //  Decodifica un string de JSON. El true indica si será un array asociativo
    return $datosArray;
}

function comprobarCamposVacios($DATOS_OBLIGATORIOS) {
    $camposVacios = 0;
    foreach($_REQUEST as $posicion => $dato){
        if(array_key_exists($posicion,$DATOS_OBLIGATORIOS) && trim($dato) == ''){
            echo "<p class='error'>El campo <span>{$posicion}</span> está vacío</p>";
            $camposVacios++;
        }
    }
    return $camposVacios;
}

function comprobarSiExiste($nombre){
    $comprobado =  isset($_REQUEST[$nombre]) ? $_REQUEST[$nombre] : ' ';
    return $comprobado;
}

function comprobarSelect($nombre, $condicion, $valor, $valor2){
    $resultado =  isset($_REQUEST[$nombre]) && $_REQUEST[$nombre] == $condicion ? $valor : $valor2;
    return $resultado;
}




function comprobarDatosObligatorios($DATOS_OBLIGATORIOS){
    $camposErroneos = [];
    foreach($_REQUEST as $clave => $dato){
        $dato = trim($dato);
        switch($clave){
            case "identificacion":
                comprobarDni($dato) == false ?  array_push($camposErroneos,"<p class='error'>Introduce un <span>dni</span> válido</p>") : ' ';
                break;
            case "nombre":
                comprobarString($dato,3,30) ? ' ' : array_push($camposErroneos,"<p class='error'>Introduce un <span>nombre</span> válido</p>");
                break;
            case "apellido1":
                comprobarString($dato,3,30) ? ' ' : array_push($camposErroneos,"<p class='error'>Introduce un <span>apellido</span> válido</p>");
                break;
            case "apellido2":
                comprobarString($dato,3,30) ? ' ' : array_push($camposErroneos,"<p class='error'>Introduce un <span>apellido</span> válido</p>");
                break;
            case "calidad_de":
                in_array($dato, $DATOS_OBLIGATORIOS["calidad_de"]) ? " " : array_push($camposErroneos,"<p class='error'>Introduce un valor correcto <span>en calidad de</span></p>");
                break;
            case "movil":
                is_numeric($dato) && strlen($dato) >= 7 && strlen($dato) <= 15 ? '' :array_push($camposErroneos,"<p class='error'>Introduce un <span>número de teléfono</span> correcto</p>");
                break;
            case "correo":
                strlen($dato) >= 10 && strlen($dato) <= 60 ? ' ' : array_push($camposErroneos,"<p class='error'>Introduce un <span>correo</span> válido</p>");
                break;
            case "via":
                in_array($dato,$DATOS_OBLIGATORIOS["via"]) ? ' ' :  array_push($camposErroneos,"<p class='error'>Introduce una <span>vía</span> válida</p>");
                break;
            case "nombre_via":
                comprobarString($dato, 3, 40)  ? ' ' : array_push($camposErroneos,"<p class='error'>Introduce un <span>nombre de vía</span> válido</p>");
                break;
            case "numero_via":
                is_numeric($dato) && strlen($dato) <= 3 && intval($dato) >= 0 ? ' ' : array_push($camposErroneos,"<p class='error'>Introduce un <span>número de vía</span> válido</p>");
                break;
            case "paises":
                comprobarJSON($DATOS_OBLIGATORIOS["paises"], 'code',$dato) ? ' ' : array_push($camposErroneos,"<p class='error'>Introduce un <span>país</span> válido</p>");
                break;
            case "provincias":
                comprobarJSON($DATOS_OBLIGATORIOS["provincias"], 'id',$dato) ? ' ' : array_push($camposErroneos,"<p class='error'>Introduce una <span>provincia</span> válida</p>");
                break;
            case "islas":
                comprobarJSON($DATOS_OBLIGATORIOS["islas"], 'isla_id',$dato) ? ' ' : array_push($camposErroneos,"<p class='error'>Introduce una <span>isla</span> válida</p>");
                break;
            case "municipios":
                comprobarJSON($DATOS_OBLIGATORIOS["municipios"], 'municipio_id',$dato) ? ' ' : array_push($camposErroneos,"<p class='error'>Introduce un <span>municipio</span> válida</p>");
                break;
            case "localidad":
                comprobarString($dato,10,50) ? ' ' : array_push($camposErroneos,"<p class='error'>Introduce una <span>localidad</span> válida</p>");
                break;
            case "codigo_postal" : 
                is_numeric($dato) && strlen($dato) === 5 ? ' ' : array_push($camposErroneos,"<p class='error'>Introduce un <span>código postal</span> válido</p>");
                break;
            


        }
    }
    return $camposErroneos;
}
    
// ARREGLAR ESTO DE AQUI ABAJO
    
function comprobarDni($dato){
    $numeros = substr($dato,0,-1) ;
    $letra = substr($dato,-1);

    $resultado = strlen($dato) === 9 && is_numeric($numeros) && is_string($letra) ? true : false;
    return $resultado;
}

function comprobarString($texto,$minLength,$maxLength){
    $resultado = ctype_alpha($texto) && strlen($texto) >= $minLength && strlen($texto) <= $maxLength ? true : false;
    return $resultado;
}

function comprobarJSON($array,$campo, $dato){
    foreach($array as $elemento){
        if($elemento["$campo"] === $dato ) return true;

    }
    return false;
}






?>