@extends('adminlte::page')

@section('htmlheader_title')
    Cursos
@endsection

@section('contentheader_title')
    Cursos
@stop

@section('htmlheader_css')
    <link href="{{ asset('/css/sweetalert.css') }}" rel="stylesheet" type="text/css" />
@stop 

@section('scripts_js')  
    <script src="{{ asset('/js/sweetalert.min.js') }}"></script>
@stop 

@section('contentheader_description')
    Visualizar
@stop

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('cursos.index') }}"><i class="fa fa-users"></i>Cursos</a></li>
        <li class="active">Visualizar</li>
    </ol>
@stop

@section('main-content')
    <section class='content'>
        <div class="row">
            <div class="col-md-12">
                <div class="box box-danger">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <dl>
                                   <dt>Nome: </dt>
                                   <dd>{{ $course->name }}&nbsp;</dd>    
                                    <dt>Valor da matrícula: </dt>
                                    <dd>{{ $course->monthly_amount }}&nbsp;</dd>
                                    <dt>Valor da mensalidade: </dt>
                                    <dd>{!! $course->registration_tax !!}&nbsp;</dd>
                                    <dt>Período: </dt>
                                    <dd>{!! $course->period !!}&nbsp;</dd>
                                    <dt>Duração: </dt>
                                    <dd>{{ $course->duration }} meses&nbsp;</dd>                                   
                                </dl>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="actions">
                                    <ul>
                                        <li>
                                            <a href="{{ route('cursos.edit', ['id' => $course->id]) }}" class="btn btn-success"><i class="fa fa-edit"></i> Editar </a> 
                                        </li>
                                        <li>
                                            <div style="float:left; margin-right: 10px">
                                                {!! Form::open(['route' => ['cursos.destroy', $course->id], 'method' => 'delete', 'id'=>'form'.$course->id]) !!}
                                                {!! Form::button('<i class="fa fa-times"></i> Excluir', ['type' => 'submit','class' => 'btn btn-danger','onclick'=>"deleteConfirm(event, $course->id)"]) !!}
                                                {!! Form::close() !!}                                                    
                                            </div> 
                                        </li>
                                        <li>
                                            <a href="{{ route('cursos.index') }}" class="btn btn-warning"><i class="fa fa-list-alt"></i> Listar </a> 
                                        </li>
                                        <li>
                                            <a href="{{ route('cursos.create') }}" class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i> Adicionar</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>   
    </section>
@endsection
