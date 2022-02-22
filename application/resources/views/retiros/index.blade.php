<!-- Radas - Inicio -->
@extends('layouts.app')

@section('content')
{{--  @include('partials.nav')  --}}
  <div class="row">
        @include('partials.sidebar')
		
		<div class="col-md-9 " style="padding-right: 0">
     @include('partials.flash')
  	 @if($retiros->total()>0)
     <div class="card">
        <div class="header">
            <h2><strong>{{__('Retiros')}}</strong></h2>
            
        </div>
        <div class="body">
            <div class="table-responsive">
              <table class="table table-striped"  style="margin-bottom: 0;">
                  <thead>
                    <tr>
                      <th></th>
                      <th>{{__('Fecha')}}</th>
                      <th>{{__('Entidad financiera')}}</th>
                      <th>{{__('Nro. de cuenta')}}</th>
                      <th>{{__('Monto E-USD')}}</th>
                      <th>{{__('Tarifa')}}</th>
                      <th>{{__('Neto a recibir')}}</th>
                      <th>{{__('Identificador único de la transferencia')}}</th>
                      <th>{{__('Comprobante de la transferencia')}}</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse($retiros as $retiro)
                      <tr>
                        <td>
                        @if ($retiro->transaction_state_id == 6)
                          <form action="{{route('post.confirmarTransferenciaRetiro', app()->getLocale())}}" method="post">                               
                            {{csrf_field()}}
                            <input type="hidden" name="rid" value="{{$retiro->id}}">
                            <input type="submit"  class="btn btn-success btn-simple btn-round btn-xs pull-left" value="Confirmar transferencia">
                          </form>
                          <div class="clearfix"></div>
                        @endif
                        </td>
                        <td>{{$retiro->created_at->format('d M Y')}} <br> @include ('retiros.partials.status')</td>
                        <td>{{$retiro->transferMethod->name}}</td>
                        <td>{{$retiro->platform_id}}</td>
                        <td>{{number_format($retiro->gross, 2, ",", ".")}}</td>
                        <td>{{$retiro->currency_symbol}} {{number_format($retiro->fee, 2, ",", ".")}}</td>
                        <td>{{$retiro->currency_symbol}} {{number_format($retiro->net, 2, ",", ".")}}</td>
                        <td>{{$retiro->unique_transaction_id}}</td>
                        <td>
                          <a href="{{$retiro->recibo_transferencia}}" target="blank" alt="" class="rounded" loading="lazy" style="width: 50px">Ver comprobante</a>
                        </td>
                      </tr>
                    @empty
                    @endforelse
                </tbody>
                </table>
            </div>  
        </div>
         @if($retiros->LastPage() != 1)
              <div class="footer">
                  {{$retiros->links()}}
              </div>
            @else
            @endif
    </div>
      @endif

    </div>

  </div>
@endsection
@section('footer')
  @include('partials.footer')
@endsection
<!-- Radas - Fin -->