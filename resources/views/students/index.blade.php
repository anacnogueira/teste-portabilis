@extends('adminlte::page')

@section('htmlheader_title')
	Sistema &raquo; Usuários
@endsection

@section('contentheader_title')
    Sistema &raquo; Usuários
    <a href="{{ route('alunos.create')}}" class="btn btn-primary btn-xs"><i class="fa fa-pencil" aria-hidden="true"></i> Adicionar</a>
@stop

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-users"></i>Alunos</a></li>
        <li class="active">Listar</li>
    </ol>
@stop

@section('htmlheader_css')
    <link href="{{ asset('/plugins/datatables/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/css/sweetalert.css') }}" rel="stylesheet" type="text/css" />
@stop

@section('scripts_js')
    <script src="{{ asset('/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
    <!--script src="{{ asset('/js/sweetalert.min.js') }}"></script-->
    <script src="{{ asset('/js/studentsList.js') }}"></script>
@stop

@section('main-content')
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-danger">
                    <div class="box-header">
                        <h3 class="box-title">Listar Alunos</h3>
                    </div>
                    <div class="box-body">
                        <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                            <div class="row">
                                <div class="col-sm-6"></div>
                                <div class="col-sm-6"></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="student" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="table_info">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="order" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Ordernar por nome do usuário">Nome</th>
                                                <th class="sorting" tabindex="0" aria-controls="order" rowspan="1" colspan="1" aria-label="Ordernar pelo nome do grupo">CPF</th>
                                                <th class="sorting" tabindex="0" aria-controls="order" rowspan="1" colspan="1" aria-label="Ordernar pela área">RG</th>
                                                <th class="sorting" tabindex="0" aria-controls="order" rowspan="1" colspan="1" aria-label="Ordernar pelo e-mail do usuário">Data de Nascimento</th>
                                                <th class="sorting" tabindex="0" aria-controls="order" rowspan="1" colspan="1" aria-label="Ordernar pelo status do usuário">Telefone</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($students as $student)
                                            <tr role="row" class="">
                                                <td>
                                                    {{ $student->name }} <br>
                                                    <div style="float:left; margin-right: 10px">
                                                        {!! Form::open(['route' => ['alunos.destroy', $user->id], 'method' => 'delete', 'id'=>'form'.$user->id]) !!}
                                                        {!! Form::button('<i class="fa fa-times"></i> Excluir', ['type' => 'submit','class' => 'btn btn-danger', 'onclick'=>"deleteConfirm(event, {$user->id})"]) !!}
                                                        {!! Form::close() !!}
                                                        &nbsp; &nbsp;
                                                    </div>
                                                    <a href="{{ route('alunos.edit',['id' => $user->id]) }}" class='btn btn-warning'><i class="fa fa-edit"></i> Editar</a>
                                                    &nbsp; &nbsp;
                                                    <a href="{{ route('alunos.show',['id' => $user->id]) }}" class ='btn btn-primary'><i class="fa fa-eye"></i> Visualizar</a>
                                                   &nbsp; &nbsp;
                                                </td>
                                                <td>{{ $student->cpf }}</td>
                                                <td>{{ $student->rg }}</td>
                                                <td>{{ $student->date_birth }}</td>
                                                <td>{{ $student->phone }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                          <tr>
                                            <th rowspan="1" colspan="1">Nome</th>
                                            <th rowspan="1" colspan="1">CPF</th>
                                            <th rowspan="1" colspan="1">RG</th>
                                            <th rowspan="1" colspan="1">Data de Nascimento</th>
                                            <th rowspan="1" colspan="1">Telefone</th>
                                          </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection