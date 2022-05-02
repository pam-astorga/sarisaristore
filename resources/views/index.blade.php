@extends('layout')
@section('content')

<h1>List of available products in the inventory</h1>

<div class="table-responsive-sm">
<table class="table table-bordered">
    <tr class="bg-info text-center">
        <th> Product ID </th>
        <th> Product Name </th>
        <th> Product Description </th>
        <th> Quantity </th>
        <th> Price</th>
        <th> Status </th>
        <th colspan="2"> Actions </th>
    </tr>
    @foreach($products as $p)
    <tr>
        <td>{{$p->id}}</td>
        <td>{{$p->product_name}}</td>
        <td>{{$p->product_description}}</td>
        <td>{{$p->quantity}}</td>
        <td>{{$p->price}}</td>
        <td>{{$p->status}}</td>
        <td>
            <a href="{{route('products.edit', $p->id)}}" class="btn btn-primary btn-sm" type="submit" name="edit"> Edit </a>
        </td>
        <td>
        <form action="{{route('products.destroy', $p->id)}}" method="post"> 
            @csrf 
            @method('DELETE')
			<button class="btn btn-danger btn-sm" type="submit" name="delete"> Delete </button> 
        </form>
        </td>
        </td>
    </tr>
    @endforeach
</table>
</div>



@endsection()