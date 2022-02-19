@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb mt-30">
            <div class="pull-left">
                <h2>Categories </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="categories/create" title="Create a category"> <i class="fas fa-plus-circle"></i>
                   Add new Category </a>
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
            <th>Parent Category</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
        @foreach ($category as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->parent }}</td>
                <td>{{ $category->status }}</td>
                <td>
                    <form action="/categories/{{$category->id}}" method="POST">

                        <a href="/categories/{{$category->id}}/edit">
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