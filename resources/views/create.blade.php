@extends('layout')
@section('content')

<style>
    .container {
        max-width: 450px;
    }
    .push-top {
        margin-top: 5em;
    }
</style>

<div class="card push-top">
        <h5 class="card-header"> Add Products </h5>
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
                <form action="{{route('products.store')}}" method="post">
                    <div class="form-group">
                        @csrf

                        <div class="form-group">
                            <label> Product Name:  </label>
                            <input class="form-control" type="text" name="product_name">
                        </div><br>

                        <div class="form-group">
                            <label> Product Description:  </label>
                            <input class="form-control" type="text" name="product_description">
                        </div><br>

                        <div class="form-group">
                            <label> Quantity:  </label>
                            <input class="form-control" type="text" name="quantity">
                        </div><br>

                        <div class="form-group">
                            <label> Price:  </label>
                            <input class="form-control" type="text" name="price">
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