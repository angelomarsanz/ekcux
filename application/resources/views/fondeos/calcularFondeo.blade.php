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
                    <h2><strong>{{__('Fondeo')}}</strong></h2>
                </div>
                <div class="body block-header">
                    <div class="row">
                        <div class="col">
                            <ul id="glbreadcrumbs-two">
                              <li><a href="#" class="a"><strong>1.</strong> Seleccione el método de pago</a></li>     
                              <li><a href="#" class="a" ><strong>2.</strong> Complete los datos del fondeo</a></li>
                              <li><a href="#"><strong>3.</strong> Confirme el fondeo</a></li>
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
          <h2><strong>{{__('Confirmar datos de Fondeo en ')}} {{$billetera->transferMethod->name}}</strong></h2>

          <div class="card" >
            <div class="header">
                <h2><strong>{{  __('Datos requeridos') }}</strong></h2>
                
            </div>
            <div class="body">
              <form action="{{route('post.confirmarFondeo', app()->getLocale())}}" method="post" enctype="multipart/form-data" >
                    {{csrf_field()}}
                    <input type="hidden" value="{{$billetera->transfer_method_id}}" name="tmid">
                    <input type="hidden" value="{{$billetera->transfer_method_id}}" name="tmid">
                    <input type="hidden" value="{{ $vectorFondeo['monto_fondeo'] }}" name="monto_fondeo">
                    <input type="hidden" value="{{ $vectorFondeo['moneda_metodo'] }}" name="moneda_metodo">
                    <input type="hidden" value="{{ $vectorFondeo['tasa_cambio_Ekcux'] }}" name="tasa_cambio_Ekcux">
                    <input type="hidden" value="{{ $vectorFondeo['tasa_cambio_metodo'] }}" name="tasa_cambio_metodo">
                    <input type="hidden" value="{{ $vectorFondeo['tasa_cambio_e-usd_inicial'] }}" name="tasa_cambio_e-usd_inicial">
                    <input type="hidden" value="{{ $vectorFondeo['monto-e-usd-inicial'] }}" name="monto-e-usd-inicial">
                    <input type="hidden" value="{{ $vectorFondeo['porcentaje_comision_cajero'] }}" name="porcentaje_comision_cajero">
                    <input type="hidden" value="{{ $vectorFondeo['comision_cajero'] }}" name="comision_cajero">
                    <input type="hidden" value="{{ $vectorFondeo['porcentaje_comision_servicio'] }}" name="porcentaje_comision_servicio">
                    <input type="hidden" value="{{ $vectorFondeo['comision_servicio'] }}" name="comision_servicio">
                    <input type="hidden" value="{{ $vectorFondeo['costo_fijo_transaccion'] }}" name="costo_fijo_transaccion">
                    <input type="hidden" value="{{ $vectorFondeo['neto_a_recibir_e_usd'] }}" name="neto_a_recibir_e_usd">
                    <input type="hidden" value="{{ $vectorFondeo['tasa_cambio_e_usd_final'] }}" name="tasa_cambio_e_usd_final">
                    
                    <div class="row mb-5">
                       <div class="col">
                        <div class="form-group {{ $errors->has('monto_fondeo') ? ' has-error' : '' }}">
                          <label for="monto_fondeo">{{__('Monto')}}</label>
                          <input type="number" class="form-control" id="monto_fondeo" name="monto_fondeo" value="{{ $vectorFondeo['monto_fondeo'] }}" required placeholder="0.00" pattern="[0-9]+([\.,][0-9]+)?" step="0.01">
                          @if ($errors->has('monto_fondeo'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('monto_fondeo') }}</strong>
                              </span>
                          @endif
                        </div>
                      </div>
                    </div>

                    <p>{{'Fondos a recibir E-USD: '}} {{ number_format($vectorFondeo['neto_a_recibir_e_usd'], 2, ",", ".")}}</p>
                    <p>{{'Tasa de cambio E-USD: 1 E-USD = '}} {{ number_format($vectorFondeo['tasa_cambio_e-usd_inicial'], 2, ",", ".")}} {{ $vectorFondeo['moneda_metodo']}}</p>
                    <p>{{'Comisión del cajero E-USD: '}} {{ number_format($vectorFondeo['comision_cajero'], 2, ",", ".") }}
                    <p>{{'Comisión por servicio E-USD: '}} {{ number_format($vectorFondeo['comision_servicio'], 2, ",", ".")}}</p>
                    <p>{{'costo fijo transacción E-USD:'}} {{ number_format($vectorFondeo['costo_fijo_transaccion'], 2, ",", ".")}}</p>
                    <p>{{'Tasa cambio final: '}} {{ number_format($vectorFondeo['tasa_cambio_e_usd_final'], 2, ",", ".")}} {{ $vectorFondeo['moneda_metodo']}}</p>
                                       
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