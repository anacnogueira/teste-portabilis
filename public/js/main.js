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

function number_format(number, decimals, dec_point, thousands_sep) {
  number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
  var n = !isFinite(+number) ? 0 : +number,
  prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
  sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
  dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
  s = '',
  toFixedFix = function(n, prec) {
    var k = Math.pow(10, prec);
    return '' + (Math.round(n * k) / k)
    .toFixed(prec);
  };
  // Fix for IE parseFloat(0.55).toFixed(0) = 0;
  s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
  if (s[0].length > 3) {
    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
  }
  if ((s[1] || '')
    .length < prec) {
    s[1] = s[1] || '';
    s[1] += new Array(prec - s[1].length + 1)
    .join('0');
  }
  return s.join(dec);
}

function cashToFloat(value)
{
    return isNaN(value) == false ? parseFloat(value) :   parseFloat(value.replace("R$","").replace(".","").replace(",","."));
}