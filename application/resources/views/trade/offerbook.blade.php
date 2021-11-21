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
        <div class="col-lg-3">
            <div class="card">
                <div class="header">
                    <h2><strong>{{__('Trade your wallets currencies')}}</strong></h2>
                </div>
                <form method="POST" action="{{ route('openposition', app()->getLocale()) }}">
                    {{csrf_field()}}
                    <div class="body block-header">
                        <div class="row">
                            <div class="col">
                                <div class="form-group ">
                                    <label class="text-primary" for="amount">Currency</label>
                                    <select class="form-control" id="currency" name="currency_id">
                                    @foreach($currencies as $currency)
                                        <option value="{{$currency->id}}" data-value="{{$currency->id}}"><span class="text-success">{{$currency->code}} --</span> {{$currency->name}}</option>
                                    @endforeach


                                    </select>
                                    @if($errors->has('currency_id'))
                                        <span class="invalid-feedback">
                                            <strong class="text-danger">{{ $errors->first('currency_id') }}</strong>
                                        </span>
                                    @endif
                              </div>
                            </div>
                        </div>

                        <div class="row clearfix">
                            <div class="col">
                                <label class="text-primary">{{__('Position')}}</label>
                                <div class="row clearfix">
                                    <div class="col offset-1">
                                        <div>
                                          <input type="radio" id="sell" name="buy_sell" value="0"
                                                 checked>
                                          <label  for="sell">{{__('Sell')}}</label>
                                        </div>

                                        <div>
                                          <input type="radio" id="buy" name="buy_sell" value="1">
                                          <label  for="buy">{{__('Buy')}}</label>
                                        </div>
                                    </div>

                                     @if($errors->has('buy_sell'))
                                        <span class="invalid-feedback">
                                            <strong class="text-danger">{{ $errors->first('buy_sell') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>  
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group ">
                                    <label class="text-primary" for="quantity">Quantity</label>
                                    <input type="number" class="form-control" id="quantity" name="quantity" value="" required="" placeholder="5.00" pattern="[0-9]+([\.,][0-9]+)?" step="0.01">
                                     @if($errors->has('quantity'))
                                        <span class="invalid-feedback">
                                            <strong class="text-danger">{{ $errors->first('quantity') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group ">
                                    <label class="text-primary" for="price">Rate in <span class="">{{$maincurrency->code}}</span></label>
                                    <input type="number" class="form-control" id="price" name="price" value="" required="" placeholder="5.00" pattern="[0-9]+([\.,][0-9]+)?" step="0.00000001">
                                     @if($errors->has('price'))
                                        <span class="invalid-feedback">
                                            <strong class="text-danger">{{ $errors->first('price') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                             <div class="col">
                            	<input type="submit" class="btn btn-primary bg-blue btn-block btn-round" value="{{__('Open Position')}}">
                            </div>	          
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-lg-9">
             <div class="card">
                <div class="header">
                    <h2>{{__('Running positions')}}</h2>
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
                                    <td colspan="7">{{__('No positions available in the market.')}}</td>
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






