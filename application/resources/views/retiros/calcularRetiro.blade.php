<!-- Radas -->
@extends('layouts.app')

@section('styles')
    @include('wallet.styles')
@endsection

@section('content')
{{--  @include('partials.nav')  --}}
    <!-- Redas -->
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
                              <li><a href="#" class="a"><strong>1.</strong> Seleccione el método de retiro</a></li>     
                              <li><a href="#" class="a" ><strong>2.</strong> Complete los datos del retiro</a></li>
                              <li><a href="#"><strong>3.</strong> Confirme el retiro</a></li>
                            </ul>
                        </div>            
                      
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Redas -->

    <div class="row">
        @include('partials.sidebar')
        <div class="col-md-9 ">
          <h2><strong>{{__('Confirmar datos de Retiro en ')}} {{$billetera->transferMethod->name}}</strong></h2>

          <div class="card" >
            <div class="header">
                <h2><strong>{{  __('Datos requeridos') }}</strong></h2>
                
            </div>
            <div class="body">
              <form action="{{route('post.confirmarRetiro', app()->getLocale())}}" method="post" enctype="multipart/form-data" >
                    {{csrf_field()}}
                    <input type="hidden" value="{{$billetera->id}}" name="wid">
                    <input type="hidden" value="{{$billetera->transfer_method_id}}" name="tmid">
                    <input type="hidden" value="{{ $vectorRetiro['monto_retiro'] }}" name="monto_retiro">
                    <input type="hidden" value="{{ $vectorRetiro['moneda_metodo'] }}" name="moneda_metodo">
                    <input type="hidden" value="{{ $vectorRetiro['tasa_cambio_Ekcux'] }}" name="tasa_cambio_ekcux">
                    <input type="hidden" value="{{ $vectorRetiro['tasa_cambio_metodo'] }}" name="tasa_cambio_metodo">
                    <input type="hidden" value="{{ $vectorRetiro['tasa_cambio_inicial'] }}" name="tasa_cambio_inicial">
                    <input type="hidden" value="{{ $vectorRetiro['monto-inicial'] }}" name="monto_inicial">
                    <input type="hidden" value="{{ $vectorRetiro['porcentaje_comision_cajero'] }}" name="porcentaje_comision_cajero">
                    <input type="hidden" value="{{ $vectorRetiro['comision_cajero'] }}" name="comision_cajero">
                    <input type="hidden" value="{{ $vectorRetiro['porcentaje_comision_servicio'] }}" name="porcentaje_comision_servicio">
                    <input type="hidden" value="{{ $vectorRetiro['comision_servicio'] }}" name="comision_servicio">
                    <input type="hidden" value="{{ $vectorRetiro['costo_fijo_transaccion'] }}" name="costo_fijo_transaccion">
                    <input type="hidden" value="{{ $vectorRetiro['neto_a_recibir'] }}" name="neto_a_recibir">
                    <input type="hidden" value="{{ $vectorRetiro['tasa_cambio_final'] }}" name="tasa_cambio_final">
                    
                    <div class="row mb-5">
                       <div class="col">
                        <div class="form-group {{ $errors->has('monto_retiro') ? ' has-error' : '' }}">
                          <label for="monto_retiro">{{__('Monto E-USD')}}</label>
                          <input type="number" class="form-control" id="monto_retiro" name="monto_retiro" value="{{ $vectorRetiro['monto_retiro'] }}" required placeholder="0.00" pattern="[0-9]+([\.,][0-9]+)?" step="0.01">
                          @if ($errors->has('monto_retiro'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('monto_retiro') }}</strong>
                              </span>
                          @endif
                        </div>
                      </div>
                    </div>

                    <p>{{'Fondos a recibir: '}} {{ number_format($vectorRetiro['neto_a_recibir'], 2, ",", ".")}} {{ $vectorRetiro['moneda_metodo']}}</p>
                    <p>{{'Tasa de cambio E-USD: 1 E-USD = '}} {{ number_format($vectorRetiro['tasa_cambio_inicial'], 2, ",", ".")}} {{ $vectorRetiro['moneda_metodo']}}</p>
                    <p>{{'Comisión del cajero: '}} {{ number_format($vectorRetiro['comision_cajero'], 2, ",", ".") }} {{ $vectorRetiro['moneda_metodo']}}</p>
                    <p>{{'Comisión por servicio: '}} {{ number_format($vectorRetiro['comision_servicio'], 2, ",", ".")}} {{ $vectorRetiro['moneda_metodo']}}</p>
                    <p>{{'costo fijo transacción:'}} {{ number_format($vectorRetiro['costo_fijo_transaccion'], 2, ",", ".")}} {{ $vectorRetiro['moneda_metodo']}}</p>
                    <p>{{'Tasa cambio final: '}} {{ number_format($vectorRetiro['tasa_cambio_final'], 2, ",", ".")}} {{ $vectorRetiro['moneda_metodo']}}</p>
                                       
                    <div class="row mb-5">
                      <div class="col mt-5 ">
                        <input type="submit" class="btn btn-primary float-right" value="{{__('Confirmar')}}">
                      </div>
                    </div>
                    <div class="clearfix"></div>
                  </form>                          
                
            </div>
        </div>
        </div>
    </div>

@endsection

<!-- Radas - Fin -->