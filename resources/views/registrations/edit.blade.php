@extends('adminlte::page')

@section('htmlheader_title')
	Matrículas
@endsection

@section('contentheader_title')
    Matrículas
@stop

@section('contentheader_description')
    Cancelar
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
        <li class="active">Cancelar</li>
    </ol>
@stop

@section('main-content')
	<section class='content'>
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    {!! Form::model($registration, ['route'=>['matriculas.update', 'id' => $registration->id],'method'=>'put','id' =>'frm_registration']) !!}
                    <div class="col-md-12">
                      <div class="box box-danger">
                        <div class="box-body">
                         <div class="row">
                            <div class="col-md-12">
                              
                                <dl>
                                    <dt>Meses Faltantes: </dt>
                                    <dd>{{ $missing_months }}&nbsp;</dd>    
                                    <dt>Valor da multa: </dt>
                                    <dd>R$ {{ number_format($fine_amount,2,",",".") }}&nbsp;</dd>
                                </dl>              
                                <p>Valor da multa correspondente a 1% do valor total restante</p>                                                         
                            </div>
                        </div>
                      </div>
                      <div class="box-footer">
                        <a href="{{ route('matriculas.show',['id' => $registration->id])}}" class="btn btn-warning"><i class="fa fa-times"></i> Cancelar</a>
                        &nbsp;&nbsp;
                        {!! Form::button('<i class="fa fa-check"></i> Fazer Cancelamento', ['type' => 'submit','class' => 'btn btn-success', 'onclick'=>"saveConfirm(event, 'frm_registration')"]) !!}
                      </div>  
                    </div>
                </div>     
                {!! Form::close() !!}       
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