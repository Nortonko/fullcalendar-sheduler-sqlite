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
            editable: true,
            selectable: true,
            allDaySlot: false,
            locale: 'sk',
            minTime: '14:00:00',
            maxTime: '24:00:00',
            height: 540,
            nowIndicator: true,
            
            events: "events.php",  // request to load current events
            
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
            
            select: function(start, end, jsEvent, view, resource) {  // click on empty time slot
                endtime = $.fullCalendar.moment(end).format('H:mm');
                starttime = $.fullCalendar.moment(start).format('dddd, MMMM Do YYYY, H:mm');
                var mywhen = starttime + ' – ' + endtime;
                start = moment(start).format();
                end = moment(end).format();
                $('#createEventModal #startTime').val(start);
                $('#createEventModal #endTime').val(end);
                $('#createEventModal #when').text(mywhen);
                if (resource.id == 1)                   
                    $('#createEventModal #color').val('#40E0D0');
                else 
                    $('#createEventModal #color').val('#FF8C00');
               
                $('#createEventModal #resource').val(resource.id);
                $('#createEventModal').modal('toggle');                
           },
           eventDrop: function(event, delta){ // event drag and drop
               $.ajax({
                   url: 'move.php',
                   data: 'action=update&newStart='+moment(event.start).format()+'&newEnd='+moment(event.end).format()+'&id='+event.id ,
                   type: "POST",
                   success: function(json) {
                   //alert(json);
                   }
               });
           },
           eventResize: function(event) {  // resize to increase or decrease time of event
               $.ajax({
                   url: 'resize.php',
                   data: 'action=update&newStart='+moment(event.start).format()+'&newEnd='+moment(event.end).format()+'&id='+event.id,
                   type: "POST",
                   success: function(json) {
                       //alert(json);
                   }
               });
           }
        });
               
       $('#submitButton').on('click', function(e){ // add event submit
           // We don't want this to act as a link so cancel the link action
           e.preventDefault();
           doSubmit(); // send to form submit function
       });
       
       $('#deleteButton').on('click', function(e){ // delete event clicked
           // We don't want this to act as a link so cancel the link action
           e.preventDefault();
           doDelete(); 
           //send data to delete function
       });
       
       function doDelete(){  // delete event 
           $("#calendarModal").modal('hide');
           var eventID = $('#eventID').val();
           $.ajax({
               url: 'delete.php',
               data: 'action=delete&id='+eventID,
               type: "POST",
               success: function(json) {
                   if(json == 1)
                        $("#calendar").fullCalendar('removeEvents',eventID);
                   else
                        return false;
                    
                   
               }
           });
       }
       function doSubmit(){ // add event
           $("#createEventModal").modal('hide');
           var title = $('#title').val();
           var startTime = $('#startTime').val();
           var endTime = $('#endTime').val();
           var color = $('#color').val();
           var resource = $('#resource').val();
           
           $.ajax({
               url: 'create.php',
               data: 'action=add&title='+title+'&start='+startTime+'&end='+endTime+'&color='+color+'&resource='+resource,
               type: "POST",
               success: function(json) {
                   $("#calendar").fullCalendar('renderEvent',
                   {
                       id: json.id,
                       title: title,
                       start: startTime,
                       end: endTime,
                       color: color,
                       resourceId: resource,
                   },
                   true);
               }
           });
           
       }
    });
