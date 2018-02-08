@extends('adminlte::page')

@section('htmlheader_title')
    Alunos
@endsection

@section('contentheader_title')
    Alunos
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
        <li><a href="{{ route('alunos.index') }}"><i class="fa fa-users"></i>Alunos</a></li>
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
                                   <dd>{{ $student->name }}&nbsp;</dd>    
                                    <dt>RG: </dt>
                                    <dd>{{ $student->rg }}&nbsp;</dd>
                                    <dt>CPF: </dt>
                                    <dd>{!! $student->cpf !!}&nbsp;</dd>
                                    <dt>Data de Nascimento: </dt>
                                    <dd>{!! $student->date_birth !!}&nbsp;</dd>
                                    <dt>Telefone: </dt>
                                    <dd>{{ $student->phone }}&nbsp;</dd>                                   
                                </dl>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="actions">
                                    <ul>
                                        <li>
                                            <a href="{{ route('alunos.edit', ['id' => $student->id]) }}" class="btn btn-success"><i class="fa fa-edit"></i> Editar </a> 
                                        </li>
                                        <li>
                                            <div style="float:left; margin-right: 10px">
                                                {!! Form::open(['route' => ['alunos.destroy', $student->id], 'method' => 'delete', 'id'=>'form'.$student->id]) !!}
                                                {!! Form::button('<i class="fa fa-times"></i> Excluir', ['type' => 'submit','class' => 'btn btn-danger','onclick'=>"deleteConfirm(event, $student->id)"]) !!}
                                                {!! Form::close() !!}                                                    
                                            </div> 
                                        </li>
                                        <li>
                                            <a href="{{ route('alunos.index') }}" class="btn btn-warning"><i class="fa fa-list-alt"></i> Listar </a> 
                                        </li>
                                        <li>
                                            <a href="{{ route('alunos.create') }}" class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i> Adicionar</a>
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
