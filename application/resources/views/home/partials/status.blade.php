@if($transaction->Status->id == 1)
<span class="badge badge-success">{{$transaction->Status->name}}</span>
@elseif($transaction->Status->id == 2)
<span class="badge badge-danger">{{$transaction->Status->name}}</span>
@elseif($transaction->Status->id == 3)
<span class="badge badge-info">{{$transaction->Status->name}}</span>
@elseif($transaction->Status->id == 4)
<span class="badge badge-success">{{$transaction->Status->name}}</span>
@elseif($transaction->Status->id == 5)
<a href="{{ url('/') }}/{{app()->getLocale()}}{{ '/agregarPagoRetiro/' }}{{ $transaction->id }}" class="badge badge-info">{{$transaction->Status->name}}</a>
@elseif($transaction->Status->id == 6)
<span class="badge badge-success">{{$transaction->Status->name}}</span>
@elseif($transaction->Status->id == 7)
<a href="{{ url('/') }}/{{app()->getLocale()}}{{ '/calificar/' }}{{ $transaction->id }}" class="badge badge-info">Calificar</a>
@endif