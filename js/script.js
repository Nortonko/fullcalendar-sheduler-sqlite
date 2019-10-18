$(document).ready(function(){
        var calendar = $('#calendar').fullCalendar({  // assign calendar
            header:{
                left: 'prev,next today',
                center: 'title',
                right: 'agendaDay,agendaFourDay'
            },
            views: {
				agendaFourDay: {
				type: 'agenda',
				duration: { days: 4 }
				}
			},
			resources: [
				{ id: '1', title: 'Dráha 1' },
				{ id: '2', title: 'Dráha 2' }
			],
            schedulerLicenseKey: 'GPL-My-Project-Is-Open-Source',
			defaultView: 'agendaFourDay',
			groupByDateAndResource: true,
            editable: false,
            selectable: false,
            allDaySlot: false,
            locale: 'sk',
            minTime: '14:00:00',
            maxTime: '24:00:00',
            height: 540,
            nowIndicator: true,
            
            events: "./servis/events.php",  // request to load current events
            
            eventClick:  function(event, jsEvent, view) {  // when some one click on any event
                endtime = $.fullCalendar.moment(event.end).format('H:mm');
                starttime = $.fullCalendar.moment(event.start).format('dddd, MMMM Do YYYY, H:mm');
                var mywhen = starttime + ' – ' + endtime;
                $('#modalTitle').html(event.title);
                $('#modalWhen').text(mywhen);
                $('#eventID').val(event.id);
                $('#modalColor').val(event.color);
                $('#calendarModal').modal();
            }, 
            
        });     
       
    });
