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

<h1>This is from the Edit User </h1>
<div class="card push-top">
        <h5 class="card-header"> Edit User </h5>
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
                <form action="{{route('users.update', $users->id)}}" method="post">
                    <div class="form-group">
                        @csrf
                        @method('PATCH')

                        <div class="form-group">
                            <label> First Name:  </label>
                            <input class="form-control" type="text" name="first_name" value="{{$users->first_name}}">
                        </div><br>

                        <div class="form-group">
                            <label> Last Name:  </label>
                            <input class="form-control" type="text" name="last_name" value="{{$users->last_name}}">
                        </div><br>

                        <div class="form-group">
                            <label> Email Address:  </label>
                            <input class="form-control" type="text" name="email_address" value="{{$users->email_address}}">
                        </div><br>

                        <div class="form-group">
                            <label> Mobile Number:  </label>
                            <input class="form-control" type="text" name="mobile_number" value="{{$users->mobile_number}}">
                        </div><br>

                        <div class="form-group">
                            <label> Address:  </label>
                            <input class="form-control" type="text" name="address" value="{{$users->address}}">
                        </div><br>

                        <div class="form-group">
                            <label>Status: </label>
                            <select name="status">
                                <option>Active</option>
                                <option>Inactive</option>
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