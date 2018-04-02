var http_request;
window.onload=function(){
    ajax();
    setInterval(function(){
        ajax();
    }, 7000);

}

function ajax(){
    http_request = new XMLHttpRequest();
    http_request.onreadystatechange=cargarCalendario;
    http_request.open("GET","../consultas/cargarCalendario.php",true);
    http_request.send(null);
}

function cargarCalendario(){
    if(http_request.readyState==4){
        if(http_request.status==200){
            dias = JSON.parse(http_request.responseText);
            $(document).ready(function() {

                $('#calendar').fullCalendar({
                    header: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'month,basicWeek,basicDay'
                    },
                    contentHeight: 565,
                    showNonCurrentDates: true,
                    fixedWeekCount: false,
                    defaultDate: '2018-02-12',
                    navLinks: true, // can click day/week names to navigate views
                    editable: true,
                    eventLimit: true, // allow "more" link when too many events
                    events: dias
                });
            });
        }
        else{
            alert("La peticion de AJAX no se ha procesado correctamente");
        }
    }
}