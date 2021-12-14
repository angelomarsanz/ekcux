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
                              <li><a href="#" ><strong>2.</strong> Complete los datos del retiro</a></li>
                              <li><a href="#" class="a"><strong>3.</strong> Confirme el retiro</a></li>
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
          <h2><strong>{{__('Retiro en ')}} {{$billetera->transferMethod->name}}</strong></h2>

          <div class="card" >
            <div class="header">
                <h2><strong>{{  __('Datos requeridos') }}</strong></h2>
                
            </div>
            <div class="body">
              <form action="{{route('post.calcularRetiro', app()->getLocale())}}" method="post" enctype="multipart/form-data" >
                    {{csrf_field()}}
                    <input type="hidden" value="{{$billetera->id}}" name="wid">
                    <input type="hidden" value="{{$billetera->transfer_method_id}}" name="tmid">
                    <div class="row mb-5">
                       <div class="col">
                        @if ($mensajeError != '')
                          <div class="form-group has-error">
                              <label for="monto_retiro">{{__('Monto E-USD')}}</label>
                              <input type="number" class="form-control" id="monto_retiro" name="monto_retiro" value="{{ $montoRetiro }}" required placeholder="0.00" pattern="[0-9]+([\.,][0-9]+)?" step="0.01">
                              <span class="help-block">
                                  <strong>{{ $mensajeError }}</strong>
                              </span>
                           </div>
                        @else
                          <div class="form-group {{ $errors->has('monto_retiro') ? ' has-error' : '' }}">
                            <label for="monto_retiro">{{__('Monto E-USD')}}</label>
                            <input type="number" class="form-control" id="monto_retiro" name="monto_retiro" value="{{ old('monto_retiro') }}" required placeholder="0.00" pattern="[0-9]+([\.,][0-9]+)?" step="0.01">
                            @if ($errors->has('monto_retiro'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('monto_retiro') }}</strong>
                                </span>
                            @endif
                          </div>
                        @endif
                      </div>
                    </div>
                                       
                    <div class="row mb-5">
                      <div class="col mt-5 ">
                        <input type="submit" class="btn btn-primary float-right" value="{{__('Continuar')}}">
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