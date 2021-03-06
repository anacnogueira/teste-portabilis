@extends('adminlte::page')

@section('htmlheader_title')
	Matrículas
@endsection

@section('contentheader_title')
    Matrículas
@stop

@section('contentheader_description')
    Adicionar
@stop

@section('htmlheader_css')
   <link href="{{ asset('/css/sweetalert.css') }}" rel="stylesheet" type="text/css" />
@stop

@section('scripts_js')
    <script src="{{ asset('/js/sweetalert.min.js') }}"></script>
@stop

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('matriculas.index') }}"><i class="fa fa-users"></i>Matrículas</a></li>
        <li class="active">Adicionar</li>
    </ol>
@stop

@section('main-content')
	<section class='content'>
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    {!! Form::open(['route' => 'matriculas.store','id' =>'frm_registration']) !!}
                    @include('registrations.form')                        
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="actions">
                            <ul>
                                <li><a href="{{ route('matriculas.index') }}" class="btn btn-warning"><i class="fa fa-list-alt"></i> Listar</a></li>                           
                            </ul>
                        </div>
                    </div>
                </div>                
            </div>
        </div>      
    </section>
@endsection