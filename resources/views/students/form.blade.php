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
          <div class="form-group @if ($errors->has('rg')) has-error @endif">
            {!! Form::label('rg', 'RG*') !!} 
            {!! Form::text('rg', null, $attributes = ['class' => 'form-control']); !!}
            @if ($errors->has('rg')) <span class="help-block">{{ $errors->first('rg') }}</span> @endif
          </div>
           <div class="form-group @if ($errors->has('cpf')) has-error @endif">
            {!! Form::label('cpf', 'CPF*') !!} 
            {!! Form::text('cpf', null, $attributes = ['class' => 'cpf form-control']); !!}
            @if ($errors->has('cpf')) <span class="help-block">{{ $errors->first('cpf') }}</span> @endif
          </div>
          <div class="form-group @if ($errors->has('date_birth')) has-error @endif">
            {!! Form::label('date_birth', 'Data de Nascimento*') !!} 
            {!! Form::text('date_birth', null, $attributes = ['class' => 'form-control']); !!}
            @if ($errors->has('date_birth')) <span class="help-block">{{ $errors->first('date_birth') }}</span> @endif
          </div>
          <div class="form-group @if ($errors->has('phone')) has-error @endif">
            {!! Form::label('phone', 'Telefone*') !!} 
            {!! Form::text('phone', null, $attributes = ['class' => 'phone form-control']); !!}
            @if ($errors->has('phone')) <span class="help-block">{{ $errors->first('phone') }}</span> @endif
          </div>                           
        </div>
    </div>
  </div>
  <div class="box-footer">
  	<a href="{{ route('alunos.index')}}" class="btn btn-warning"><i class="fa fa-times"></i> Cancelar</a>
    &nbsp;&nbsp;
    {!! Form::button('<i class="fa fa-check"></i> Salvar', ['type' => 'submit','class' => 'btn btn-success']) !!}
  </div>  
 </div>
</div>     
{!! Form::close() !!}