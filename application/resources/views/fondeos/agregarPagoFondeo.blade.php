<!-- Redas Inicio -->
@extends('layouts.app')

@section('styles')
    @include('wallet.styles')
@endsection

@section('content')
{{--  @include('partials.nav')  --}}
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="header">
                    <h2><strong>{{__('Registrar transferencia')}}</strong></h2>
                </div>
                <div class="body block-header">
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        @include('partials.sidebar')
        <div class="col-md-9 ">
          <p><strong>{{__('Datos para la transferencia: ')}}</strong></p>
          <p>{{$transaccion->datos_para_transaccion}}</p>
          <div class="card" >
            <div class="header">               
            </div>
            <div class="body">
              <form action="{{route('post.guardarPagoFondeo', app()->getLocale())}}" method="post" enctype="multipart/form-data" >
                    {{csrf_field()}}
                    <input type="hidden" value="{{$transaccion->id}}" name="transaccion_id">
                    <input type="hidden" value="{{$fondeo->id}}" name="fondeo_id">
                    <input type="hidden" value="{{$fondeo->contrapartida_id}}" name="retiro_id">

                    <div class="row mb-5">
                       <div class="col">
                        <div class="form-group {{ $errors->has('unique_transaction_id') ? ' has-error' : '' }}">
                          <label for="unique_transaction_id">{{__('Identificador único de la transferencia')}}</label>
                          <input type="text" class="form-control" id="unique_transaction_id" name="unique_transaction_id" value="{{ old('merchant_logo') }}" required>
                          @if ($errors->has('unique_transaction_id'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('unique_transaction_id') }}</strong>
                              </span>
                          @endif
                        </div>
                      </div>
                    </div>

                    <div class="row bm-5">
                      <div class="col">
                        <div class="form-group {{ $errors->has('deposit_screenshot') ? ' has-error' : '' }}">
                          <label for="deposit_screenshot">Comprobante de la transferencia</label>
                          <input type="file" class="form-control" id="deposit_screenshot" name="deposit_screenshot" value="{{ old('merchant_logo') }}" required>
                          @if ($errors->has('deposit_screenshot'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('deposit_screenshot') }}</strong>
                              </span>
                          @endif
                        </div>
                      </div>
                    </div>

                    <div class="clearfix"></div>
                    <div class="row mb-5">
                      <div class="col">
                        <div class="form-group {{ $errors->has('message') ? ' has-error' : '' }}">
                          <label for="message">{{__('Mensaje para el revisor')}} </label>
                          <textarea name="message" id="message" cols="30" rows="10" class="form-control" placeholder="{{__('Mensaje para el revisor')}}" style="border: 1px solid #eeee;"></textarea>
                        </div>
                      </div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="row mb-5">
                      <div class="col mt-5 ">
                        <input type="submit" class="btn btn-primary float-right" value="{{__('Guardar')}}">
                      </div>
                    </div>
                    <div class="clearfix"></div>
                  </form>                          
                
            </div>
        </div>
        </div>
    </div>

@endsection

<!-- Redas - Fin -->