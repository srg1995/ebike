function validarCampo(name) {
    var cadena = document.getElementById(name);

    console.log(cadena.validity);
    console.log(cadena.value);

    //Validar campo vacio
    if (cadena.validity.valueMissing)
    {
        cadena.setCustomValidity('Campo vacio, introduce ' + name);
        return false;
    }


    //Validar campos con solo letras
    if (!isNaN(cadena.value) || cadena.validity.patternMismatch)
    {
        cadena.setCustomValidity('Debes introducir unicamente letras');
        return false;
    }

    cadena.setCustomValidity('');
    return true;
}

function validarNIF() {
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

    respuesta=document.getElementById('existe').value;
    console.log("la respuesta es"+respuesta);
    if(respuesta=="Existe")
    {
        var dni = document.getElementById("nif");
        dni.setCustomValidity('NIF ya inscrito');
        return false;
    }
    dni.setCustomValidity('');
    return true;
}

function ajaxDni(dni) {
    var post_data="dni="+dni;
    http_request= new XMLHttpRequest();
    http_request.onreadystatechange = procesaDni;
    http_request.open("POST", "../consultas/consultaDNI.php", false); //True -> asincrono
    http_request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    http_request.send(post_data);

}

function procesaDni() {
    //console.log("procesa");
    if (http_request.readyState == 4)//Si el estado es completo
    {
        //console.log("Estado completo");
        if (http_request.status == 200)
        {
            console.log("Estatus 200");
            respuesta = http_request.responseText;
            document.getElementById('existe').value=respuesta;
        } else
            console.log(http_request.status + ": La peticion AJAX no se ha procesado correctamente");
    } else
    {
        console.log("El estado no es completo");
    }
}

function validarTelefono() {
    var tel = document.getElementById("telefono");
    console.log(tel.validity);
    console.log(tel.value);
    exp = /^(6|7)\d{8}$/;
    if (tel.validity.valueMissing)
    {
        tel.setCustomValidity('Campo vacio, introduce un telefono movil');
        return false;
    }

    if (!exp.test(tel.value))
    {
        tel.setCustomValidity('Telefono movil no valido');
        return false;
    }

    tel.setCustomValidity('');
    return true;
}

function validarEdad() {
    var edad = document.getElementById("edad");
    console.log(edad.validity);
    console.log(edad.value);
    if (edad.validity.valueMissing)
    {
        edad.setCustomValidity('Campo vacio, introduce la edad');
        return false;
    }
    if (edad.validity.rangeOverflow)
    {
        edad.setCustomValidity("Debe ser menor que 100");
        return false;
    }
    if (edad.validity.rangeUnderflow)
    {
        edad.setCustomValidity("Debe ser mayor que 18");
        return false;
    }

    edad.setCustomValidity('');
    return true;
}

window.onload = function () {
    document.getElementsByTagName("input")[0].focus();


    var nombre = document.getElementById("nombre");
    var apellido1 = document.getElementById("apellido1");
    var apellido2 = document.getElementById("apellido2");
    var edad = document.getElementById("edad");
    var telefono = document.getElementById("telefono");
    nombre.oninvalid = function () {
        validarCampo("nombre");
        //console.log(nombre.customError);
    };
    edad.onblur = function () {
        validarEdad();
    };
    edad.onchange = function () {
        validarEdad();
    };
    apellido1.onchange = function () {
        validarCampo("apellido1");
    };
    apellido1.onblur = function () {
        validarCampo("apellido1");
    };
    apellido2.onblur = function () {
        validarCampo("apellido2");
    };
    apellido2.onchange = function () {
        validarCampo("apellido2");
    };
    telefono.onchange = function () {
        validarTelefono();
    };
    telefono.onblur = function () {
        validarTelefono();
    };

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
};