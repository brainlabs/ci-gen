
$(document).ready(function (){

        $('[data-tooltip="tooltip"]').tooltip(); 
		
		
		
		 $('body').on('focus',".tanggal", function(){                     
                      $(this).datepicker({
                            format: " yyyy-mm-dd",
                            viewMode: "year",
                            autoclose:true,
                            todayHighlight:true,
                            language:'id',
                            calendarWeeks:false,
                            startView:0,
                            todayBtn: "linked"
                     });
               }); 
        
        
});