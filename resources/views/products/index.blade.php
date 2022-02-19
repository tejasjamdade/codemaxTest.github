@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb mt-30">
            <div class="pull-left">
                <h2>Products </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="products/create" title="Create a product"> <i class="fas fa-plus-circle"></i>
                   Add new product </a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{$message}}</p>
        </div>
    @endif

    <table class="table table-bordered table-responsive-lg">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>description</th>
            <th>Image</th>
            <th>Category</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
        @foreach ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                <td><img src="{{ url($product->image) }}" title="productImg" style="width: 100px"/></td>
                <td>{{ $product->categories }}</td>
                <td>{{ $product->status }}</td>
                <td>
                    <form action="/products/{{$product->id}}" method="POST">

                        <a href="/products/{{$product->id}}/edit">
                            <i class="fas fa-edit fa-lg"></i>
                        </a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" title="delete" style="border: none; background-color:transparent;">
                            <i class="fas fa-trash fa-lg text-danger"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

@endsection