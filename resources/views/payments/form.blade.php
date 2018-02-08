<div class="col-md-12">
  <div class="box box-danger">
    <div class="box-body">
     <div class="row">
        <div class="col-md-12">
          <p>Os campos com * são obrigatórios</p>
          <div class="form-group @if ($errors->has('type')) has-error @endif">
            {!! Form::label('type', 'Tipo*') !!} 
            {!! Form::select('type', $types, null, ['class' => 'form-control', 'placeholder' => 'Selecione o tipo de pagamento...']); !!}
            @if ($errors->has('type')) <span class="help-block">{{ $errors->first('type') }}</span> @endif
          </div>          
          <div class="form-group">
            {!! Form::label('value', 'Valor') !!} 
            {!! Form::text('value', null, $attributes = ['class' => 'custom form-control','readonly'=>true]); !!}            
          </div>
          <div class="form-group @if ($errors->has('value_paid')) has-error @endif">
            {!! Form::label('value_paid', 'Valor Pago') !!} 
            {!! Form::text('value_paid', null, $attributes = ['class' => 'custom value form-control']); !!}
            @if ($errors->has('value_paid')) <span class="help-block">{{ $errors->first('value_paid') }}</span> @endif
          </div>
          <div class="form-group">
            {!! Form::label('change', 'Troco') !!} 
            {!! Form::text('change', null, $attributes = ['class' => 'custom form-control','readonly'=>true]); !!}            
          </div>                                 
        </div>
    </div>
  </div>
  <div class="box-footer">
  	<a href="{{ route('matriculas.index')}}" class="btn btn-warning"><i class="fa fa-times"></i> Cancelar</a>
    &nbsp;&nbsp;
    {!! Form::button('<i class="fa fa-check"></i> Salvar', ['type' => 'submit','class' => 'btn btn-success', 'onclick'=>"saveConfirm(event, 'frm_payment')"]) !!}
  </div>  
 </div>
</div>  
{!! Form::hidden('registration_id', $registration_id); !!}   
{!! Form::close() !!}