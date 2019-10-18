<!DOCTYPE html>   
<head>	
  <title>kalendár
  </title>	
  <meta http-equiv="content-type" content="text/html;charset=utf-8" />	
  <meta name="generator" content="Geany 1.32" />	
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
<script type="text/javascript" src="js/script.js"></script>     
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" crossorigin="anonymous"></script> 
  <link  href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" >  
  <link href="css/fullcalendar.css" rel="stylesheet" />
<script src="js/moment.min.js"></script>
<script src="js/fullcalendar.min.js"></script>
<script src="js/scheduler.min.js"></script>
<script src="js/sk.js"></script>
</head>
<body>
  <!-- add calander in this div -->
  <div class="container">  
    <div class="row">    
      <div id="calendar">
      </div>  
    </div>
  </div>
  <!--  Modal to Event Details -->
  <div id="calendarModal" class="modal fade">  
    <div class="modal-dialog">    
      <div class="modal-content">      
        <div class="modal-header">        
          <button type="button" class="close" data-dismiss="modal">&times;
          </button>        
          <h4 class="modal-title">Detail</h4>      
        </div>      
        <div id="modalBody" class="modal-body">        
          <h4 id="modalTitle" class="modal-title"></h4>        
          <div id="modalWhen" style="margin-top:5px;">
          </div>      
        </div>      
        <input type="hidden" id="eventID"/>      
        <div class="modal-footer">        
          <button class="btn" data-dismiss="modal">Zavrieť
          </button>      
        </div>    
      </div>  
    </div>
  </div>
  <!-- Modal-->	 
</body>
</html>