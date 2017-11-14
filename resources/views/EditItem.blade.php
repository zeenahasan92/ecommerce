@extends('layouts.app')

@section('content')
    <div id="root">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">



                        @if($errors->count() >0)
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </div>
                        @endif


                        <div class="panel-heading"><label>Add New Item</label></div>
                        <form method="post" action="/edit/{{$item->id}}" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label>Item Name</label>
                                <input name="name" type="text" class="form-control" placeholder="" value="{{$item->name}}">
                            </div>
                            <div class="form-group">
                                <label>Price</label>
                                <input name="price" type="text" class="form-control"  placeholder="" value="{{$item->price}}">
                            </div>
                            <div class="form-group">
                                <label>Category</label>
                                <input name="category" type="text" class="form-control"  placeholder=" " value="{{$item->Category->name}}">
                            </div>
                            <div class="form-group">
                                <label>Item image</label>
                                <input type="file" name="image">
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>

                        <div class="panel-body">

                        </div>
                    </div>
                </div>
            </div>
        </div></div>

@endsection
@section("footer")
    row navbar-fixed-bottom
@endsection