@extends('adminlte::page')

@section('htmlheader_title')
	Alunos
@endsection

@section('contentheader_title')
    Alunos
@stop

@section('contentheader_breadcrumb')
    <li><a href="{{ route('alunos.index') }}"><i class="fa fa-dashboard"></i> Alunos</a></li>
    <li class="active">Editar</li>
@stop

@section('htmlheader_css')
   <link href="{{ asset('/css/sweetalert.css') }}" rel="stylesheet" type="text/css" />
@stop

@section('scripts_js')
    <script src="{{ asset('/js/sweetalert.min.js') }}"></script>
@stop

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('alunos.index') }}"><i class="fa fa-users"></i>Alunos</a></li>
        <li class="active">Editar</li>
    </ol>
@stop


@section('main-content')
	<section class='content'>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                {!! Form::model($student, ['route'=>['alunos.update', 'id' => $student->id],'method'=>'put', 'id' =>'frm_student']) !!}
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