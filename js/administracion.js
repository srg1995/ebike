function ajaxFecha(fecha) {
    http_requestEnlaces = new XMLHttpRequest();
    http_requestEnlaces.onreadystatechange = procesaFecha;
    http_requestEnlaces.open("GET", "../consultas/verTurnos_1.php?fecha=" + fecha, true); //True -> asincrono
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
