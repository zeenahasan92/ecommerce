@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 ">
                <div class="panel panel-default">

                    @foreach($items as $item)
                        <div class="col-md-3 col-md-offset-1">
                            <img  src="image/{{$item->image}}" height="200" width="200" >
                            <h4>{{$item->name}}</h4>
                            <p>Ctegory: {{$item->Category->name}}</p>
                            <h4 class="text-center" style="background-color: #0d3625;color: white;">{{$item->Dollar}}</h4><br>
                            <a  style="text-decoration: none; background-color: darkblue; color: white;padding: 5px 3px;" href="/editItem/{{$item->id}}">edit</a>
                            <a  style="text-decoration: none; background-color: #f44336; color: white;padding: 5px 3px;" href="/deleteItem/{{$item->id}}">delete</a>
                        </div>
                    @endforeach

                    <div class="panel-body">
                    </div><div class="text-center">{{ $items->links() }}</div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section("footer")
    row navbar-fixed-bottom
@endsection