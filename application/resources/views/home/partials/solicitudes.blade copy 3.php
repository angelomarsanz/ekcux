<div class="container">
  <ul class="nav nav-tabs">
    <li class="nav-item">
      <?php if ($tipoSolicitud == 'fondeos'): ?>
        <a id="lista-fondeos" class="nav-link active" href="#">Fondeos</a>
      <?php else: ?>
        <a id="lista-fondeos" class="nav-link" href="#">Fondeos</a>
      <?php endif; ?>
    </li>
    <li class="nav-item">
      <?php if ($tipoSolicitud == 'retiros'): ?>
        <a id="lista-retiros" class="nav-link active" href="#">Retiros</a>
      <?php else: ?>
        <a id="lista-retiros" class="nav-link" href="#">Retiros</a>
      <?php endif; ?>
    </li>
    <li class="nav-item">
      <?php if ($tipoSolicitud == 'fondeos-aceptados'): ?>
        <a id="lista-fondeos-aceptados" class="nav-link active" href="#">Fondeos aceptados</a>
      <?php else: ?>
        <a id="lista-fondeos-aceptados" class="nav-link" href="#">Fondeos aceptados</a>
      <?php endif; ?>
    </li>
    <li class="nav-item">
      <?php if ($tipoSolicitud == 'retiros-aceptados'): ?>
        <a id="lista-retiros-aceptados" class="nav-link active" href="#">Retiros aceptados</a>
      <?php else: ?>
        <a id="lista-retiros-aceptados" class="nav-link" href="#">Retiros aceptados</a>
      <?php endif; ?>
    </li>
  </ul>
</div>
<?php if ($tipoSolicitud == 'fondeos'): ?>
  <div id='fondeos'>
<?php else: ?>
  <div id='fondeos' class='nover'>
<?php endif; ?>
  @if($fondeos->currentPage() <= $fondeos->lastPage() and $fondeos->total() > 0 )
    <div class="panel panel-default">

        <div class="panel-body">
          <div class="card user-account">
            <div class="header">
                
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table m-b-0">
                        <thead>
                          <tr>
                              <th></th>
                              <th>{{__('Fecha')}}</th>
                              <th>{{__('Solicitante')}}</th>
                              <th>{{__('Entidad financiera')}}</th>
                              <th>{{__('Monto a debitar E-USD')}}</th>
                              <th>{{__('Tarifa E-USD')}}</th>
                              <th>{{__('Neto a recibir')}}</th>
                          </tr>
                        </thead>
                        <tbody>
                          @forelse($fondeos as $transaction)
                            <tr>
                              <td>
                                <form action="{{route('post.aceptarFondeo', app()->getLocale())}}" method="post">                               
                                  {{csrf_field()}}
                                  <input type="hidden" name="tid" value="{{$transaction->id}}">
                                  <input type="submit"  class="btn btn-success btn-simple btn-round btn-xs pull-left" value="Aceptar">
                                </form>
                                <div class="clearfix"></div>
                              </td>
                              <td>{{$transaction->created_at->format('d M Y')}} <br> @include('home.partials.status')</td>
                              <td>{{$transaction->User->name}}</td>
                              <td>@include('home.partials.name')</td>
                              <td>{{number_format(round($transaction->net + $transaction->fee, 2), 2, ",", ".")}}</td>
                              <td>{{number_format($transaction->fee, 2, ",", ".")}}</td>
                              <td>{{$transaction->currency_symbol}} {{number_format($transaction->gross, 2, ",", ".")}}</td>
                            </tr>
                          @empty
                          @endforelse 
                        </tbody>
                    </table>
                </div>
            </div>
          </div>
        </div>
        @if($fondeos->LastPage() != 1)
          <div class="panel-footer">
              {{$fondeos->links()}}
          </div>
        @else
        @endif
    </div>
  @endif
</div>
<?php if ($tipoSolicitud == 'retiros'): ?>
  <div id='retiros'>
<?php else: ?>
  <div id='retiros' class='nover'>
<?php endif; ?>
  @if($retiros->currentPage() <= $retiros->lastPage() and $retiros->total() > 0 )
    <div class="panel panel-default">

        <div class="panel-body">
          <div class="card user-account">
            <div class="header">
                
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table m-b-0">
                        <thead>
                            <tr>
                              <th></th>
                              <th>{{__('Fecha')}}</th>
                              <th>{{__('Solicitante')}}</th>
                              <th>{{__('Entidad financiera')}}</th>
                              <th>{{__('Monto a transferir')}}</th>
                              <th>{{__('Tarifa')}}</th>
                              <th>{{__('Neto a recibir E-USD')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                          @forelse($retiros as $transaction)
                            <tr>
                              <td>
                                <form action="{{route('post.aceptarRetiro', app()->getLocale())}}" method="post">                               
                                  {{csrf_field()}}
                                  <input type="hidden" name="tid" value="{{$transaction->id}}">
                                  <input type="submit"  class="btn btn-success btn-simple btn-round btn-xs pull-left" value="Aceptar">
                                </form>
                                <div class="clearfix"></div>
                              </td>
                              <td>{{$transaction->created_at->format('d M Y')}} <br> @include('home.partials.status')</td>
                              <td>{{$transaction->User->name}}</td>
                              <td>
                              @include('home.partials.name')</td>
                              <td>{{$transaction->currency_symbol}} {{number_format(round($transaction->fee + $transaction->net), 2, ",", ".")}}</td>
                              <td>{{number_format($transaction->fee, 2, ",", ".")}}</td>
                              <td>{{number_format($transaction->gross, 2, ",", ".")}}</td>
                            </tr>
                          @empty
                          @endforelse 
                        </tbody>
                    </table>
                </div>
            </div>
          </div>
        </div>
        @if($retiros->LastPage() != 1)
          <div class="panel-footer">
              {{$retiros->links()}}
          </div>
        @else
        @endif
    </div>
  @endif
</div>
<?php if ($tipoSolicitud == 'fondeos-aceptados'): ?>
  <div id='fondeos-aceptados'>
<?php else: ?>
  <div id='fondeos-aceptados' class='nover'>
<?php endif; ?>
  @if($fondeos_aceptados->currentPage() <= $fondeos_aceptados->lastPage() and $fondeos_aceptados->total() > 0 )
    <div class="panel panel-default">
        <div class="panel-body">
          <div class="card user-account">
            <div class="header">
                
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table m-b-0">
                        <thead>
                            <tr>
                              <th></th>
                              <th>{{__('Fecha')}}</th>
                              <th>{{__('Solicitante')}}</th>
                              <th>{{__('Entidad financiera')}}</th>
                              <th>{{__('Monto a debitar E-USD')}}</th>
                              <th>{{__('Tarifa E-USD')}}</th>
                              <th>{{__('Neto a recibir')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                          @forelse($fondeos_aceptados as $transaction)
                            <tr>
                              <td>
                                @if ($transaction->transaction_state_id == 5)
                                  <form action="{{route('post.confirmarSolicitud', app()->getLocale())}}" method="post">                               
                                    {{csrf_field()}}
                                    <input type="hidden" name="tid" value="{{$transaction->id}}">
                                    <input type="submit"  class="btn btn-success btn-simple btn-round btn-xs pull-left" value="Confirmar">
                                  </form>
                                  <div class="clearfix"></div>
                                @endif
                              </td>
                              <td>{{$transaction->created_at->format('d M Y')}} <br> @include('home.partials.status')</td>
                              <td>{{$transaction->User->name}}</td>
                              <td>@include('home.partials.name')</td>
                              <td>{{number_format(round($transaction->net + $transaction->fee, 2), 2, ",", ".")}}</td>
                              <td>{{number_format($transaction->fee, 2, ",", ".")}}</td>
                              <td>{{$transaction->currency_symbol}} {{number_format($transaction->gross, 2, ",", ".")}}</td>
                            </tr>
                          @empty
                          @endforelse 
                        </tbody>
                    </table>
                </div>
            </div>
          </div>
        </div>
        @if($fondeos_aceptados->LastPage() != 1)
          <div class="panel-footer">
              {{$fondeos_aceptados->links()}}
          </div>
        @else
        @endif
    </div>
  @endif
</div>
<?php if ($tipoSolicitud == 'retiros-aceptados'): ?>
  <div id='retiros-aceptados'>
<?php else: ?>
  <div id='retiros-aceptados' class='nover'>
<?php endif; ?>
  @if($retiros_aceptados->currentPage() <= $retiros_aceptados->lastPage() and $retiros_aceptados->total() > 0 )
    <div class="panel panel-default">
        <div class="panel-body">
          <div class="card user-account">
            <div class="header">
                
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table m-b-0">
                        <thead>
                            <tr>
                              <th></th>
                              <th>{{__('Fecha')}}</th>
                              <th>{{__('Solicitante')}}</th>
                              <th>{{__('Entidad financiera')}}</th>
                              <th>{{__('Monto a transferir')}}</th>
                              <th>{{__('Tarifa')}}</th>
                              <th>{{__('Neto a recibir E-USD')}}</th>
                              <th>{{__('Datos para la transferencia')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                          @forelse($retiros_aceptados as $transaction)
                            <tr>
                              <td>
                              </td>
                              <td>{{$transaction->created_at->format('d M Y')}} <br> @include('home.partials.status')</td>
                              <td>{{$transaction->User->name}}</td>
                              <td>
                              @include('home.partials.name')</td>
                              <td>{{$transaction->currency_symbol}} {{number_format(round($transaction->fee + $transaction->net), 2, ",", ".")}}</td>
                              <td>{{number_format($transaction->fee, 2, ",", ".")}}</td>
                              <td>{{number_format($transaction->gross, 2, ",", ".")}}</td>
                              <td>{{$transaction->datos_para_transaccion}}</td>
                            </tr>
                          @empty
                          @endforelse 
                        </tbody>
                    </table>
                </div>
            </div>
          </div>
        </div>
        @if($retiros_aceptados->LastPage() != 1)
          <div class="panel-footer">
              {{$retiros_aceptados->links()}}
          </div>
        @else
        @endif
    </div>
  @endif
</div>