@extends('adminlte::page')

@section('htmlheader_title')
	Alunos
@endsection

@section('contentheader_title')
    Alunos
  @stop

@section('contentheader_description')
    Adicionar
@stop

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('alunos.index') }}"><i class="fa fa-users"></i>Administração &raquo; Usuários</a></li>
        <li class="active">Adicionar</li>
    </ol>
@stop

@section('main-content')
	<section class='content'>
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    {!! Form::open(['route' => 'alunos.store']) !!}
                    @include('students.form')                        
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="actions">
                            <ul>
                                <li><a href="{{ route('alunos.index') }}" class="btn btn-warning"><i class="fa fa-list-alt"></i> Listar</a></li>                           
                            </ul>
                        </div>
                    </div>
                </div>                
            </div>
        </div>      
    </section>
@endsection