@extends('adminlte::page')

@section('htmlheader_title')
	Cursos
@endsection

@section('contentheader_title')
    Cursos
    <a href="{{ route('cursos.create')}}" class="btn btn-primary btn-xs"><i class="fa fa-pencil" aria-hidden="true"></i> Adicionar</a>
@stop

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-users"></i>Cursos</a></li>
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
    <script src="{{ asset('/js/sweetalert.min.js') }}"></script>
    <script src="{{ asset('/js/coursesList.js') }}"></script>
@stop

@section('main-content')
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-danger">
                    <div class="box-header">
                        <h3 class="box-title">Listar Cursos</h3>
                    </div>
                    <div class="box-body">
                        <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                            <div class="row">
                                <div class="col-sm-6"></div>
                                <div class="col-sm-6"></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="course" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="table_info">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="order" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Ordernar por nome do curso">Nome</th>
                                                <th class="sorting" tabindex="0" aria-controls="order" rowspan="1" colspan="1" aria-label="Ordernar pelo valor da mensalidade">Valor mensalidade</th>
                                                <th class="sorting" tabindex="0" aria-controls="order" rowspan="1" colspan="1" aria-label="Ordernar pelo valor da matrícula área">Valor matrícula</th>
                                                <th class="sorting" tabindex="0" aria-controls="order" rowspan="1" colspan="1" aria-label="Ordernar pelo periodo">Período</th>
                                                <th class="sorting" tabindex="0" aria-controls="order" rowspan="1" colspan="1" aria-label="Ordernar pela duração">Duração</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($courses as $course)
                                            <tr role="row" class="">
                                                <td>
                                                    {{ $course->name }} <br>
                                                    <div style="float:left; margin-right: 10px">
                                                        {!! Form::open(['route' => ['cursos.destroy', $course->id], 'method' => 'delete', 'id'=>'form'.$course->id]) !!}
                                                        {!! Form::button('<i class="fa fa-times"></i> Excluir', ['type' => 'submit','class' => 'btn btn-danger', 'onclick'=>"deleteConfirm(event, {$course->id})"]) !!}
                                                        {!! Form::close() !!}
                                                        &nbsp; &nbsp;
                                                    </div>
                                                    <a href="{{ route('cursos.edit',['id' => $course->id]) }}" class='btn btn-warning'><i class="fa fa-edit"></i> Editar</a>
                                                    &nbsp; &nbsp;
                                                    <a href="{{ route('cursos.show',['id' => $course->id]) }}" class ='btn btn-primary'><i class="fa fa-eye"></i> Visualizar</a>
                                                   &nbsp; &nbsp;
                                                </td>
                                                <td>{{ $course->monthly_amount }}</td>
                                                <td>{{ $course->registration_tax }}</td>
                                                <td>{{ $course->period }}</td>
                                                <td>{{ $course->duration }} meses</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                          <tr>
                                            <th rowspan="1" colspan="1">Nome</th>
                                            <th rowspan="1" colspan="1">Valor mensalidade</th>
                                            <th rowspan="1" colspan="1">Valor matrícula</th>
                                            <th rowspan="1" colspan="1">Período</th>
                                            <th rowspan="1" colspan="1">Duração</th>
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