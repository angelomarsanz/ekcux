<!-- Redas - Inicio -->
@extends('layouts.app')

@section('styles')
    @include('wallet.styles')
@endsection


@section('content')
	<div class="row clearfix">
		
		<div class="col-md-12 " >
        	@include('partials.flash')
    	</div>

    </div>
	<div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2><strong>{{__('Retiro')}}</strong></h2>
                    </div>
                    <div class="body block-header">
                        <div class="row">
                            <div class="col">
                               <ul id="glbreadcrumbs-two">
                               <ul id="glbreadcrumbs-two">
                                    <li><a href="#" ><strong>1.</strong> Seleccione el método de pago</a></li>     
                                    <li><a href="#" class="a"><strong>2.</strong> {{__('Complete los datos del retiro')}}.</a></li>
                                    <li><a href="#" class="a"><strong>3.</strong> {{__('Confirme el retiro')}}.</a></li>
                                </ul>
                            </div>            
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <div class="row clearfix">
	@foreach($billeterasUsuario as $billetera)
    <div class="col-lg-3 col-md-4 col-sm-12">
            <a href="{{url('/')}}/{{app()->getLocale()}}/agregarRetiro/{{$billetera->id}}">
                <div class="card product_item">
                    <div class="body text-center">
                        <div class="cp_img">
                            <img src="{{$billetera->TransferMethod->thumbnail}}" alt="Product" class="img-fluid">
                        </div> 
                        <h6 style="margin-top: 10px">{{$billetera->TransferMethod->name}}</h6>                    
                    </div>
                </div>
            </a>                
        </div>
		
    @endforeach
    </div>
@endsection

@section('footer')
	@include('partials.footer')
@endsection
<!-- Redas - Fin -->