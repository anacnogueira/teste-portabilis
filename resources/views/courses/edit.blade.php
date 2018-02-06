@extends('adminlte::page')

@section('htmlheader_title')
	Cursos
@endsection

@section('contentheader_title')
    Cursos
@stop

@section('contentheader_breadcrumb')
    <li><a href="{{ route('cursos.index') }}"><i class="fa fa-dashboard"></i> Cursos</a></li>
    <li class="active">Editar</li>
@stop

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('cursos.index') }}"><i class="fa fa-users"></i>Cursos</a></li>
        <li class="active">Editar</li>
    </ol>
@stop


@section('main-content')
	<section class='content'>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                {!! Form::model($course, ['route'=>['cursos.update', 'id' => $course->id],'method'=>'put']) !!}
                @include('courses.form')                            
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="actions">
                        <ul>
                            <li><a href="{{ route('cursos.index') }}" class="btn btn-warning"><i class="fa fa-list-alt"></i> Listar</a></li> 
                        </ul>
                    </div>
                </div>
            </div>                
        </div>
    </div>      
</section>
@endsection