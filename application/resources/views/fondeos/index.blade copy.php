<!-- Radas - Inicio -->
@extends('layouts.app')

@section('content')
{{-- @include('partials.nav') --}}
    <div class="row">
      @include('partials.sidebar') 
		
		  <div class="col-md-9 ">
        
	        @if($deposits->total()>0)
          <div class="card">
            <div class="header">
                <h2><strong>{{__('Fondeo')}}</strong></h2>                
            </div>
            <div class="body">
              <div class="table-responsive">
                <table class="table table-striped" style="margin-bottom: 0;">
                  <thead>
                    <tr>
                      <th></th>
                      <th>{{__('Fecha')}}</th>
                      <th>{{__('Método')}}</th>
                      <th>{{__('Monto')}}</th>
                      <th>{{__('Tarifa')}}</th>
                      <th>{{__('Neto')}}</th>
                      <th>{{__('Datos para el pago')}}</th>                      
                    </tr>
                  </thead>
                  <tbody>
                    @forelse($deposits as $deposit)
                      @php($datosParaTransaccion = '')
                      @foreach ($transacciones as $transaccion)
                        @if ($transaccion->transactionable_id == $deposit->id)
                          @php($datosParaTransaccion = $transaccion->datos_para_transaccion)
                          @break
                        @endif;
                      @endforeach
                      <tr>
                        <td>
                          @if($deposit->Status->id == 4)
                            <a href="{{ url('/') }}/{{app()->getLocale()}}{{ '/agregarPago/' }}{{ $deposit->id }}" class="btn btn-default">{{__('Pago')}}</a>
                          @endif
                        </td>
                        <td>{{$deposit->created_at->format('d M Y')}} <br> @include ('deposits.partials.status')</td>
                        <td>{{$deposit->transferMethod->name}}</td>
                        <td>{{number_format($deposit->gross, 2, ",", ".")}}</td>
                        <td>{{number_format($deposit->fee, 2, ",", ".")}}</td>
                        <td>{{number_format($deposit->net, 2, ",", ".")}}</td>
                        <td>
                            {{$datosParaTransaccion}}
                        </td>
                      </tr>
                    @empty
                    
                    @endforelse
                  </tbody>
                </table>                          
              </div> 
            </div>
            @if($deposits->LastPage() != 1)
              <div class="footer">
                  {{$deposits->links()}}
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
<!-- Radas Fin -->