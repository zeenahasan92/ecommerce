@extends('layouts.app')

@section('content')
    <script src="https://unpkg.com/vue@2.4.2"></script>
    <div id="root">
    <div class="container">
        <div class="row">
            <div class="col-md-10 ">

                @if($errors->count() >0)
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </div>
                @endif
                <div class="panel-heading"><label><a href="/getcart">Get your cart</a>
                    </label>
                <form action="/search" method="get">
                    <input type="search" name="search" placeholder="Typing item name">
                    <input type="submit" value="search" class="btn-default">

                    <div class="btn-group pull-right">
                        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Price <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu ">
                            <li><a href="/price/1000">1000$+</a></li>
                            <li><a href="/price/500 ">100$-1000$</a></li>
                            <li><a href="/price/100">-100$</a></li>
                        </ul>
                    </div>

                </form></div>

                <div class="panel panel-default">
                    @foreach($items as $item)
                        <div class="col-md-3 col-md-offset-1">
                            <img src="image/{{$item->image}}" height="200" width="200">
                            <h4>{{$item->name}}</h4>
                            <p>Ctegory: {{$item->Category->name}}</p>
                            <h4 class="text-center" style="background-color: #0d3625;color: white;">{{$item->Dollar}}</h4>
                            <form action="/cart">
                                <input type="hidden" value="{{$item->id}}" name="item">
                                <input type="submit" value="Add to Cart" class="bg-info">
                            </form>
                        </div>

                    @endforeach

                    <div class="panel-body">
                    </div>
                    <div class="text-center">{{ $items->links() }}</div>
                </div>
            </div>
        </div>
    </div></div>
    <script>


      vm = new Vue({
            el: '#root',
            data: {
                prices : [],
            },
             methods:{
                 filter:function (index){
                     this.price =  index;
                     console.log(this.price);
                 }
             }
        });
    </script>

@endsection
@section("footer")
    row navbar-fixed-bottom
@endsection