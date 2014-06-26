$(document).ready(function(){
	$("#submit").on('click', function(event) {
		event.preventDefault();
                $.ajax({
                        type     : 'POST',
                        url      : base_url + 'index.php/builder/write',
                        data     : $("#generator").serialize(),
                        cache    : false,
                        async    : false,
                        //contentType: 'application/json;',
                        dataType : 'json',
                        success: function(data){                       
                           $("#proses").html(data);                           
                        },
                        complete: function(){
                            $("#loader").hide();
                       },
                       beforeSend : function(){
                        $("#loader").show();
                       },
                        error: function(xhr, textStatus, errorThrown){
                             console.log("status : " + errorThrown);
                            // console.log(errorThrown);
                        }
                    });
	});
        
        
        $("#table").change(function (event){
           event.preventDefault();		

		$.ajax({
                        type     : 'POST',
                        url      : base_url + 'index.php/builder/write',
                        data     : $("#generator").serialize(),
                        cache    : false,
                        async    : false,
                        //contentType: 'application/json;',
                        dataType : 'json',
                        success: function(data){                       
                           $("#proses").html(data);                           
                        },
                        complete: function(){
                            $("#loader").hide();
                       },
                       beforeSend : function(){
                        $("#loader").show();
                       },
                        error: function(xhr, textStatus, errorThrown){
                             console.log("status : " + errorThrown);
                            // console.log(errorThrown);
                        }
                    }); 
        });
        
        
        $(document).on('click','#build', function(event) {
		        event.preventDefault();
		
              var  $data = $("#form").serializeArray();
                   $data.push({name : 'table', value :$('select[name=table]').val()});
                
		          $.ajax({
                        type     : 'POST',
                        url      : base_url + 'index.php/builder/build',
                        data     : $data ,
                        cache    : false,
                        async    : false,
                        //contentType: 'application/json;',
                        dataType : 'html',
                        success: function(data){                       
                             $('#proses').prepend(data); 
                        },

                       complete: function(){
                          $("#loader").hide();
                          $('#form').delay(1000).fadeOut(200, function(){
                                $(this).remove();
                            });
                          
                       },
                       beforeSend : function(){
                        $("#loader").show();
                       },
                       
                        error: function(xhr, textStatus, errorThrown){
                             console.log("status : " + errorThrown);
                            // console.log(errorThrown);
                        }
                    });
	       });
});


// Create Menu

$(document).ready(function () {
        $(document).on('change','#all',function(){
            if($(this).prop('checked'))
            {      
                $('.validation').prop("checked",true);               
            }
            else
            {
               $('.validation').prop("checked",false);
            }
        });

        $(document).on('change','#menu',function(){
            if($(this).prop('checked'))
            {      
                $('.menu').prop("checked",true);               
            }
            else
            {
               $('.menu').prop("checked",false);
            }
        });


        // Send Ajax Create Menu

        $(document).on('click','#create-menu', function(event) {
            event.preventDefault();
    
              var  $data = $(".menu").serializeArray();
                  
                
              $.ajax({
                        type     : 'POST',
                        url      : base_url + 'index.php/builder/create_menu',
                        data     : $data ,
                        cache    : false,
                        async    : false,                        
                        dataType : 'html',
                        success: function(data){                       
                            $('#content-ajax').append(data);
                        },

                       complete: function(){
                          $("#loader").hide();
                       },
                       beforeSend : function(){
                        $("#loader").show();
                       },
                       
                        error: function(xhr, textStatus, errorThrown){
                             console.log("status : " + errorThrown);
                            // console.log(errorThrown);
                        }
                    });
         });
         
         
         
            
         

         
         // Select Relation Table 
         
         $(document).on('change','.select',function (){
            var data = $(this).val();
            var i = $(".select").index(this) ;
                i = i +1;
            console.log(i);
            if(data == 'SELECT')
            {                
                $('#relation' + i).removeClass('hide');   
                $('#relation' + i).addClass('show');                
            }
            else
            {
                $('#relation' + i).removeClass('show');
                $('#relation' + i).addClass('hide'); 
            }
            
         })//
         
         
         
        
}); // 