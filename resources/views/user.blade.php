@extends('layout')
@section('content')

<h1>List of available Users</h1>

<div class="table-responsive-sm">
<table class="table table-bordered">
    <tr class="bg-info text-center">
        <th> Product ID </th>
        <th> First Name </th>
        <th> Last Name </th>
        <th> Email address </th>
        <th> Mobile Number </th>
        <th> Address </th>
        <th> Status </th>
        <th colspan="2"> Actions </th>
    </tr>
    @foreach($users as $user)
    <tr>
        <td>{{$user->id}}</td>
        <td>{{$user->first_name}}</td>
        <td>{{$user->last_name}}</td>
        <td>{{$user->email_address}}</td>
        <td>{{$user->mobile_number}}</td>
        <td>{{$user->address}}</td>
        <td>{{$user->status}}</td>
        <td>
            <a href="{{route('users.edit', $user->id)}}" class="btn btn-primary btn-sm" type="submit" name="edit"> Edit </a>
        </td>
        <td>
            <form action="{{route('users.destroy', $user->id)}}" method="post"> 
                @csrf 
                @method('DELETE')
                <button class="btn btn-danger btn-sm" type="submit" name="delete"> Delete </button> 
            
            </form>
        </td>
    </tr>
    @endforeach
</table>
</div>

@endsection()