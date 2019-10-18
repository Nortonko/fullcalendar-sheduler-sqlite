<!DOCTYPE html>
<head>	
  <title>kalendár
  </title>	
  <meta http-equiv="content-type" content="text/html;charset=utf-8" />	
  <meta name="generator" content="Geany 1.32" />	
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
<script type="text/javascript" src="../js/servis.js"></script>     
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" crossorigin="anonymous"></script> 
  <link  href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" >  
  <link href="../css/fullcalendar.css" rel="stylesheet" />
<script src="../js/moment.min.js"></script>
<script src="../js/fullcalendar.min.js"></script>
<script src="../js/scheduler.min.js"></script>
<script src="../js/sk.js"></script>
</head>
<body>
  <!-- add calander in this div -->
  <div class="container">  
    <div class="row">    
      <div id="calendar">
      </div>  
    </div>
  </div>
  <!--  Modal  to Add Event -->
  <div id="createEventModal" class="modal fade" role="dialog">  
    <div class="modal-dialog">    
      <!--  Modal content-->    
      <div class="modal-content">      
        <div class="modal-header">        
          <button type="button" class="close" data-dismiss="modal">&times;
          </button>        
          <h4 class="modal-title">Pridať</h4>      
        </div>      
        <div class="modal-body">        
          <div class="control-group">          
            <label class="control-label" for="inputPatient">Názov:
            </label>          
            <div class="field desc">            
              <input class="form-control" id="title" name="title" placeholder="Event" type="text">          
            </div>        
          </div>        
          <div class="control-group">					
            <label for="color" class="col-sm-2 control-label">Dráha:
            </label>					
            <div class="col-sm-10">          
              <input id="resource" name="resource" type="hidden">					  
              <select name="color" class="form-control" id="color" placeholder="color">						  
                <option style="color:#40E0D0;" value="#40E0D0">&#9724; Dráha 1
                </option>						  
                <option style="color:#FF8C00;" value="#FF8C00">&#9724; Dráha 2
                </option>					 
              </select>					              					
            </div>		
          </div>        
          <input type="hidden" id="startTime"/>        
          <input type="hidden" id="endTime"/>        
          <div class="control-group">          
            <label class="control-label" for="when">Kedy:
            </label>          
            <div class="controls controls-row" id="when" style="margin-top:5px;"> 
            </div>        
          </div>      
        </div>      
        <div class="modal-footer">        
          <button type="button" class="btn btn-default" data-dismiss="modal">Zrušiť
          </button>        
          <button type="submit" class="btn btn-primary" id="submitButton">Uložiť
          </button>      
        </div>    
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
          <button class="btn" data-dismiss="modal">Zatvoriť
          </button>        
          <button type="submit" class="btn btn-danger" id="deleteButton">Zmazať
          </button>      
        </div>    
      </div>  
    </div>
  </div>
  <!-- Modal-->	 
</body>
</html>