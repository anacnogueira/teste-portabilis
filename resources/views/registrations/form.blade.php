<div class="col-md-12">
  <div class="box box-danger">
    <div class="box-body">
     <div class="row">
        <div class="col-md-12">
          <p>Os campos com * são obrigatórios</p>
          <div class="form-group @if ($errors->has('student_id')) has-error @endif">
            {!! Form::label('student_id', 'Aluno*') !!} 
            {!! Form::select('student_id', $students, null, ['class' => 'form-control', 'placeholder' => 'Selecione o aluno...']); !!}
            @if ($errors->has('student_id')) <span class="help-block">{{ $errors->first('student_id') }}</span> @endif
          </div>          
          <div class="form-group @if ($errors->has('course_id')) has-error @endif">
            {!! Form::label('course_id', 'Curso*') !!} 
            {!! Form::select('course_id', $courses, null, ['class' => 'form-control', 'placeholder' => 'Selecione o curso...']); !!}
            @if ($errors->has('course_id')) <span class="help-block">{{ $errors->first('course_id') }}</span> @endif
          </div>
          <div class="form-group @if ($errors->has('  year')) has-error @endif">
            {!! Form::label(' year', 'Ano letivo*') !!} 
            {!! Form::number('year', $year, $attributes = ['class' => 'form-control']); !!}
            @if ($errors->has('year')) <span class="help-block">{{ $errors->first('year') }}</span> @endif
          </div>                           
        </div>
    </div>
  </div>
  <div class="box-footer">
  	<a href="{{ route('matriculas.index')}}" class="btn btn-warning"><i class="fa fa-times"></i> Cancelar</a>
    &nbsp;&nbsp;
    {!! Form::button('<i class="fa fa-check"></i> Salvar', ['type' => 'submit','class' => 'btn btn-success']) !!}
  </div>  
 </div>
</div>     
{!! Form::close() !!}