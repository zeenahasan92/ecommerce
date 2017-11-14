@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 ">
                <div class="panel panel-default">
                    <h4>Your orders</h4>
                </div>
                <div class="col-md-8 col-md-offset-1 btn-info">

                   @php
                       $c=$nOrder[0];
                   @endphp
                    @for($i=0;$i<count($items);$i++)
                        @if($c!=$nOrder[$i])
                            <hr>
                        @endif
                            <ul>
                                <li><h4>{{$items[$i]->name}}</h4></li>
                                <li><p>Ctegory: {{$items[$i]->Category->name}}</p></li>
                                <p class="btn-default"> Created at :  {{$items[$i]->created_at}}</p>
                            </ul>

                    @endfor

                <div class="panel-body">
                </div>

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
