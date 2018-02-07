@extends('adminlte::page')

@section('htmlheader_title')
	Matriculas
@endsection

@section('contentheader_title')
    Cursos
    <a href="{{ route('matriculas.create')}}" class="btn btn-primary btn-xs"><i class="fa fa-pencil" aria-hidden="true"></i> Adicionar</a>
@stop

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-users"></i>Matriculas</a></li>
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
    <script src="{{ asset('/js/registrationsList.js') }}"></script>
@stop

@section('main-content')
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-danger">
                    <div class="box-header">
                        <h3 class="box-title">Listar Matriculas</h3>
                    </div>
                    <div class="box-body">
                        <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                            <div class="row">
                                <div class="col-sm-6">
                                    <table border="0" cellspacing="5" cellpadding="5">
                                        <tbody>
                                            <tr>
                                                <td>Ano:</td>
                                                <td>{!! Form::select('year', $years, null, ['data-index'=>3,'class'=>'form-control','id' => 'year', 'placeholder' => 'Todos']); !!}</td>
                                            </tr>
                                            <tr>
                                                <td>Curso:</td>
                                                <td>{!! Form::select('course', $courses, null, ['data-index'=>2,'class'=>'form-control','id' => 'course', 'placeholder' => 'Todos']); !!}</td>
                                            </tr>
                                            <tr>
                                                <td>Aluno:</td>
                                                <td>{!! Form::select('student', $students, null, ['data-index'=>1, 'class'=>'form-control','id' => 'student', 'placeholder' => 'Todos']); !!}</td>
                                            </tr>
                                            <tr>
                                                <td>Pagamento Pendente:</td>
                                                <td>{!! Form::select('status', $status, null, ['data-index'=>4, 'class'=>'form-control','id' => 'status', 'placeholder' => 'Todos']); !!}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-sm-6">
                                    

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="registration" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="table_info">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="order" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Ordernar pelo código da matricula">Cód.</th>
                                                <th class="sorting" tabindex="0" aria-controls="order" rowspan="1" colspan="1" aria-label="Ordernar pelo nome do aluno">Aluno</th>
                                                <th class="sorting" tabindex="0" aria-controls="order" rowspan="1" colspan="1" aria-label="Ordernar pelo nome do curso">Curso</th>
                                                <th class="sorting" tabindex="0" aria-controls="order" rowspan="1" colspan="1" aria-label="Ordernar pelo ano letivo">Ano Letivo</th>
                                                <th class="sorting" tabindex="0" aria-controls="order" rowspan="1" colspan="1" aria-label="Ordernar pelo status">Ativo</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($registrations as $registration)
                                            <tr role="row" class="">
                                                <td>
                                                    {{ $registration->id }} <br>
                                                    <div style="float:left; margin-right: 10px">
                                                   
                                                    <a href="{{ route('matriculas.edit',['id' => $registration->id]) }}" class='btn btn-danger'><i class="fa fa-times"></i> Cancelar</a>
                                                    &nbsp; &nbsp;
                                                    <a href="{{ route('matriculas.show',['id' => $registration->id]) }}" class ='btn btn-primary'><i class="fa fa-eye"></i> Visualizar</a>
                                                   &nbsp; &nbsp;
                                                </td>
                                                <td>{{ $registration->student->name }}</td>
                                                <td>{{ $registration->course->name }}</td>
                                                <td>{{ $registration->year }}</td>
                                                <td>{{ $registration->active ? 'Sim' : 'Não' }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                          <tr>
                                            <th rowspan="1" colspan="1">Código</th>
                                            <th rowspan="1" colspan="1">Aluno</th>
                                            <th rowspan="1" colspan="1">Curso</th>
                                            <th rowspan="1" colspan="1">Ano Letivo</th>
                                            <th rowspan="1" colspan="1">Status</th>
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