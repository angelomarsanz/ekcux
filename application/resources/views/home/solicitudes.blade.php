@extends('layouts.app')

@section('content')

    <div class="row clearfix">
        @include('partials.sidebar')
		
		<div class="col-md-9 " >
			@include('partials.flash')
        
	        @include('home.partials.solicitudes')

    	</div>

    </div>
@endsection

@section('footer')
	@include('partials.footer')
@endsection
