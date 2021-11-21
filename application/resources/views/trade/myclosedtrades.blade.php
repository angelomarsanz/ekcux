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
                    <h2>{{__('My Closed Trades')}}</h2>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable no-footer">
                            <thead>
                                <tr>
                                    <th>{{__('Currency')}}</th>
                                    <th>{{__('Trade Date')}}</th>
                                    <th>{{__('My Action')}}</th>
                                    <th>{{__('User')}}</th>
                                    <th>{{__('Quantity from trade position')}} </th>
                                    <th>{{__('Rate in')}} {{$maincurrency->code}}</th>
                                    <th>{{__('State')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($closed_trades as $ct)
                                <tr>
                                    <td>{{ $ct->trade->currency->code }}</td>
                                    <td>{{$ct->trade->created_at}}</td>
                                    <td>{{ $ct->status_name}} </td>
                                    <td>{{ $ct->trader->name }}</td>
                                    <td>{{ $ct->quantity }} <span class="float-right">{{$ct->trade->currency->code}}</span></td>
                                    <td>{{ $ct->trade->price }} <span class="float-right">{{$maincurrency->code}}</span></td>
                                    <td>
                                        <span class="badge badge-success">{{__('Completed')}}</span>
                                    </td>
                                    
                                </tr>
                                @empty
                                <tr >
                                    <td colspan="7">{{__('you don\'t have trade positions in the market.')}}</td>
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






