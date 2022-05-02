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
        <h5 class="card-header bg-info"> Add User </h5>
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
                <form action="{{route('users.store')}}" method="post">
                    <div class="form-group">
                        @csrf

                        <div class="form-group">
                            <label> First Name:  </label>
                            <input class="form-control" type="text" name="first_name">
                        </div><br>

                        <div class="form-group">
                            <label> Last Name:  </label>
                            <input class="form-control" type="text" name="last_name">
                        </div><br>

                        <div class="form-group">
                            <label> Email Address:  </label>
                            <input class="form-control" type="text" name="email_address">
                        </div><br>

                        <div class="form-group">
                            <label> Mobile Number:  </label>
                            <input class="form-control" type="text" name="mobile_number">
                        </div><br>

                        <div class="form-group">
                            <label> Address:  </label>
                            <input class="form-control" type="text" name="address">
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