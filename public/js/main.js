function deleteConfirm(event, id){
	event.preventDefault();
	var form = document.getElementById("form"+id);

	swal({   
		title: "Tem certeza que deseja excluir o registro " + id + "?",   
		text: "Você não poderá recuperar esse registro após esta ação",   
		type: "warning",   
		showCancelButton: true, 
		cancelButtonText: "Cancelar",  
		confirmButtonColor: "#DD6B55",   
		confirmButtonText: "Sim",   
		closeOnConfirm: false 
	}, 
	function(isConfirm){  
		if(isConfirm){
			form.submit(); 
		} else {
			event.returnValue = false; 
			return false;
		}		
	});
}