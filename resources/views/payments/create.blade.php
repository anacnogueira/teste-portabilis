@extends('adminlte::page')

@section('htmlheader_title')
	Matrículas &raquo; Pagamento
@endsection

@section('contentheader_title')
    Matrículas &raquo; Pagamento
@stop

@section('contentheader_description')
    Pagar
@stop

@section('scripts_js')
    <script type="text/javascript">var URL = "{{ url('/') }}"; </script>
    <script src="{{ asset('/js/payment.js') }}"></script>
@stop

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('matriculas.index') }}"><i class="fa fa-users"></i>Matrículas</a></li>
        <li><a href="{{ route('matriculas.show',['id'=> $registration_id ]) }}"><i class="fa fa-users"></i>Dashboard</a></li>
        <li class="active">Pagar</li>
    </ol>
@stop

@section('main-content')
	<section class='content'>
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    {!! Form::open(['route' => 'pagamentos.store']) !!}
                    @include('payments.form')                        
                </div>
                <div class="row">
                              
            </div>
        </div>      
    </section>
@endsection