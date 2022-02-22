@extends('layouts.app')

@section('content')
{{-- @include('partials.nav') --}}
    <div class="row">
        @include('partials.sidebar')
		
		  <div class="col-md-9 ">
        
	        @if($deposits->total()>0)
          <div class="card">
            <div class="header">
                <h2><strong>{{__('Fondeos')}}</strong></h2>
                
            </div>
            <div class="body">
              <div class="table-responsive">
                <table class="table table-striped"  style="margin-bottom: 0;">
                  <thead>
                    <tr>
                      <th></th>
                      <th>{{__('Fecha')}}</th>
                      <th>{{__('Método')}}</th>
                      <th>{{__('Monto a transferir')}}</th>
                      <th>{{__('Tarifa E-USD')}}</th>
                      <th>{{__('Neto a recibir E-USD')}}</th>
                      <th>{{__('Datos para la transferencia')}}</th>
                      <th>{{__('Comprobante de la transferencia')}}</th>                          
                    </tr>
                  </thead>
                  <tbody>
                    @forelse($deposits as $deposit)
                      <?php 
                        $datosParaTransaccion = '';
                        $idTransaccion = 0;
                        $monedaTransferencia = '';
                        foreach ($transacciones as $transaccion):
                          if ($transaccion->transactionable_id == $deposit->id):
                            $idTransaccion = $transaccion->id;
                            $datosParaTransaccion = $transaccion->datos_para_transaccion;
                            $monedaTransferencia = $transaccion->currency_symbol;
                            break;
                          endif;
                        endforeach;
                      ?>
                      <tr>
                        <td>
                          @if($deposit->Status->id == 4)
                            <a href="{{ url('/') }}/{{app()->getLocale()}}{{ '/agregarPagoFondeo/' }}{{ $idTransaccion }}" class="btn btn-default">{{__('Registrar transferencia')}}</a>
                          @endif</td>
                        <td>{{$deposit->created_at->format('d M Y')}} <br> @include ('deposits.partials.status')</td>
                        <td>{{$deposit->transferMethod->name}}</td>
                        <td>{{$monedaTransferencia}} {{number_format($deposit->gross, 2, ",", ".")}}</td>
                        <td>{{number_format($deposit->fee, 2, ",", ".")}}</td>
                        <td>{{number_format($deposit->net, 2, ",", ".")}}</td>
                        <td>{{$datosParaTransaccion}}</td>
                        <td>
                          <a href="{{$deposit->transaction_receipt}}" target="blank"><img src="{{$deposit->transaction_receipt}}" alt="" class="rounded" loading="lazy" style="width: 50px"></a>
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