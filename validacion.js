 // Se lanza una función cuando se cargue el DOM
 $(document).ready(function () {
    var municipios = [];
    var islas = [];

    // Recuperamos todos los paises del json y los metemos en un select

    $.getJSON("json/paises.json", function (paises) { 
        $.each(paises, function (indice, dato) {
            $('#paises').append($('<option></option>').attr('value', dato.code).text(dato.name_es));
        })
    });

    $.getJSON("json/provincias.json", function (data) { 
        provincias = data;
    });

    $.getJSON("json/islas.json", function (data) { 
        islas = data;
    });


    $("#paises").change(function () {
        $('#provincias').empty(); // Vaciamos el contenido de islas

        $.each(provincias, function (indice, dato) {
            if ($("#paises").val() == "ES") {
                $('#provincias').append($('<option></option>').attr('value', dato.id).text(dato.nm));
            }
        })
    })


    
    // Convierte el json a array y por cada provincia que haya la introduce en el select #provincias

    $.getJSON("json/provincias.json", function (provincias) { 
        $.each(provincias, function (indice, dato) {
            $('#provincias').append($('<option></option>').attr('value', dato.id).text(dato.nm));
        })
    });

    // Guardamos todos los municipios en un array

    $.getJSON("json/municipios.json", function (data) { 
        municipios = data;
    });


    $.getJSON("json/islas.json", function (data) { 
        islas = data;
    });

   

    $("#provincias").change(function () {
        $('#islas').empty(); // Vaciamos el contenido de islas

        $.each(islas, function (indice, dato) {
            if ($("#provincias").val() == dato.provincia_id) {
                $('#islas').append($('<option></option>').attr('value', dato.isla_id).text(dato.nombre));
            }
        })
    })



    $("#provincias").change(function () {
        $('#municipios').empty(); // Vaciamos el contenido de municipios

        $.each(municipios, function (indice, dato) {
            if ($("#provincias").val() == dato.provincia_id) {
                $('#municipios').append($('<option></option>').attr('value', dato.municipio_id).text(dato.nombre));
            }
        })
    })

    let consiente = document.getElementById("consiente");
    consiente.addEventListener('change', consentAll);

    let noConsiente = document.getElementById("no_consiente");
    noConsiente.addEventListener('change', consentAll);
   

});

    function consentAll(){
        const consentimientos = document.querySelectorAll(`.${this.id}`);
        consentimientos.forEach(elemento => elemento.checked = true);

    }
    