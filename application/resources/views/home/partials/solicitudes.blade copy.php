<div class="container">
  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a id="aceptar-fondeos" class="nav-link active" href="#">Fondeos</a>
    </li>
    <li class="nav-item">
      <a id="aceptar-retiros" class="nav-link" href="#">Retiros</a>
    </li>
  </ul>
</div>
<div id='fondeos'>
  @if($fondeos->currentPage() <= $fondeos->lastPage() and $fondeos->total() > 0 )
    <h4>Fondeos</h4>
    <div class="panel panel-default">

        <div class="panel-heading" style="border-bottom: 0; ">
          <div class="container">
            <div class="card bg-info">
              <div class="header">
                <h2><i class="zmdi zmdi-alert-circle-o text-white"></i> <strong class="text-white">{{__('')}}</strong></h2>
                  <ul class="header-dropdown">  
                      <li class="remove">
                          <a role="button" class="boxs-close "><i class="zmdi zmdi-close text-white" ></i></a>
                      </li>
                  </ul>
              </div>
              <div class="body block-header">
                  <div class="row">
                      <div class="col">
                          <p class="text-white">   {{__('Aceptar transacciones de fondeo')}} </p>
                      </div>   
                  </div>
              </div>
            </div>
          </div>
        </div>

        <div class="panel-body">
          <div class="card user-account">
            <div class="header">
                <h2><strong>Pending</strong>Transactions</h2>
                
                <ul class="header-dropdown">
                    
                    <li class="remove">
                        <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                    </li>
                </ul>
                
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table m-b-0">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>{{__('Fecha')}}</th>
                                <th>{{__('Tiempo de expiración')}}</th>
                                <th>{{__('Name')}}</th>
                                <th>{{__('Gross')}}</th>
                                <th>{{__('Fee')}}</th>
                                <th>{{__('Net')}}</th>
                                <th>{{__('Action')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                          @forelse($fondeos as $transaction)
                            <tr>
                              <td>{{$transaction->id}}</td>
                              <td>{{$transaction->created_at->format('d M Y')}} <br> @include('home.partials.status')</td>
                              <td>
                                5 Min
                              </td>
                              <td>
                              @include('home.partials.name')</td>
                              <td>{{$transaction->gross()}}</td>
                              <td>{{$transaction->fee()}}</td>
                              <td>{{$transaction->net()}}</td>

                              <td>
                                @if($transaction->transactionable_type == 'App\Models\Deposit')
                                <form action="{{route('aceptarFondeo', app()->getLocale())}}" method="post">
                                @elseif($transaction->transactionable_type == 'App\Models\Withdrawal')
                                <form action="{{route('purchaseConfirm', app()->getLocale())}}" method="post">
                                @endif
                                
                                {{csrf_field()}}
                                <input type="hidden" name="tid" value="{{$transaction->id}}">
                                <input type="submit"  class="btn btn-success btn-simple btn-round btn-xs pull-left" value="Aceptar">
                                </form>
                                <div class="clearfix"></div>
                              </td>
                              <td>

                                <form action="{{url('/')}}/{{app()->getLocale()}}/transaction/remove" method="post">
                                  {{csrf_field()}}
                                  <input type="hidden" name="tid" value="{{$transaction->id}}">
                                  <input type="submit"  class="btn btn-link btn-xs pull-right" value="X">
                                </form>
                              </td>
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
<div id='retiros' class='nover'>
  @if($retiros->currentPage() <= $retiros->lastPage() and $retiros->total() > 0 )
  <h4>Retiros</h4>
    <div class="panel panel-default">

      <div class="panel-heading" style="border-bottom: 0; ">
          <div class="container">
            <div class="card bg-info">
              <div class="header">
                <h2><i class="zmdi zmdi-alert-circle-o text-white"></i> <strong class="text-white">{{__('')}}</strong></h2>
                  <ul class="header-dropdown">  
                      <li class="remove">
                          <a role="button" class="boxs-close "><i class="zmdi zmdi-close text-white" ></i></a>
                      </li>
                  </ul>
              </div>
              <div class="body block-header">
                  <div class="row">
                      <div class="col">
                          <p class="text-white">   {{__('Aceptar transacciones de retiro')}} </p>
                      </div>   
                  </div>
              </div>
            </div>
          </div>
        </div>

        <div class="panel-body">
          <div class="card user-account">
            <div class="header">
                <h2><strong>Pending</strong>Transactions</h2>
                
                <ul class="header-dropdown">
                    
                    <li class="remove">
                        <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                    </li>
                </ul>
                
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table m-b-0">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>{{__('Fecha')}}</th>
                                <th>{{__('Tiempo de expiración')}}</th>
                                <th>{{__('Name')}}</th>
                                <th>{{__('Gross')}}</th>
                                <th>{{__('Fee')}}</th>
                                <th>{{__('Net')}}</th>
                                <th>{{__('Action')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                          @forelse($retiros as $transaction)
                            <tr>
                              <td>{{$transaction->id}}</td>
                              <td>{{$transaction->created_at->format('d M Y')}} <br> @include('home.partials.status')</td>
                              <td>
                                5 Min
                              </td>
                              <td>
                              @include('home.partials.name')</td>
                              <td>{{$transaction->gross()}}</td>
                              <td>{{$transaction->fee()}}</td>
                              <td>{{$transaction->net()}}</td>

                              <td>
                                @if($transaction->transactionable_type == 'App\Models\Send')
                                <form action="{{route('sendMoneyConfirm', app()->getLocale())}}" method="post">
                                @elseif($transaction->transactionable_type == 'App\Models\Purchase')
                                <form action="{{route('purchaseConfirm', app()->getLocale())}}" method="post">
                                @endif
                                
                                {{csrf_field()}}
                                <input type="hidden" name="tid" value="{{$transaction->id}}">
                                <input type="submit"  class="btn btn-success btn-simple btn-round btn-xs pull-left" value="confirm">
                                </form>
                                <div class="clearfix"></div>
                              </td>
                              <td>

                                <form action="{{url('/')}}/{{app()->getLocale()}}/transaction/remove" method="post">
                                  {{csrf_field()}}
                                  <input type="hidden" name="tid" value="{{$transaction->id}}">
                                  <input type="submit"  class="btn btn-link btn-xs pull-right" value="X">
                                </form>
                              </td>
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
@section('javascript')
<script>
$(document).ready(function(){
  console.log('Fondeos');
  $(".btn1").click(function(){
    $("#fondeos").hide();
  });
  $(".btn2").click(function(){
    $("#retiros").show();
  });
});
</script>
@stop