@if($retiro->Status->id == 1)
<span class="badge badge-success">{{$retiro->Status->name}}</span>
@elseif($retiro->Status->id == 2)
<button class="btn btn-sm btn-outline-danger">{{$retiro->Status->name}}</button>
@elseif($retiro->Status->id == 3)
<span class="badge badge-info">{{$retiro->Status->name}}</span>
@elseif($retiro->Status->id == 4)
<button class="btn btn-sm btn-outline-primary">{{$retiro->Status->name}}</button>
@elseif($retiro->Status->id == 7)
<button class="btn btn-sm btn-outline-primary">{{$retiro->Status->name}}</button>
@endif