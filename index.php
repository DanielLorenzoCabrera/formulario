<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="HTML, PHP">
    <meta name="author" content="Daniel Lorenzo, Ariadna Miranda">
    <title>Solicitud de servicios</title>
    <link rel="stylesheet" href="estilos.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="validacion.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script> 
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

</head>
<body>
    
    <?php   include 'funciones.php'  ?>
    
    <div class="wrapper">
    <h1>Solicitud de servicios</h1>
    <form action="formulario.php" enctype="multipart/form-data" method="POST">
        <fieldset id="representante">
            <legend>DATOS ACTÚA COMO REPRESENTANTE</legend>
            <div>
                <section>
                    <p class="apartado">¿Actúa como representante?</p>
                    <p>
                        <input type="radio" name="representante" id="estudiante" value="estudiante" disabled>
                        <label for="estudiante">Alumno/a</label>
                    </p>
                    <p>
                        <input type="radio" name="representante" id="representante" value="representante" checked disabled>
                        <label for="representante">Representante</label>
                    </p>
                </section>
                
            </div>
        </fieldset>

        <fieldset id="datos_representante">
            <legend>DATOS DEL REPRESENTANTE</legend>
            <div>
                <section class="campo">
                    <p class="apartado">Documento (*)</p>
                    <select name="documento" id="documento">
                        <option value="dni">DNI</option>
                    </select>
                </section>

                <section class="campo">
                    <p class="apartado">Nº de identificación (*)</p>
                    <input type="text" name="identificacion" id="identificacion" value="<?= comprobarSiExiste('identificacion') ?>" required>
                </section>

                <section class="campo">
                    <p class="apartado">Nombre (*)</p>
                    <input type="text" name="nombre" id="nombre" value="<?= comprobarSiExiste('nombre') ?>"required>
                </section>
                
                <section class="campo">
                    <p class="apartado">Primer apellido (*)</p>
                    <input type="text" name="apellido1" id="apellido1" value="<?= comprobarSiExiste('apellido1') ?>"required>
                </section>

                <section class="campo">
                    <p class="apartado">Segundo apellido (*)</p>
                    <input type="text" name="apellido2" id="apellido2" value="<?= comprobarSiExiste('apellido2') ?>" required>
                </section>

                <section class="campo">
                    <p class="apartado">En calidad de (*)</p>
                    <select name="calidad_de" id="calidad_de"  required>
                        <option value="guardador_de_hecho" <?= comprobarSelect("calidad_de","guardador_de_hecho", "selected",' ')  ?>>Guardador de hecho</option>
                        <option value="patria_potestad" <?=  comprobarSelect("calidad_de","patria_potestad", "selected",' ') ?> >Patria potestad</option>
                        <option value="representante_voluntario" <?=  comprobarSelect("calidad_de","representante_voluntario", "selected",' ') ?>>Representante voluntario</option>
                        <option value="tutor" <?=  comprobarSelect("calidad_de","tutor", "selected",' ')?>>Tutor</option>

                    </select>
                </section>

                <section class="campo">
                    <p class="apartado">Teléfono fijo </p>
                    <input type="text" name="fijo" id="fijo" value="<?= comprobarSiExiste("fijo")?>">
                </section>

                <section class="campo">
                    <p class="apartado">Teléfono móvil (*) </p>
                    <input type="text" name="movil" id="movil" value="<?= comprobarSiExiste("movil")?>" required>
                </section>

                <section class="campo">
                    <p class="apartado">Correo electrónico (*) </p>
                    <input type="text" name="correo" id="correo" value="<?= comprobarSiExiste("correo")?>" required>
                </section>
            </div>
        </fieldset>
        <fieldset>
            <legend>DOMICILIO DE CONTACTO</legend>
            <div>
                <section class="campo">
                        <p class="apartado">Tipo de vía (*)</p>
                        <select name="via" id="via" required>
                            <option value="avenida" <?=  comprobarSelect('via','avenida','selected', ' ') ?>>Avenida</option>
                            <option value="calle" <?= comprobarSelect('via','calle','selected',' ') /* $_REQUEST['via'] == 'calle' ? 'selected' : ' '*/ ?>>Calle</option>
                            <option value="carretera" <?=  comprobarSelect('via','carretera','selected',' ') ?>>Carretera</option>
                            <option value="otros" <?= comprobarSelect('via','otros','selected',' ') ?>>Otros</option>
                            <option value="paseo" <?= comprobarSelect('via','paseo','selected',' ') ?>>Paseo</option>
                            <option value="plaza" <?= comprobarSelect('via','plaza','selected',' ') ?>>Plaza</option>
                            <option value="ronda" <?= comprobarSelect('via','ronda','selected',' ') ?>>Ronda</option>
                            <option value="travesia" <?= comprobarSelect('via','travesia','selected',' ')  ?>>Travesia</option>
                            <option value="urbanizacion" <?= comprobarSelect('via','urbanizacion','selected',' ')  ?>>Urbanizacion</option>
                        </select>
                </section>
                <section class="campo">
                        <p class="apartado">Nombre de vía (*)</p>
                        <input type="text" name="nombre_via" id="nombre_via" value="<?=comprobarSiExiste('nombre_via')?>" required>
                </section>

                <section class="campo">
                        <p class="apartado">Número (*)</p>
                        <input type="text" name="numero_via" id="numero_via" value="<?=comprobarSiExiste('numero_via')?>" required>
                </section>

                <section class="campo">
                        <p class="apartado">Bloque</p>
                        <input type="text" name="bloque" id="bloque" value="<?=comprobarSiExiste('bloque')?>">
                </section>

                <section class="campo">
                        <p class="apartado">Escalera</p>
                        <input type="text" name="escalera" id="escalera" value="<?=comprobarSiExiste('escalera')?>">
                </section>

                <section class="campo">
                        <p class="apartado">Piso</p>
                        <input type="text" name="piso" id="piso" value="<?=comprobarSiExiste('piso')?>">
                </section>

                <section class="campo">
                        <p class="apartado">Letra</p>
                        <input type="text" name="letra" id="letra" value="<?=comprobarSiExiste('letra')?>">
                </section>

                <section class="campo">
                        <p class="apartado">Puerta</p>
                        <input type="text" name="puerta" id="puerta" value="<?=comprobarSiExiste('puerta')?>">
                </section>

                <section class="campo">
                        <p class="apartado">Complemento</p>
                        <input type="text" name="complemento" id="complemento" value="<?=comprobarSiExiste('complemento')?>">
                </section>

                <section class="campo">
                        <p class="apartado">Fecha</p>
                        <input type="date" name="fecha" id="fecha" value="<?=comprobarSiExiste('fecha')?>">
                </section>

                <section class="campo">
                        <p class="apartado">País (*)</p>
                        <select name="paises" id="paises" required></select>             
                </section>

                <section class="campo">
                        <p class="apartado">Provincia (*)</p>
                        <select name="provincias" id="provincias" required></select>
                </section>

                <section class="campo">
                        <p class="apartado">Isla (*)</p>
                        <select name="islas" id="islas">
                        </select>
                </section>

                <section class="campo">
                        <p class="apartado">Municipio (*)</p>
                        <select name="municipios" id="municipios" required>
                        </select>
                </section>

                <section class="campo">
                        <p class="apartado">Localidad (*)</p>
                        <input type="text" name="localidad" id="localidad" value="<?=comprobarSiExiste('localidad')?>" required>
                </section>

                <section class="campo">
                        <p class="apartado">Código postal (*)</p>
                        <input type="text" name="codigo_postal" id="codigo_postal" value="<?=comprobarSiExiste('codigo_postal')?>"required>
                </section>
            </div>


        </fieldset>
        
        <fieldset id="mas_datos">
            <legend>MÁS DATOS</legend>
            <div>
                <section>
                    <input type="checkbox" name="huerfano" id="huerfano" <?=  comprobarSelect('huerfano','on','checked',' ')/* $check = $_REQUEST["huerfano"]== 'on' ? 'checked' : ' '*/?>>
                    <label for="huerfano">El alumno/a es huérfano absoluto</label>    
                </section>
                <section>
                    <input type="checkbox" name="tutela" id="tutela" <?=comprobarSelect('tutela','on','checked',' ')?>>
                    <label for="tutela">El alumno se encuentra en régimen de tutela y guarda por la Administración</label>
                </section>
            </div>
        </fieldset>

        <fieldset>
            <legend>ALERGIAS, PATOLOGÍAS O DIETAS ESPECIALES</legend>
            <section>
                <p class="apartado">OTRAS ALERGIAS</p>
                <textarea name="alergias" id="alergias" cols="30" rows="10"></textarea>
            </section>
        </fieldset>

        <fieldset id="datos_academicos">
            <legend>DATOS ACADÉMICOS DEL ALUMNO O ALUMNA</legend>
            <div>
                <section>
                    <p class="apartado">Seleccione opción (seleccionar 1)</p>
                    <p>
                        <input type="radio" name="itinerario" id="itinerario_salud" value="salud" <?= !isset($_REQUEST['itinerario']) || $_REQUEST["itinerario"]== 'salud' ? 'checked' : ' '?>>
                        <label for="itinerario_salud">ITINERARIO: CIENCIAS DE LA SALUD</label>
                    </p>
                    <p>
                        <input type="radio" name="itinerario" id="itinerario_tecnologico" value="tecnologico" <?= comprobarSelect('itinerario','tecnologico','checked',' ')/*$_REQUEST["itinerario"]== 'tecnologico' ? 'checked' : ' '*/?>>
                        <label for="itinerario_tecnologico">ITINERARIO: CIENTÍFICO TECNOLÓGICO</label>
                    </p>
                    
                </section>

                <section>
                <p class="apartado" data-bs-toggle="collapse" data-bs-target="#bloque1"> <i class="fa fa-chevron-down"></i>Bloque1: (seleccione máximo 6)</p>
                <div class="collapse" id="bloque1">
                    <p>
                        <input type="checkbox" name="lengua" id="lengua" checked disabled>
                        <label for="lengua">Lengua Castella y Literatura</label>
                    </p>
                    <p>
                        <input type="checkbox" name="filosofia" id="filosofia" checked disabled>
                        <label for="filosofia">Filosofía</label>
                    </p>
                    <p>
                        <input type="checkbox" name="ed_fisica" id="ed_fisica" checked disabled>
                        <label for="ed_fisica">Educación Física</label>
                    </p>
                    <p>
                        <input type="checkbox" name="matematicas" id="matematicas" checked disabled>
                        <label for="matematicas">Matemáticas</label>
                    </p>
                    <p>
                        <input type="checkbox" name="fisica_quimica" id="fisica_quimica" checked disabled>
                        <label for="fisica_quimica">Física y Química</label>
                    </p>
                    <p>
                        <input type="checkbox" name="tutoria" id="tutoria" checked disabled>
                        <label for="tutoria">Tutoria</label>
                    </p>

                    </div>
                    

                </section>
                <section>
                <p class="apartado" data-bs-toggle="collapse" data-bs-target="#bloque2"><i class="fa fa-chevron-down"></i>Bloque2: (seleccionar 1)</p>
                <div class="collapse" id="bloque2">
                    <p>
                        <input type="radio" name="lengua_extranjera" id="ingles" value="ingles" <?= !isset($_REQUEST["lengua_extranjera"] ) || $_REQUEST["lengua_extranjera"]== 'ingles' ? 'checked' : ' '?>>
                        <label for="ingles">Primera lengua extranjera (Inglés)</label>
                    </p>
                    <p>
                        <input type="radio" name="lengua_extranjera" id="italiano" value="italiano" <?=  comprobarSelect('lengua_extranjera','italiano','checked',' ')?>>  
                        <label for="italiano">Primera lengua extranjera (Italiano)</label>
                    </p>
                </div>
                    
                </section>


                <section>
                <p class="apartado" data-bs-toggle="collapse" data-bs-target="#bloque3"><i class="fa fa-chevron-down"></i>Bloque3: (seleccionar 1)</p>
                <div class="collapse" id="bloque3">
                    <p>
                        <input type="radio" name="optativa1" id="biologia_geologia" value="biologia_geologia" <?= !isset($_REQUEST['optativa1']) || $_REQUEST["optativa1"]== 'biologia_geologia' ? 'checked' : ' ' ?> >
                        <label for="biologia_geologia">Biología y Geología</label>
                    </p>
                    <p>
                        <input type="radio" name="optativa1" id="dibujo_tecnico" value="dibujo_tecnico" <?= comprobarSelect('optativa1','dibujo_tecnico','checked', ' ')?>>
                        <label for="dibujo_tecnico">Dibujo Técnico</label>
                    </p>
                
                </div>
                </section>


                <section>
                <p class="apartado"data-bs-toggle="collapse" data-bs-target="#bloque4"><i class="fa fa-chevron-down"></i>Bloque4: (seleccionar 1)</p>
                <div class="collapse" id="bloque4">
                    <p>
                        <input type="radio" name="optativa2" id="tecnologia_industrial" value="tecnologia_industrial" <?= $check = (!isset($_REQUEST["optativa2"]) ||  $_REQUEST["optativa2"] == 'tecnologia_industrial') ? 'checked' : ' '?>>
                        <label for="tecnologia_industrial">Tecnología Industrial</label>
                    </p>
                    <p>
                        <input type="radio" name="optativa2" id="cultura_cientifica" value="cultura_cientifica" <?= comprobarSelect('optativa2','cultura_cientifica','checked', ' ')/*$check = $_REQUEST["optativa2"]== 'cultura_cientifica' ? 'checked' : ' '*/?>>
                        <label for="cultura_cientifica">Cultura Científica</label>
                    </p>
                    <p>
                        <input type="radio" name="optativa2" id="segunda_lengua" value="segunda_lengua_ingles" <?= comprobarSelect('optativa2','segunda_lengua_ingles','checked', ' ')?>>
                        <label for="segunda_lengua">Segunda Lengua Extrangera(Inglés)</label>
                    </p>
                    <p>
                        <input type="radio" name="optativa2" id="biologia_geologia2" value="biologia_geologia" <?= comprobarSelect('optativa2','biologia_geologia2','checked', ' ')?>>
                        <label for="biologia_geologia2">Biología y Geología</label>
                    </p>
                    <p>
                        <input type="radio" name="optativa2" id="dibujo_tecnico2" value="dibujo_tecnico2" <?=comprobarSelect('optativa2','dibujo_tecnico2','checked', ' ')?>>
                        <label for="dibujo_tecnico2">Dibujo Técnico</label>
                    </p>
                </div>
                </section>

                <section>
                <p class="apartado" data-bs-toggle="collapse" data-bs-target="#bloque5"><i class="fa fa-chevron-down"></i>Bloque5: (seleccionar 1)</p>
                <div class="collapse" id="bloque5">
                    <p>
                        <input type="radio" name="optativa3" id="religion" value="religion" <?= !isset($_REQUEST['optativa3']) || $_REQUEST["optativa3"]== 'religion' ? 'checked' : ' '?>>
                        <label for="religion">Religion Católica</label>
                    </p>
                    <p>
                        <input type="radio" name="optativa3" id="tecnologia_informacion" value="tecnologia_informacion" <?= comprobarSelect('optativa3','tecnologia_informacion','checked', ' ')?>>
                        <label for="tecnologia_informacion">Tecnologías de la información y la comunicación</label>
                    </p>

                </div>
                    
                </section>

            </div>

        </fieldset>

        <fieldset>

            <legend>MEDIOS DE DIFUSIÓN</legend>
            <div>
                <section>
                    <p class="apartado">CONCENTIMIENTO INFORMADO TRATAMIENTO DE IMÁGENES/VOZ DEL ALUMNADO EN CENTROS DOCENTES DE TITULARIDAD PÚBLICA DE LA CONSEJERÍA DE EDUCACIÓN, UNIVERSIDADES, CULTURA Y DEPORTES.</p>
                    <p class="apartado">De acuerdo con el Reglamento General de Protección de Datos y la Ley Orgánica 3/2018, de 5 de diciembre, de Protección de Datos Personales y Garantías de los Derechos Digitales, mediante la firma del presente documento se presta voluntariamente el consentimiento inequivocuo e informado y se autoriza expresamente al centro docente al "tratamiento de imagen/voz de actividades de los centros de titularidad pública", mediante los siguientes medios (solo se entenderá que conciente la difusión de imágenes/voz por los medios expresamente marcados a continuación.</p>
                    <p>
                        <span>
                            <input type="radio" name="consentimiento" id="consiente" value="consiente" <?= comprobarSelect('consentimiento','consiente','checked', ' ')?>>
                            <label for="consiente">Consiente</label>
                        </span>

                        <span>
                            <input type="radio" name="consentimiento" id="no_consiente" value="no_consiente" <?= comprobarSelect('consentimiento','no_consiente','checked', ' ')?>>
                            <label for="no_consiente">No consiente</label>
                        </span>
                         
                       
                    </p>
                    
                    <p> Página web del centro docente
                        <span>
                            <input type="radio" class="consiente" name="consentimiento_web" id="consiente_web" value="consiente_web" <?= comprobarSelect('consentimiento_web','consiente_web','checked', ' ')?>>
                            <label for="consiente_web">Consiente</label>
                        </span>

                        <span>
                            <input class="no_consiente" type="radio" name="consentimiento_web" id="no_consiente_web" value="no_consiente_web" <?=  (!isset($_REQUEST["consentimiento_web"])||$_REQUEST["consentimiento_web"]== 'no_consiente_web') ? 'checked' : ' '?>>
                            <label for="no_consiente_web">No consiente</label>
                        </span>
                    </p>

                    <p> App de alumnados y familias
                        <span>
                            <input type="radio"  class="consiente" name="consentimiento_app" id="consiente_app" value="consiente_app" <?=comprobarSelect('consentimiento_app','consiente_app','checked', ' ')?>>
                            <label for="consiente_app">Consiente</label>
                        </span>

                        <span>
                            <input type="radio" class="no_consiente" name="consentimiento_app" id="no_consiente_app" value="no_consiente_app" <?= $check = (!isset($_REQUEST["consentimiento_app"])||$_REQUEST["consentimiento_app"]== 'no_consiente_app') ? 'checked' : ' '?>>
                            <label for="no_consiente_app">No consiente</label>
                        </span>
                    </p>    
                    
                    <p> Facebook
                        <span>
                            <input type="radio" class="consiente" name="consentimiento_facebook" id="consiente_facebook" value="consiente_facebook" <?= comprobarSelect('consentimiento_facebook','consiente_facebook','checked', ' ')?>>
                            <label for="consiente_facebook">Consiente</label>
                        </span>

                        <span>
                            <input type="radio" class="no_consiente" name="consentimiento_facebook" id="no_consiente_facebook" value="no_consiente_facebook" <?=  (!isset($_REQUEST["consentimiento_facebook"])||$_REQUEST["consentimiento_facebook"]== 'no_consiente_facebook') ? 'checked' : ' '?>>
                            <label for="no_consiente_facebook">No consiente</label>
                        </span>
                    </p>

                    <p class="apartado">El consentimiento aquí otorgado podrá ser revocado en cualquier momento ante el propio centro docente, teniendo en cuenta que dicha revocación no surtirá efectos retroactivos.</p>
                </section>
            </div>
        </fieldset>

        <fieldset>
            <legend>Documentos Adjuntados</legend>

            <section id="aviso">
                <p>&#9888 Aviso:</p>
                <ul>
                    <li>Los formatos permitidos son <span>jpg, png, txt, odt, pdf, jpeg, doc, docx</span></li>
                    <li>El tamaño máximo por fichero es de <span>10 MB</span></li>
                    <li>El nombre de los ficheros no debe incluir caracteres acentuados, caracteres con diéresis, la eñe o caracteres especiales:<span>! " # $ % & ' * + , . / ; < = > ? @ [ ] ( ) ^ ` { | }</span></li>
                </ul>
            </section>

            <section id="documentos_pendientes">
                <p class="apartado">Lista de documentos pendientes</p>
                <p class="apartado">Documento</p>
                <p>
                    DNI del alumno o alumna ( o de los padres, madres o tutores legales de alumnado sin DNI)(SOLO ALUMNADO NUEVO)
                    <input type="file" name="dni_file" id="dni_file">
                </p>
                <p>
                    Para el alumnado procedente de otros centros, certificación académica del centro de origen en el que se especifique la promoción de curso o la terminación de estudios con propuesta para titulación
                    <input type="file" name="certificacion_file" id="certificacion_file">
                </p>
            </section>
        </fieldset>

        <section>
            <input type="submit" value="PROCESAR" name="enviar">
            <input type="reset" value="CANCELAR">
        </section>

    </form>
    





    </div>
    <script src="datos-academicos-collapse.js"></script>
</body>
</html>