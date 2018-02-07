$('#type').change(function(){
	var type = $(this).val();
	var registration_id = $("input[name='registration_id']").val();
	console.log(registration_id);


	$.ajax({
        type: "GET",
        async: true,
        url: URL + '/matriculas/valor/' + registration_id + "/" + type,       
        success: function(data) {        
        	$("#value").val(data);     
            
      	},
      	error: function (xhr, ajaxOptions, thrownError) {
        	console.log("Status: " + xhr.status);
        	console.log("Message: " + thrownError);
      	}
    });   
})

$("#value_paid").keyup(function(){
	
	var value = cashToFloat($('#value').val());
	var value_paid = cashToFloat($('#value_paid').val());
	

	var change = number_format((value_paid - value),2,",",".");


	$("#change").val("R$ " + change);

})