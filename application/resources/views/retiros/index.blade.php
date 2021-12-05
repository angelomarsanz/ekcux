<!-- Radas - Inicio -->
@extends('layouts.app')

@section('content')
{{--  @include('partials.nav')  --}}
  <div class="row">
        @include('partials.sidebar')
		
		<div class="col-md-9 " style="padding-right: 0">
     @include('partials.flash')
  	 @if($retiros->total()>0)
     <div class="card">
        <div class="header">
            <h2><strong>{{__('Retiros')}}</strong></h2>
            
        </div>
        <div class="body">
            <div class="table-responsive">
              <table class="table table-striped"  style="margin-bottom: 0;">
                  <thead>
                    <tr>
                      <th>{{__('Date')}}</th>
                      <th>{{__('Method')}}</th>
                      <th>{{__('Platform ID')}} ( {{__('your Id on choosen Method platform')}} )</th>
                      <th>{{__('Gross')}}</th>
                      <th>{{__('Fee')}}</th>
                      <th>{{__('Net')}}</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse($retiros as $retiro)
                      <tr>
                        <td>{{$retiro->created_at->format('d M Y')}} <br> @include ('retiros.partials.status')</td>
                        <td>{{$retiro->transferMethod->name}}</td>
                        <td>{{$retiro->platform_id}}</td>
                        <td>{{$retiro->gross()}}</td>
                        <td>{{$retiro->fee()}}</td>
                        <td>{{$retiro->net()}}</td>
                      </tr>
                    @empty
                    @endforelse
                </tbody>
                </table>
            </div>  
        </div>
         @if($retiros->LastPage() != 1)
              <div class="footer">
                  {{$retiros->links()}}
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
<!-- Radas - Fin -->