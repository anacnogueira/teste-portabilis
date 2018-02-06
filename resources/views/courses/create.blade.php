@extends('adminlte::page')

@section('htmlheader_title')
	Cursos
@endsection

@section('contentheader_title')
    Cursos
  @stop

@section('contentheader_description')
    Adicionar
@stop

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('cursos.index') }}"><i class="fa fa-users"></i>Cursos</a></li>
        <li class="active">Adicionar</li>
    </ol>
@stop

@section('main-content')
	<section class='content'>
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    {!! Form::open(['route' => 'cursos.store']) !!}
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