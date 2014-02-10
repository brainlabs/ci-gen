$(document).ready(function(){
	$("#submit").on('click', function(event) {
		event.preventDefault();
		

		$.ajax({
                        type     : 'POST',
                        url      : base_url + 'gens/write',
                        data     : $("#generator").serialize(),
                        cache    : false,
                        async    : false,
                        //contentType: 'application/json;',
                        dataType : 'json',
                        success: function(data){                       
                        
                           $("#proses").html(data);
                        },
                       
                        error: function(xhr, textStatus, errorThrown){
                             console.log("status : " + errorThrown);
                            // console.log(errorThrown);
                        }
                    });
	});
        
        
        $(document).on('click','#build', function(event) {
		event.preventDefault();
		

		$.ajax({
                        type     : 'POST',
                        url      : base_url + 'gens/build',
                        data     : $("#form").serialize(),
                        cache    : false,
                        async    : false,
                        //contentType: 'application/json;',
                        dataType : 'html',
                        success: function(data){                       
                        
                        },
                       
                        error: function(xhr, textStatus, errorThrown){
                             console.log("status : " + errorThrown);
                            // console.log(errorThrown);
                        }
                    });
	});
});

