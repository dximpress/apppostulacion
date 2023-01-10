document.addEventListener('DOMContentLoaded', function(){
    var todayDate = moment().startOf('day');
    var YM = todayDate.format('YYYY-MM');
    var YESTERDAY = todayDate.clone().subtract(1, 'day').format('YYYY-MM-DD');
    var TODAY = todayDate.format('YYYY-MM-DD');
    var TOMORROW = todayDate.clone().add(1, 'day').format('YYYY-MM-DD');

    //Campos para agendar reunion
    var horagenda = $('#horagenda');
    var horagendafin = $('#horagendafin');
    var fechagenda = $('#fechagenda');

    //Campos para modificar reunión
    var postulantemod = $('#postulantemod');
    var fechagendamod = $('#fechagendamod');
    var horagendamod = $('#horagendamod');
    var horagendafinmod = $('#horagendafinmod');
    var observacionagendamod = $('#observacionagendamod');
    var idreunionmod = $('#idreunionmod');

    //Variable para conocer la longitud
    var longF = 0;

    var calendarEl = document.getElementById('kt_calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        plugins: [ 'bootstrap', 'interaction', 'dayGrid', 'timeGrid', 'list' ],
        themeSystem: 'bootstrap',
        locale: 'es',

        isRTL: KTUtil.isRTL(),

        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },

        height: 800,
        contentHeight: 780,
        aspectRatio: 3,  // see: https://fullcalendar.io/docs/aspectRatio

        nowIndicator: true,
      //  now: TODAY + 'T09:25:00' , // just for demo

        views: {
            dayGridMonth: { buttonText: 'Mes' },
            timeGridWeek: { buttonText: 'Semana' },
            timeGridDay: { buttonText: 'Día' }
        },

        defaultView: 'dayGridMonth',
        defaultDate: TODAY,
        minTime: "09:00:00", //Inicio del horario
        maxTime: "19:00:00", //Fin del horario
        allDaySlot: false,

        editable: true,
        eventLimit: true, // allow "more" link when too many events
        navLinks: true,
        events: {
            url: 'fechas-calendariozoomjson.php',
            extraParams: function() {
              return {
                cachebuster: new Date().valueOf()
              };
            }
        },

        // Función para ver los detalles del evento seleccionado
        eventClick: function(info) {
        //  console.log('Id: ' + info.event.id);
        //  console.log('Event: ' + info.event.title);
        //  console.log('Full: ' + formatearFecha(info.event.start));
        //  console.log('Date: ' + formatearFecha(info.event.start).substr(0, 10));
        //  console.log('Start: ' + formatearFecha(info.event.start).substr(10, 5));
        //  console.log('End: ' + formatearFecha(info.event.end).substr(11, 5));
        //  console.log('Long: ' + formatearFecha(info.event.start).length);
        //  console.log('Observacion: ' + info.event.extendedProps.description);    
        //  console.log('Info: '+ info); 

        long = formatearFecha(info.event.start).length;
        postulantemod.val(info.event.title);
        fechagendamod.val(formatearFecha(info.event.start).substr(0, 10));
        
        // horagendamod.val(formatearFecha(info.event.start).substr(11, 5));

        if (long == 18) {
            horagendamod.val('0'+formatearFecha(info.event.start).substr(11, 4));
        //    console.log('test hora:'+'0'+formatearFecha(info.event.start).substr(11, 4))
        }else{
            horagendamod.val(formatearFecha(info.event.start).substr(11, 5));
        }
        
        horagendafinmod.val(formatearFecha(info.event.end).substr(11, 5));
        
        observacionagendamod.val(info.event.extendedProps.description);
        idreunionmod.val(info.event.id);

        //  ModalModificarReunion
        $('#ModalModificarReunion').modal('show');
        },

        //Funcion para agragar un evento al seleccionar un día del calendario
        dateClick: function(info) {
            //2022-10-22T13:00:00-05:00
            var i = info.dateStr;
            var d = 0;
            // alert('Clicked on: ' + d.length);
            if (i.length > 10) {
                // Si selecciona la fecha en la semana o en el dia
                d = i.substr(0, 10);
                horagenda.val(i.substr(11, 5));
                horagendafin.val(i.substr(11, 5));
                // console.log(i.substr(11, 5));
            }else{
                d = i;
            }
           
           fechagenda.val(d);
           $('#ModalAgendarReunion').modal('show');
            
        },

        //Funcion para mover un evento de una fecha a otra
        eventDrop: function(info) {
            Swal.fire({
              title: '¿Estás seguro de realizar este cambio?',
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Si',
              cancelButtonText: 'No'
            }).then((result) => {
              if (result.isConfirmed) {
                Swal.fire(
                  'Listo',
                  'Registro actualizado.',
                  'success'
                );

                //Actualizar evento
                actualizarEvento(info.event.id,formatearFecha(info.event.start),formatearFecha(info.event.end));

              }else{
                info.revert();
              }
            })
        },

        //Funcion para redimensionar la fecha fin del evento
        eventResize: function(info) {
            
            Swal.fire({
              title: '¿Estás seguro de realizar este cambio?',
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Si',
              cancelButtonText: 'No'
            }).then((result) => {
              if (result.isConfirmed) {
                Swal.fire(
                  'Listo',
                  'Registro actualizado.',
                  'success'
                );

                //Actualizar evento
                actualizarEvento(info.event.id,formatearFecha(info.event.start),formatearFecha(info.event.end));

              }else{
                info.revert();
              }
            })
        },
        /*  TOOLTIPS
        eventRender: function(info) {
            var element = $(info.el);

            if (info.event.extendedProps && info.event.extendedProps.description) {
                if (element.hasClass('fc-day-grid-event')) {
                //    element.data('title', info.event.extendedProps.title);
                    element.data('content', info.event.extendedProps.description);
                    element.data('placement', 'top');
                    KTApp.initPopover(element);
                } 
                
                else if (element.hasClass('fc-time-grid-event')) {
                //    element.find('.fc-title').append('<div class="fc-description">' + info.event.extendedProps.description + '</div>');
                    element.data('content', info.event.extendedProps.description);
                    element.data('placement', 'top');
                    KTApp.initPopover(element);
                } 

                else if (element.find('.fc-list-item-title').lenght !== 0) {
                    element.find('.fc-list-item-title').append('<div class="fc-description">' + info.event.extendedProps.description + '</div>');
                }
            }
        }
        */
    });

    calendar.render();
});





