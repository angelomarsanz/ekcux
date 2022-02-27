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
                    <h2><strong>{{__('Calificar compañero')}}</strong></h2>
                </div>
                <div class="body block-header">
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        @include('partials.sidebar')
        <div class="col-md-9 ">
          <div class="card" >
            <div class="header">               
            </div>
            <div class="body">
              <form action="{{route('calificacions.store', app()->getLocale())}}" method="post" enctype="multipart/form-data" >
                    {{csrf_field()}}
                    @if (Auth::user()->id == $transaccion->user_id)
                      <input type="hidden"  name="user_id" value="{{$transaccion->usuario_aceptante_id}}">
                      <input type="hidden"  name="usuario_calificador" value="{{$transaccion->user_id}}">
                    @else
                      <input type="hidden"  name="user_id" value="{{$transaccion->user_id}}">
                      <input type="hidden"  name="usuario_calificador" value="{{$transaccion->usuario_aceptante_id}}">
                    @endif
                    <input type="hidden"  name="transactionable_id" value="{{$transaccion->id}}">
                    <input type="hidden"  name="tipo_transaccion" value="{{$transaccion->activity_title}}">
                    <input type="hidden"  name="transaccion_user_id" value="{{$transaccion->user_id}}">

                    <div class="row mb-5">
                       <div class="col">
                        <div class="form-group {{ $errors->has('calificacion') ? ' has-error' : '' }}">
                          <label for="unique_transaction_id">{{__('Calificacion del: 1 -> deficiente al 5 -> excelente')}}</label>
                          <input type="number" class="form-control" id="calificacion" name="calificacion" value="{{ old('calificacion') }}" required min="1" max="5">
                          @if ($errors->has('calificacion'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('calificacion') }}</strong>
                              </span>
                          @endif
                        </div>
                      </div>
                    </div>

                    <div class="clearfix"></div>
                    <div class="row mb-5">
                      <div class="col">
                        <div class="form-group {{ $errors->has('comentario') ? ' has-error' : '' }}">
                          <label for="message">{{__('Comentarios')}} </label>
                          <textarea name="comentarios" id="comentarios" cols="30" rows="1" class="form-control" placeholder="{{__('Comentarios')}}" style="border: 1px solid #eeee;" maxlength="255"></textarea>
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