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
                                   <fieldset>
                                       <legend>Dados do Aluno</legend>
                                        <dt>Nome: </dt>
                                        <dd>{{ $registration->student->name }}&nbsp;</dd>    
                                        <dt>RG: </dt>
                                        <dd>{{ $registration->student->rg }}&nbsp;</dd>
                                        <dt>CPF: </dt>
                                        <dd>{!! $registration->student->cpf !!}&nbsp;</dd>
                                        <dt>Data de Nascimento: </dt>
                                        <dd>{!! $registration->student->date_birth !!}&nbsp;</dd>
                                        <dt>Telefone: </dt>
                                        <dd>{{ $registration->student->phone }}&nbsp;</dd>
                                   </fieldset>

                                   <fieldset>
                                       <legend>Dados do Curso</legend>
                                        <dt>Nome: </dt>
                                        <dd>{{ $registration->course->name }}&nbsp;</dd>    
                                        <dt>Valor da matrícula: </dt>
                                        <dd>{{ $registration->course->monthly_amount }}&nbsp;</dd>
                                        <dt>Valor da mensalidade: </dt>
                                        <dd>{!! $registration->course->registration_tax !!}&nbsp;</dd>
                                        <dt>Período: </dt>
                                        <dd>{!! $registration->course->period !!}&nbsp;</dd>
                                        <dt>Duração: </dt>
                                        <dd>{{ $registration->course->duration }} meses&nbsp;</dd>
                                   </fieldset>     

                                   <fieldset>
                                       <legend>Pagamentos</legend>
                                       <table class="table table-bordered table-hover">
                                           <thead>
                                               <tr>
                                                   <th>Tipo</th>
                                                   <th>Valor</th>
                                                   <th>Data</th>
                                                   <th>Status</th>
                                               </tr>
                                           </thead>
                                           <tbody></tbody>
                                       </table>
                                   </fieldset>                              
                                </dl>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="actions">
                                    <ul>
                                        <li>
                                            <a href="#" class="btn btn-success"><i class="fa fa-money"></i> Pagar </a> 
                                        </li>
                                        <li>
                                            <a href="#" class="btn btn-danger"><i class="fa fa-times"></i> Cancelar </a> 
                                        </li>
                                        <li>
                                            <a href="{{ route('matriculas.index') }}" class="btn btn-warning"><i class="fa fa-list-alt"></i> Listar </a> 
                                        </li>
                                        <li>
                                            <a href="{{ route('matriculas.create') }}" class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i> Adicionar</a>
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
