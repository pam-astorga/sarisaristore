@extends('layout')
@section('content')
<style>
    .container {
        max-width: 450px;
    }
    .push-top {
        margin-top: 50px;
    }
</style>

<h1>This is from the Edit Blade </h1>
<div class="card push-top">
        <h5 class="card-header"> Edit Products </h5>
            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
                @endif()
                <form action="{{route('products.update', $products->id)}}" method="post">
                    <div class="form-group">
                        @csrf
                        @method('PATCH')

                        <div class="form-group">
                            <label> Product Name:  </label>
                            <input class="form-control" type="text" name="product_name" value="{{$products->product_name}}">
                        </div><br>

                        <div class="form-group">
                            <label> Product Description:  </label>
                            <input class="form-control" type="text" name="product_description" value="{{$products->product_description}}">
                        </div><br>

                        <div class="form-group">
                            <label> Quantity:  </label>
                            <input class="form-control" type="text" name="quantity" value="{{$products->quantity}}">
                        </div><br>

                        <div class="form-group">
                            <label> Price:  </label>
                            <input class="form-control" type="text" name="price" value="{{$products->price}}">
                        </div><br>

                        <div class="form-group">
                            <label>Status: </label>
                            <select name="status">
                                <option>Available</option>
                                <option>Not Available</option>
                            </select>
                        </div><br>

                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" name="submit">
                        </div>

                    </div>
                </form>
            </div>
    </div>

@endsection()