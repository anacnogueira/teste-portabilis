$(document).ready(function(){
  //Mascaras de campo
  //Data
  //if($("input.date").val() != undefined) {
    $("input.date").mask("99/99/9999");
  //}

  //Hora
  if($("input.hour").val() != undefined) {
    $("input.hour").mask("99:99");
  }


  //Telefone
  if($("input.phone").val() != undefined) {
    $("input.phone").mask("(99)?9999-9999");
  }

  //Celular
  if($("input.mobile").val() != undefined) {
    $("input.mobile").mask("(99)?99999-9999");
  }
  
  //CPF
  if($("input.cpf").val() != undefined) {
    $("input.cpf").mask("999.999.999-99");
  }

  //CNPJ
  if($("input.cnpj").val() != undefined) {
    $("input.cnpj").mask("99.999.999/9999-99");
  }  

  //Formatar CEP
  if($("input.cep").val() != undefined) {
    $("input.cep").mask("99999-999");
  }

  //Formatar campo valor
  if($("input.value").val() != undefined || $("input.value").val() != null) {
    $("input.value").priceFormat({
      prefix: '',
      centsSeparator: ',',
      thousandsSeparator: '.',
      limit: $(this).attr("maxlength"),
      centsLimit: 2
    });
  }

   //Formatar campo peso
  if($("input.weight").val() != undefined || $("input.weight").val() != null) {
    $("input.weight").priceFormat({
      prefix: '',
      centsSeparator: ',',
      thousandsSeparator: '.',
      limit: $(this).attr("maxlength"),
      centsLimit: 3
    });
  }

  //Somente números
  if($("input.onlyNumbers").val() != undefined){
    $("input.onlyNumbers").numeric();
  }

  //Date Picker
  if($("input.datepicker").val() != undefined){
    $( ".datepicker" ).datepicker({
      dateFormat: 'dd/mm/yy',
      dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
      dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
      dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
      monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
      monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
      nextText: 'Próximo',
      prevText: 'Anterior',
    });
  }

  //Placa
  if($("input.plate").val() != undefined) {
    $("input.plate").mask("aaa-9999",{completed:function(){
      var value = this.val().toUpperCase();
      this.val(value);
    }});    
  }
});