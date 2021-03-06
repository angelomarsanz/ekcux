 <div class="col-md-3">
    <div class="card info-box-2 l-seagreen">
        <!-- overflowhidden -->
        <div class="header">
            <h2> <strong style="color:#191f28">{{ __('Balance')}}</strong></h2>
            <ul class="header-dropdown">
                    <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <span class="badge badge-success" style="border-color: white;">{{__('Solicitar')}}</span> </a>
                        <ul class="dropdown-menu dropdown-menu-right slideUp float-right">
                            @foreach(\App\Models\Wallet::where('id', '!=', Auth::user()->currentWallet()->id)->where('user_id', Auth::user()->id)->get() as $wallet )
                               <li>
                                
                               
                                </li> 
                            @endforeach
                            <!-- Radas - Inicio -->
                            <li>
                                  <a href="{{url('/')}}/{{app()->getLocale()}}/metodosFondeo">{{__('FONDEAR')}}</a>
                                   <hr style="margin: 0;">
                            </li>
                            
                            <li>
                                  <a href="{{url('/')}}/{{app()->getLocale()}}/metodosRetiro" >{{__('RETIRAR')}}</a>
                                  <hr style="margin: 0;">
                            </li>
                            <!-- Radas - Fin -->
                            {{--
                            @if(count(\App\Models\Currency::where('id', '!=', Auth::user()->currentCurrency()->id)->get()))
                             <li>
                                 <a href="{{url('/')}}/{{app()->getLocale()}}/exchange/first/0/second/0">{{ __('Cambiar Divisa')}}</a>
                            </li>
                            @endif
                            --}}
                        </ul>
                    </li>
           
               
            </ul>
        </div>
        <div class="body" style="padding-top: 0">
            <div class="content">
                <div class="number " style="color: white !important">{{ \App\Helpers\Money::instance()->value(Auth::user()->balance(), Auth::user()->currentCurrency()->symbol) }}</div>  
            </div>
            <div class="clearfix"></div>

            <div class="content">
                <span>{{Auth::user()->currentWallet()->currency->name}}</span>
            </div>
            
            <div class="clearfix"></div>
    
            
       
           
        </div>
        {{-- <div id="sparkline16" class="text-center"><canvas width="403" height="390" style="display: inline-block; width: 403.328px; height: 390px; vertical-align: top;"></canvas></div> --}}
    </div>
    @if(Route::is('home'))

        @if(!empty($myEscrows))
        
            @foreach($myEscrows as $escrow)

                <div class="card">
                    <div class="header">
                        <h2><strong>{{ __('En espera')}}</strong> #{{$escrow->id}}</h2>
                        <ul class="header-dropdown">
                            <li class="remove">
                                <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <h3 class="mb-0 pb-0">
                       -  {{ \App\Helpers\Money::instance()->value( $escrow->gross, $escrow->currency_symbol )}}       
                        </h3>
                        {{ __('Depositar dinero a ')}} <a href="{{url('/')}}/{{app()->getLocale()}}/escrow/{{$escrow->id}}"><span class="text-primary">{{$escrow->toUser->name}}</span></a> <br> 
                        <form action="{{url('/')}}/{{app()->getLocale()}}/escrow/release" method="post">
                            {{csrf_field()}}
                            <input type="hidden" name="eid" value="{{$escrow->id}}">
                            <input type="submit" class="btn btn-sm btn-round btn-primary btn-simple" value="{{_('Liberar')}}">
                            
                        </form>
                    </div>
                </div>

            @endforeach
        
        @endif 
    
        @if(!empty($toEscrows))
        
            @foreach($toEscrows as $escrow)

                <div class="card">
                    <div class="header">
                        <h2><strong>{{ __('En espera')}}</strong> #{{$escrow->id}}</h2>
                        <ul class="header-dropdown">
                            <li class="remove">
                                <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <h3 class="mb-0 pb-0">
                        +  {{ \App\Helpers\Money::instance()->value( $escrow->gross, $escrow->currency_symbol )}}       
                        </h3>
                        {{ __('Dep??sito de ')}} <a href="{{url('/')}}/{{app()->getLocale()}}/escrow/{{$escrow->id}}"><span class="text-primary">{{$escrow->User->name}}</span></a> 
                        <form action="{{url('/')}}/{{app()->getLocale()}}/escrow/refund" method="post">
                            {{csrf_field()}}
                            <input type="hidden" name="eid" value="{{$escrow->id}}">
                            <input type="submit" class="btn btn-sm btn-round btn-danger btn-simple" value="{{_('Reembolsar')}}">
                        </form>
                    </div>
                </div>

            @endforeach
        
        @endif 

    @endif
    <!-- @if(count(Auth::user()->wallets()))
        @foreach(Auth::user()->wallets() as $someWallet)
        <div class="row ">
            <div class="col">
                <a href="{{ url('/') }}/{{app()->getLocale()}}/wallet/{{$someWallet->id}}">
                <div class="card info-box-2" style="cursor: pointer;min-height: auto;">
                    <div class="header" style="padding-bottom: 0">
                        <h2><strong>{{ $someWallet->currency->name }}</strong> {{ __('Saldo disponible')}}</h2>
                        <ul class="header-dropdown">
                            <li class="remove">
                              
                            </li>
                        </ul>
                    </div>
                    <div class="body" style="padding-top: 0;padding-bottom: 0;">
                        <div class="content">
                            <div class="number">{{ \App\Helpers\Money::instance()->value($someWallet->amount, $someWallet->currency->symbol) }}</div>
                              
                        </div>
                    </div>
                </div>
                </a>
            </div>
        </div>
        @endforeach
    @endif -->
 
    @if(Auth::user()->role_id == 1 or Auth::user()->is_ticket_admin )
    <div class="card hidden-sm">
        <div class="header">
            <h2>{{ __('??rea ')}}<strong>{{ __('Administrativa')}}</strong></h2>
            <ul class="header-dropdown">
                <li class="remove">
                    <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                </li>
            </ul>
        </div>
        <div class="body">
                   <h5 class="card-title">{{ __('Hola Sr. Administrador')}} {{Auth::user()->name}}</h5>
                <p class="card-text">{{ __('En esta secci??n los enlaces s??lo son visibles para los administradores')}}.</p>
                 <div class="list-group mb-2">
                    <a href="{{ route('makeVouchers', app()->getLocale()) }}" class="list-group-item list-group-item-action {{ (Route::is('makeVouchers') ? 'active' : '') }}">{{__('Generar Cupones')}}</a>
                    @if (Auth::user()->is_ticket_admin)
                        <a href="{{ url('ticketadmin/tickets') }}" class="list-group-item list-group-item-action {{ (Route::is('support') ? 'active' : '') }}">{{__('Gestionar Tickets')}}</a>
                    @endif
                    @if(Auth::user()->role_id == 1)
                        <a href="{{ url('/') }}/{{app()->getLocale()}}/update_rates" class="list-group-item list-group-item-action ">{{__('Actualizar Tasas de Cambio')}}</a>
                    @endif
                </div>
                <a href="{{url('/')}}/admin/dashboard" class="btn btn-primary btn-round">{{__('Ir al Panel de Control')}}</a>                  
            
        </div>
    </div> 
    @endif
    @if(Auth::user()->role_id == 3)
    <div class="card hidden-sm">
        <div class="header">
            <h2>{{__('??rea del ')}}<strong>{{__('Agente')}}</h2>
            <ul class="header-dropdown">
                <li class="remove">
                    <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                </li>
            </ul>
        </div>
        <div class="body ">
            <h5 class="card-title">{{__('Hola Sr. Agente ')}} {{Auth::user()->name}}</h5>
            <p class="card-text">{{__('En esta secci??n los enlaces s??lo sopn visible para los Agentes')}}</p>
                <div class="list-group mb-2">
                <a href="{{ route('makeVouchers', app()->getLocale()) }}" class="list-group-item list-group-item-action {{ (Route::is('makeVouchers') ? 'active' : '') }}">{{__('Cupones de Recarga')}}</a>
            </div>
        </div>
    </div> 
    @endif
    @if(!Route::is('exchange.form'))
     
    <div class="list-group">
   
    </div>
    @endif
</div>