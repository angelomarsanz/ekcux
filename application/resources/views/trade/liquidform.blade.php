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
        <div class="col-lg-6">
            <div class="card">
                <div class="header">
                    <h2>
                    	@if($utrade->buy_sell == 0 )
                    	<strong>{{__('Buy')}}</strong> {{$utrade->currency->code}}
                    	@elseif($utrade->buy_sell == 1 )
                    	<strong>{{__('Sell')}}</strong> {{$utrade->currency->code}}
                    	@endif
                    </h2>
                </div>
                <form method="POST" action="{{ route('liquid', app()->getLocale()) }}">
                    {{csrf_field()}}
                    <div class="body block-header">
                        <div class="row">
                            <div class="col">
                                <div class="form-group ">
                                    <label class="text-primary" for="amount">{{__('Currency')}}</label>
                                   	<div class="clearfix"></div>
                                   	<strong>{{$utrade->currency->name}}</strong>
                              </div>
                            </div>
                        </div>
                        <input type="hidden" name="trade_id" value="{{$utrade->id}}">
                        <div class="row ">
                            <div class="col">
                            	<div class="form-group">
	                                <label class="text-primary">{{__('Position')}}</label>
	                                <div class="clearfix"></div>
	                                    @if($utrade->buy_sell == 0 )
				                    	<strong>{{__('Buy')}}</strong> 
				                    	@elseif($utrade->buy_sell == 1 )
				                    	<strong>{{__('Sell')}}</strong> 
				                    	@endif

                                </div>
                            </div>  
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group ">
                                    <label class="text-primary" for="amount">{{__('Rate')}}</label>
                                   	<div class="clearfix"></div>
                                   	<strong>{{$utrade->price}} {{$maincurrency->code}}</strong>
                              </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group ">
                                    <label class="text-primary" for="amount">{{__('Available quantity')}}</label>
                                   	<div class="clearfix"></div>
                                   	<strong>{{$utrade->quantity}} {{$utrade->currency->code}}</strong>
                              </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group ">
                                    <label class="text-primary" for="quantity"> {{$utrade->currency->code}} {{__('Quantity to')}} @if($utrade->buy_sell == 0 )
				                    	{{__('Buy')}}
				                    	@elseif($utrade->buy_sell == 1 )
				                    	{{__('Sell')}}
				                    	@endif</label>
                                    <input type="number" class="form-control" id="quantity" name="quantity" value="" required="" placeholder="5.00" pattern="[0-9]+([\.,][0-9]+)?" step="0.01">
                                     @if($errors->has('quantity'))
                                        <span class="invalid-feedback">
                                            <strong class="text-danger">{{ $errors->first('quantity') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            
                        </div>
                        <div class="row">
                             <div class="col">
                             	@if($utrade->buy_sell == 0 )
				                    <input type="submit" class="btn btn-success btn-block btn-round" value="{{__('Buy')}}">
				                    @elseif($utrade->buy_sell == 1 )
				                    <input type="submit" class="btn btn-danger btn-block btn-round" value="{{__('Sell')}}">
				                @endif
                            </div>	          
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-lg-6">
             <div class="card bg-light">
                <div class="header">
                    <h2>{{__('Running positions')}}</h2>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table  no-footer">
                            <thead>
                                <tr>
                                    <th>{{__('User')}}</th>
                                    <th>{{__('Buy / Sell')}}</th>
                                    <th>{{__('Position quantity')}} </th>
                                    <th>{{__('Rate in')}} {{$maincurrency->code}}</th>
                                    <th>{{__('Action')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($trades as $trade)
                                <tr>
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
                                        @if(Auth::user()->id == $trade->user->id)
                                            <a href="{{url('/')}}/{{app()->getLocale()}}/trades/liquid/{{$trade->id}}" class="btn btn-sm btn-warning">{{('Remove Listing')}}</a>
                                        @elseif( $trade->buy_sell == 1 )
                                            <a href="{{url('/')}}/{{app()->getLocale()}}/trades/liquid/{{$trade->id}}" class="btn btn-sm btn-danger">{{('Sell')}}</a>
                                        @elseif(  $trade->buy_sell == 0)
                                             <a href="{{url('/')}}/{{app()->getLocale()}}/trades/liquid/{{$trade->id}}" class="btn btn-sm btn-success">{{('Buy')}}</a>
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5">{{__('No positions available in the market.')}}</td>
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






