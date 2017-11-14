@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 ">
                <div class="panel panel-default">
                    <div class="panel-heading"><h2>Your Cart</h2>
                    </div>

                    @foreach($items as $item)
                        <div class="col-md-3 col-md-offset-1">
                            <img  src="image/{{$item->image}}" height="200" width="200" >
                            <h4>{{$item->name}}</h4>
                            <p>Ctegory: {{$item->Category->name}}</p>
                            <h4 class="text-center" style="background-color: #0d3625;color: white;">{{$item->Dollar}}</h4><br>
                        </div>
                    @endforeach

                    <div class="panel-body">
                </div>
                    <form action="/order" class="text-center">
                        {{--<input type="hidden" value="{{$item->id}}" name="order" >--}}
                        <input type="submit" class="btn-primary" value="Make Order">
                    </form>
                    <br>
                    <form action="/remove" class="text-center">
                        <input type="hidden" value="{{$item->id}}" name="item" >
                        <input type="submit" class="btn-danger" value="clear your cart">
                    </form>

            </div>
        </div>
    </div>

@endsection
        @if(count($items)<4)
        @section("footer")
            row navbar-fixed-bottom
        @endsection
        @else
        @section("footer")
            row navbar
@endsection
@endif