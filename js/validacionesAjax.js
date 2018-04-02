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

function procesaDni(){
    if (http_request.readyState == 4){//Si el estado es completo
        //console.log("Estado completo");
        if (http_request.status == 200){
            console.log("Estatus 200");
            respuesta = http_request.responseText;
            document.getElementById('existe').value=respuesta;
        }
        else{
            console.log(http_request.status + ": La peticion AJAX no se ha procesado correctamente");
        }
    }
    else{
        console.log("El estado no es completo");
    }
}

function ajaxFecha(fecha){
    http_requestEnlaces = new XMLHttpRequest();
    http_requestEnlaces.onreadystatechange = procesaFecha;
    http_requestEnlaces.open("GET", "../consultas/verTurnos.php?fecha="+fecha, true); //True -> asincrono
    http_requestEnlaces.send(null);
}

function procesaFecha() {
    if (http_requestEnlaces.readyState == 4)//Si el estado es completo
    {
        if (http_requestEnlaces.status == 200)
        {
            console.log("Estatus 200");
            var turnos = JSON.parse(http_requestEnlaces.responseText);
            console.log(turnos);
            var selecTurno = document.getElementById("turno");
            selecTurno.innerHTML = "";
            for (var i = 0; i < turnos.length; i++) {
                turno = "<option value='"+turnos[i]+"'>"+turnos[i]+"</option>";
                console.log(turno);
                selecTurno.innerHTML = selecTurno.innerHTML+turno;
            }
        } else
            console.log(http_requestEnlaces.status + ": La peticion AJAX no se ha procesado correctamente");
    } else
    {
        console.log("El estado no es completo");
    }
}

function ajaxFecha(fecha) {
    http_requestEnlaces = new XMLHttpRequest();
    http_requestEnlaces.onreadystatechange = procesaFecha;
    http_requestEnlaces.open("GET", "../consultas/verTurnos.php?fecha=" + fecha, true); //True -> asincrono
    http_requestEnlaces.send(null);
}

function procesaFecha() {
    if (http_requestEnlaces.readyState == 4)//Si el estado es completo
    {
        if (http_requestEnlaces.status == 200)
        {
            console.log("Estatus 200");
            var turnos = JSON.parse(http_requestEnlaces.responseText);
            console.log(turnos);
            var selecTurno = document.getElementById("turno");
            selecTurno.innerHTML = "";
            for (var i = 0; i < turnos.length; i++) {
                turno = "<option value='" + turnos[i] + "'>" + turnos[i] + "</option>";
                console.log(turno);
                selecTurno.innerHTML = selecTurno.innerHTML + turno;
            }
        } else
            console.log(http_requestEnlaces.status + ": La peticion AJAX no se ha procesado correctamente");
    } else
    {
        console.log("El estado no es completo");
    }
}

function formatoFecha() {
    var array = document.getElementsByClassName("dias");
    for (var i = 0; i < array.length; i++) {
        array[i].innerHTML = "hola";
    }
}