@extends('layouts.app')

@section('styles')
    @include('wallet.styles')
@endsection


@section('content')
	<div class="row clearfix">
		
		<div class="col-md-12 " >
        	@include('partials.flash')
    	</div>

    </div>
	<div class="row clearfix">
       
        <div class="col-lg-12">
             <div class="card">
                <div class="header">
                    <h2>{{__('My positions')}}</h2>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable no-footer">
                            <thead>
                                <tr>
                                    <th>{{__('Currency')}}</th>
                                    <th>{{__('Listing Date')}}</th>
                                    <th>{{__('User')}}</th>
                                    <th>{{__('Buy / Sell')}}</th>
                                    <th>{{__('Position quantity')}} </th>
                                    <th>{{__('Rate in')}} {{$maincurrency->code}}</th>
                                    <th>{{__('State')}}</th>
                                    <th>{{__('Action')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($trades as $trade)
                                <tr>

                                    <td>{{ $trade->currency->code }}</td>
                                    <td>{{$trade->created_at}}</td>
                                    <td>{{ $trade->user->name }}</td>
                                    <td>
                                        @if($trade->buy_sell == 0)
                                            {{__('is selling')}}
                                        @elseif( $trade->buy_sell == 1 )
                                            {{__('wants to buy')}}
                                        @endif

                                    </td>

                                    <td>{{ $trade->quantity }} <span class="float-right">{{$trade->currency->code}}</span></td>
                                    <td>{{ $trade->price }} <span class="float-right">{{$maincurrency->code}}</span></td>
                                    <td>
                                        @if($trade->state == 0)
                                            <span class="badge badge-primary">{{__('Removed from market')}}</span>
                                        @elseif($trade->state == 1)
                                            <span class="badge badge-success">{{__('Running in the market')}}</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($trade->state == 1 )
                                            @if(Auth::user()->id == $trade->user->id)
                                                <a href="{{url('/')}}/{{app()->getLocale()}}/trades/liquid/{{$trade->id}}" class="btn btn-sm btn-warning ">{{('Remove Listing')}}</a>
                                            @elseif( $trade->buy_sell == 1 )
                                                <a href="{{url('/')}}/{{app()->getLocale()}}/trades/liquid/{{$trade->id}}" class="btn btn-sm btn-danger">{{('Sell')}}</a>
                                            @elseif(  $trade->buy_sell == 0)
                                                 <a href="{{url('/')}}/{{app()->getLocale()}}/trades/liquid/{{$trade->id}}" class="btn btn-sm btn-success">{{('Buy')}}</a>
                                            @endif
                                        @elseif($trade->state == 0 )

                                        @endif
                                    </td>
                                    
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8">{{__('you don\'t have trade positions in the market.')}}</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

@endsection

@section('footer')
	@include('partials.footer')
@endsection






