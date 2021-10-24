<?php


 #datos
 //var_dump($_REQUEST);
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
    "codigo_postal" => "",
    "itinerario" => ["salud","tecnologico"],
    "bloque1" => ["lengua","filosofia","ed_fisica","matematicas","fisica_quimica","tutoria"],
    "bloque2" => ["ingles","italiano"],
    "bloque3" => ["biologia_geologia","dibujo_tecnico"],
    "bloque4" => ["tecnologia_industrial","cultura_cientifica","segunda_lengua_ingles","biologia_geologia","dibujo_tecnico2"],
    "bloque5" => ["religion","tecnologia_informacion"],
    "consentimiento_web" => ["consiente_web", "no_consiente_web"],
    "consentimiento_app" => ["consiente_app", "no_consiente_app"],
    "consentimiento_facebook" => ["consiente_facebook", "no_consiente_facebook"]
];


$DATOS_OPCIONALES = [
    "fijo" => '',
    "bloque" => '',
    "escalera" => '',
    "piso" => '',
    "letra" => '',
    "puerta" => '',
    "complemento" => '',
    "fecha" => '',
    "huerfano" => '',
    "tutela" => '',
    "alergias" => ''
];


#funciones

function getDatos($fichero){
    $datosJSON =  file_get_contents($fichero); // Transmite un fichero completo a una cadena
    $datosArray = json_decode($datosJSON, true); //  Decodifica un string de JSON. El true indica si será un array asociativo
    return $datosArray;
}

function comprobarCamposVacios($DATOS_OBLIGATORIOS) {
    $camposVacios = [];
    foreach($_REQUEST as $posicion => $dato){
        if(array_key_exists($posicion,$DATOS_OBLIGATORIOS) && trim($dato) == ''){
            array_push($camposVacios,"<p class='error'>El campo <span>{$posicion}</span> está vacío</p>");
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
        $dato = htmlspecialchars(trim($dato));
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
                is_numeric($dato) && strlen($dato) >= 7 && strlen($dato) <= 15 ? '' :array_push($camposErroneos,"<p class='error'>Introduce un <span>número de móvil</span> correcto</p>");
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
                comprobarString($dato,5,50) ? ' ' : array_push($camposErroneos,"<p class='error'>Introduce una <span>localidad</span> válida</p>");
                break;
            case "codigo_postal" : 
                is_numeric($dato) && ctype_digit($dato) && strlen($dato) === 5 ? ' ' : array_push($camposErroneos,"<p class='error'>Introduce un <span>código postal</span> válido</p>");
                break;
            case "itinerario" :
                in_array($dato,$DATOS_OBLIGATORIOS["itinerario"]) ? ' ' : array_push($camposErroneos,"<p class='error'>Introduce un <span>itinerario</span> válido</p>");
                break;
            case "lengua":
                in_array($dato,$DATOS_OBLIGATORIOS["bloque1"]) ? ' ' : array_push($camposErroneos,"<p class='error'>Introduce un valor válido para <span>lengua</span></p>");
                break;
            case "filosofia":
                in_array($dato,$DATOS_OBLIGATORIOS["bloque1"]) ? ' ' : array_push($camposErroneos,"<p class='error'>Introduce un valor válido para <span>filosofia</span></p>");
                break;
            case "ed_fisica":
                in_array($dato,$DATOS_OBLIGATORIOS["bloque1"]) ? ' ' : array_push($camposErroneos,"<p class='error'>Introduce un valor válido para <span>educación física</span></p>");
                break;
            case "matematicas":
                in_array($dato,$DATOS_OBLIGATORIOS["bloque1"]) ? ' ' : array_push($camposErroneos,"<p class='error'>Introduce un valor válido para <span>matematicas</span></p>");
                break;
            case "fisica_quimica":
                in_array($dato,$DATOS_OBLIGATORIOS["bloque1"]) ? ' ' : array_push($camposErroneos,"<p class='error'>Introduce un valor válido para <span>física y química</span></p>");
                break;
            case "tutoria":
                in_array($dato,$DATOS_OBLIGATORIOS["bloque1"]) ? ' ' : array_push($camposErroneos,"<p class='error'>Introduce un valor válido para <span>tutoría</span></p>");
                break;
            case "lengua_extranjera":
                in_array($dato,$DATOS_OBLIGATORIOS["bloque2"]) ? ' ' : array_push($camposErroneos,"<p class='error'>Introduce un valor válido para <span>lengua extranjera</span></p>");
                break;
            case "optativa1":
                in_array($dato,$DATOS_OBLIGATORIOS["bloque3"]) ? ' ' : array_push($camposErroneos,"<p class='error'>Introduce un valor válido para el <span>bloque 3</span></p>");
                break;
            case "optativa2":
                in_array($dato,$DATOS_OBLIGATORIOS["bloque4"]) ? ' ' : array_push($camposErroneos,"<p class='error'>Introduce un valor válido para el <span>bloque 4</span></p>");
                break;
            case "optativa3":
                in_array($dato,$DATOS_OBLIGATORIOS["bloque5"]) ? ' ' : array_push($camposErroneos,"<p class='error'>Introduce un valor válido para el <span>bloque 5</span></p>");
                break;
            case "consentimiento_web";
                in_array($dato,$DATOS_OBLIGATORIOS["consentimiento_web"]) ? ' ' : array_push($camposErroneos,"<p class='error'>Introduce un valor válido para el <span>consentimiento web</span></p>");
                break;
            case "consentimiento_app";
                in_array($dato,$DATOS_OBLIGATORIOS["consentimiento_app"]) ? ' ' : array_push($camposErroneos,"<p class='error'>Introduce un valor válido para el <span>consentimiento app</span></p>");
                break;
            case "consentimiento_facebook";
                in_array($dato,$DATOS_OBLIGATORIOS["consentimiento_facebook"]) ? ' ' : array_push($camposErroneos,"<p class='error'>Introduce un valor válido para el <span>consentimiento facebook</span></p>");
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

    if(strlen($texto) < $minLength || strlen($texto) > $maxLength){
        return false;
    }
    
    for($i = 0 ; $i < strlen($texto); $i++){
        if(ctype_digit($texto[$i])){
            return false;
        }
    }
    return true;
}

function comprobarJSON($array,$campo, $dato){
    foreach($array as $elemento){
        if($elemento["$campo"] === $dato ) return true;

    }
    return false;
}

function subidaArchivos($fichero){
    if(isset($_REQUEST['enviar']) && !empty($_FILES[$fichero])) { // Preguntamos si ha sido llamado el boton de subir y si existe archivo en la variable global $_FILES
        $archivo = trim($_FILES[$fichero]['name']); // asignamos a la variable archivo el nombre del fichero recibido
        if(isset($archivo) && $archivo != " ") {  //Si el archivo contiene algo y es diferente de vacio
            //Obtenemos algunos datos necesarios sobre el archivo
            $tipo = $_FILES[$fichero]['type']; 
            $tamaño = $_FILES[$fichero]['size'];
            $temp = $_FILES[$fichero]['tmp_name'];
            
    


            //Se comprueba si el archivo a cargar es correcto observando su extensión y tamaño
            if($archivo == " ") {
                 echo 'No hay ningun archivo seleccionado, por favor, seleccione un archivo.';
                
              } else if(!((strpos($tipo,"gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamaño < 4000000 ))) {
                echo '<div><b>Error. La extensión o el tamaño de los archivos no es correcta. <br/> 
                 -Se permiten archivos .gif, .jpg, .png y de 400 kb como máximo. </br></div> ';
    
            }else {
                //Si la imagen es correcta en tamaño y tipo
                //Se intenta subir a la carpeta documentos
    
                if(move_uploaded_file($temp, 'documentos/img/'.$_REQUEST['identificacion'].'-'.$archivo)) {
                    echo '<div><b>Se ha subido correctamente la imagen.</b></div>';
                    return true;
                } 
                else {
                    echo '<div><b>Ocurrió algún error al subir el fichero. No pudo guardarse.</b></div>';
                }   
    
                }
            }
        }
}


function comprobarDatosOpcionales($DATOS_OPCIONALES){
    $camposErroneos = [];
    foreach($_REQUEST as $posicion => $dato){
        $dato = htmlspecialchars(trim($dato));
        if(empty($dato)) continue;
        switch($posicion){
            case "fijo" :
                is_numeric($dato) && strlen($dato) >= 7 && strlen($dato) <= 15  ? '' : array_push($camposErroneos,"<p class='error'>Introduce un <span>número de teléfono fijo</span> correcto</p>");
                break;
            case "bloque" :
                 is_numeric($dato) && strlen($dato) > 0 && strlen($dato) <=3 ? '' : array_push($camposErroneos,"<p class='error'>Introduce un <span>número de bloque</span> correcto</p>");
                break;
            case "escalera" :
                comprobarString($dato, 5, 20) ? '' : array_push($camposErroneos ,"<p class='error'>Introduce un <span>nombre de escalera</span> correcto</p>");
                break;
            case "piso" :
                 comprobarString($dato, 5, 20) ? '' : array_push($camposErroneos ,"<p class='error'>Introduce un <span>piso</span> correcto</p>");
                break;
            case "letra" :
                 comprobarString($dato, 1, 1) ? '' : array_push($camposErroneos ,"<p class='error'>Introduce una <span>letra</span> correcta</p>");
                break;
            case "puerta" : 
                 comprobarString($dato, 1, 20) ? '' : array_push($camposErroneos ,"<p class='error'>Introduce una <span>puerta</span> correcta</p>");
                break;
            case "complemento" : 
                comprobarString($dato, 1, 20) ? '' : array_push($camposErroneos ,"<p class='error'>Introduce un <span>complemento</span> correcto</p>");
                break;
            case "fecha" :
                comprobarFecha($dato) ? '' : array_push($camposErroneos ,"<p class='error'>Introduce una <span>fecha</span> correcta</p>");
                break;
            case "huerfano":
                $dato === 'on' ? '' : array_push($camposErroneos ,"<p class='error'>Introduce un valor correcto en el campo <span>huérfano</span></p>");
                break;
            case "tutela":
                $dato === 'on' ? '' : array_push($camposErroneos ,"<p class='error'>Introduce un valor correcto en el campo <span>tutela</span></p>");
                break;
            case "alergias":
                comprobarString($dato,5,100) ? '' : array_push($camposErroneos ,"<p class='error'>Introduce un valor correcto en el campo <span>alergias</span></p>");
                break;


        }
        
    }
    return $camposErroneos;

}


function comprobarFecha($dato){
    $fecha = explode("-",$dato);
    $month = $fecha[1];
    $day = $fecha[2];
    $year = $fecha[0];
    if(!checkdate($month,$day,$year)) return false;
    return true;
}



function guardarFormulario(){
    $archivo = fopen("formulario.json","w+");
    $resultado = json_encode($_REQUEST);
    fwrite($archivo,$resultado);
    fclose($archivo);
    
}

function crearSeccion($titulo,$contenidos){
    echo "<section>";
    echo "<h3>{$titulo}</h3>";
    foreach($contenidos as $contenido){
        echo $contenido;
    }
    echo "</section>";

}



?>
