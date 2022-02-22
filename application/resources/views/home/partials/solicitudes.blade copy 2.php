<div class="container">
  <ul class="nav nav-tabs">
    <li class="nav-item">
      <?php if ($tipoSolicitud == 'fondeos'): ?>
        <a id="aceptar-fondeos" class="nav-link active" href="#">Fondeos</a>
      <?php else: ?>
        <a id="aceptar-fondeos" class="nav-link" href="#">Fondeos</a>
      <?php endif; ?>
    </li>
    <li class="nav-item">
      <?php if ($tipoSolicitud == 'retiros'): ?>
        <a id="aceptar-retiros" class="nav-link active" href="#">Retiros</a>
      <?php else: ?>
        <a id="aceptar-retiros" class="nav-link" href="#">Retiros</a>
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
                                <th>{{__('Descripción')}}</th>
                                <th>{{__('Monto')}}</th>
                                <th>{{__('Tarifa')}}</th>
                                <th>{{__('Neto')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                          @forelse($fondeos as $transaction)
                            <tr>
                              <td>
                                <form action="{{route('aceptarFondeo', app()->getLocale())}}" method="post">                               
                                  {{csrf_field()}}
                                  <input type="hidden" name="tid" value="{{$transaction->id}}">
                                  <input type="submit"  class="btn btn-success btn-simple btn-round btn-xs pull-left" value="Aceptar">
                                </form>
                                <div class="clearfix"></div>
                              </td>
                              <td>{{$transaction->created_at->format('d M Y')}}</td>
                              <td>{{$transaction->User->name}}</td>
                              <td>
                              @include('home.partials.name')</td>
                              <td>{{$transaction->gross()}}</td>
                              <td>{{$transaction->fee()}}</td>
                              <td>{{$transaction->net()}}</td>
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
              {{$transactions->links()}}
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
                                <th>{{__('Descripción')}}</th>
                                <th>{{__('Monto')}}</th>
                                <th>{{__('Tarifa')}}</th>
                                <th>{{__('Neto')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                          @forelse($retiros as $transaction)
                            <tr>
                              <td>
                                <form action="{{route('aceptarRetiro', app()->getLocale())}}" method="post">                               
                                  {{csrf_field()}}
                                  <input type="hidden" name="tid" value="{{$transaction->id}}">
                                  <input type="submit"  class="btn btn-success btn-simple btn-round btn-xs pull-left" value="Aceptar">
                                </form>
                                <div class="clearfix"></div>
                              </td>
                              <td>{{$transaction->created_at->format('d M Y')}}</td>
                              <td>{{$transaction->User->name}}</td>
                              <td>
                              @include('home.partials.name')</td>
                              <td>{{$transaction->gross()}}</td>
                              <td>{{$transaction->fee()}}</td>
                              <td>{{$transaction->net()}}</td>
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
              {{$transactions->links()}}
          </div>
        @else
        @endif
    </div>
  @endif
</div>