<div class="col-md-12">
  <div class="box box-danger">
    <div class="box-body">
     <div class="row">
        <div class="col-md-12">
          <p>Os campos com * são obrigatórios</p>
          <div class="form-group @if ($errors->has('name')) has-error @endif">
            {!! Form::label('name', 'Nome*') !!} 
            {!! Form::text('name', null, $attributes = ['class' => 'form-control']); !!}
            @if ($errors->has('name')) <span class="help-block">{{ $errors->first('name') }}</span> @endif
          </div>          
          <div class="form-group @if ($errors->has('monthly_amount')) has-error @endif">
            {!! Form::label('monthly_amount', 'Valor da Mensalidade*') !!} 
            {!! Form::text('monthly_amount', null, $attributes = ['class' => 'custom value form-control']); !!}
            @if ($errors->has('monthly_amount')) <span class="help-block">{{ $errors->first('monthly_amount') }}</span> @endif
          </div>
           <div class="form-group @if ($errors->has('registration_tax')) has-error @endif">
            {!! Form::label('registration_tax', 'Valor da matrícula*') !!} 
            {!! Form::text('registration_tax', null, $attributes = ['class' => 'custom value  form-control']); !!}
            @if ($errors->has('registration_tax')) <span class="help-block">{{ $errors->first('registration_tax') }}</span> @endif
          </div>
          <div class="form-group @if ($errors->has('period')) has-error @endif">
            {!! Form::label('period', 'Período*') !!} 
            {!! Form::select('period', $periods, null, ['class' => 'form-control', 'placeholder' => 'Selecione o período...']); !!}
            @if ($errors->has('period')) <span class="help-block">{{ $errors->first('period') }}</span> @endif
          </div>
          <div class="form-group @if ($errors->has('duration')) has-error @endif">
            {!! Form::label('duration', 'Duração (em meses)*') !!} 
            {!! Form::number('duration', null, $attributes = ['class' => 'form-control','min'=>1]); !!}
            @if ($errors->has('duration')) <span class="help-block">{{ $errors->first('duration') }}</span> @endif
          </div>                           
        </div>
    </div>
  </div>
  <div class="box-footer">
  	<a href="{{ route('cursos.index')}}" class="btn btn-warning"><i class="fa fa-times"></i> Cancelar</a>
    &nbsp;&nbsp;
    {!! Form::button('<i class="fa fa-check"></i> Salvar', ['type' => 'submit','class' => 'btn btn-success', 'onclick'=>"saveConfirm(event, 'frm_course')"]) !!}
  </div>  
 </div>
</div>     
{!! Form::close() !!}