function validarPassword(pwd) {
    var cadena = pwd;
    console.log(cadena);
    console.log(cadena.value);
   // console.log(respuesta);
    console.log(cadena.validity);

    //Validar campo vacio
    if (cadena.value == "")
    {
        
        cadena.setCustomValidity('Campo vacio, introduce contraseña');
        return false;
    }


    //Validar campos con solo letras
    if (respuesta == "false")
    {
        cadena.setCustomValidity('Contraseña incorrecta');
        return false;
    }else
    {
        console.log("Te has quedado");
    }

    cadena.setCustomValidity('');
    return true;
}

function comprobarPassword(password) {
    hash = document.getElementById('hash').value;
    var post_data="hash="+hash+"&password="+password;
    http_requestEnlaces = new XMLHttpRequest();
    http_requestEnlaces.onreadystatechange = procesaPassword;
    http_requestEnlaces.open("POST", "../consultas/obtenerPassword.php", false);
    http_requestEnlaces.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    http_requestEnlaces.send(post_data);
}


function procesaPassword() {

    if (http_requestEnlaces.readyState == 4)//Si el estado es completo
    {
        //console.log("Estado completo");
        if (http_requestEnlaces.status == 200)
        {
            console.log("Estatus 200");
            respuesta = http_requestEnlaces.responseText;
            
            

        } else
            console.log(http_requestEnlaces.status + ": La peticion AJAX no se ha procesado correctamente");
    } else
    {
        console.log("El estado no es completo");
    }
}

window.onload = function () {

//    document.getElementsByTagName("input")[0].focus();
//    var nif = document.getElementById("nif");
//    nif.onchange = function () {
//        validarNIF();
//        //console.log("llamada");
//    };
//    nif.onclur = function () {
//        validarNIF();
//    };
//    var dia = document.getElementById("dia").value;
//    ajaxFecha(dia);
//    console.log(dia+"holaaaaaaaaaaaaaa");

    validarPassword(document.getElementById("pwd"));
};
