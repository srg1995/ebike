function ajaxCargar() {
    dni=document.getElementById("nif").value;
    pass=document.getElementById("pass").value;

    //console.log("el nif es: "+dni);
    //console.log("el pass es: "+pass);
    var post_data = "dni=" + dni + "&pass=" + pass;
    http_request = new XMLHttpRequest();
    http_request.onreadystatechange = procesaCargar;
    http_request.open("POST", "../consultas/confirmarLogin.php", false); //True -> asincrono
    http_request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    http_request.send(post_data);
}

function procesaCargar() {

    if (http_request.readyState == 4)
    {
//console.log("Estado completo");
        if (http_request.status == 200)
        {
            console.log("Estatus 200");
            respuesta = http_request.responseText;
            //console.log("la respuesta es: "+respuesta);
           // console.log(document.getElementById("valido"));
            document.getElementById("valido").value=respuesta;


        } else
            console.log(http_request.status + ": La peticion AJAX no se ha procesado correctamente");
    } else
    {
        console.log("El estado no es completo");
    }
}

function validarModificarNIF() {
    var dni = document.getElementById("nif");
    console.log(dni);
    if (dni.validity.valueMissing)
    {
        dni.setCustomValidity('Campo vacio, introduce NIF');
        return false;
    }

    if (dni.validity.patternMismatch)
    {
        dni.setCustomValidity('NIF erroneo');
        return false;
    } else
    {
        expresion_regular_dni = /^\d{8}[a-zA-Z]$/;
        if (expresion_regular_dni.test(dni.value) == true)
        {
            numero = dni.value.substr(0, dni.value.length - 1);
            letr = dni.value.substr(dni.value.length - 1, 1);
            numero = numero % 23;
            letra = 'TRWAGMYFPDXBNJZSQVHLCKET';
            letra = letra.substring(numero, numero + 1);
            if (letra != letr.toUpperCase()) {
                dni.setCustomValidity('NIF erroneo, la letra del NIF no se corresponde');
                return false;
            }
        }
    }

    ajaxDni(dni.value);
    respuesta = document.getElementById('existe').value;
    console.log("la respuesta es" + respuesta);
    if (respuesta == "Existe")
    {
        var dni = document.getElementById("nif");
        dni.setCustomValidity('');
        return true;
    }

    dni.setCustomValidity('No existe el DNI introducido');
    return false;
}


function ajaxRellenar() {
    dni=document.getElementById("nif").value;


    //console.log("el nif es: "+dni);
    //console.log("el pass es: "+pass);
    var post_data = "dni=" + dni;
    http_request = new XMLHttpRequest();
    http_request.onreadystatechange = procesaRellenar;
    http_request.open("POST", "../consultas/rellenarDatos.php", true); //True -> asincrono
    http_request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    http_request.send(post_data);
}

function procesaRellenar() {

    if (http_request.readyState == 4)
    {
//console.log("Estado completo");
        if (http_request.status == 200)
        {
            console.log("Estatus 200");
            respuesta = JSON.parse(http_request.responseText);
            //console.log("la respuesta es: "+respuesta);
            console.log(document.getElementById("nombre"));


            document.getElementById("nombre").value=respuesta.nombre;
            document.getElementById("apellido1").value=respuesta.apellido1;
            document.getElementById("apellido2").value=respuesta.apellido2;


        } else
            console.log(http_request.status + ": La peticion AJAX no se ha procesado correctamente");
    } else
    {
        console.log("El estado no es completo");
    }
}

function comprobarContrasena() {
    valido=document.getElementById("valido");
    pass=document.getElementById("pass");
    console.log(valido.value);

    if (valido.value==0)
    {
        pass.setCustomValidity('Contraseña o DNI no validos');
        return false;
    }
    pass.setCustomValidity('');
    return true;
}

window.onload = function () {

    document.getElementsByTagName("input")[0].focus();
    var nif = document.getElementById("nif");
    nif.onchange = function () {
        validarNIF();
        //console.log("llamada");
    };
    nif.onclur = function () {
        validarNIF();
    };

    var dia = document.getElementById("dia").value;
    ajaxFecha(dia);
    console.log(dia+"holaaaaaaaaaaaaaa");
};