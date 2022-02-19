@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb mt-30">
            <div class="pull-left">
                <h2>Edit Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="/products" title="Go back"> <i class="fas fa-backward "></i> Back</a>
            </div>
        </div>
    </div>

    <form action="/products/{{$product->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" class="form-control" placeholder="Name" value="{{$product->name}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Description:</strong>
                    <input type="text" class="form-control" style="height:50px" name="description"
                        placeholder="description"  value="{{$product->description}}"/>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <div class="col-xs-3 col-sm-3 col-md-3">
                        <strong>Image:</strong>
                        <img src="{{ url($product->image) }}" title="productImg" style="width: 100px"/>
                    </div>
                    <div class="col-xs-9 col-sm-9 col-md-9 mt-25">    
                        <input type="file" name="image" class="form-control" id="image">
                    </div>    
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Parent Category:</strong>
                        <select id="parentCategory" name="parentCategory" class="form-control">
                            <option value="">--- Select parent category ---</option>
                            @foreach($category as $parent)
                                @if($parent->isparent == 'yes')
                                    <option value="{{$parent->name}}" {{Str::contains($product->categories, $parent->name) ? 'selected' : ''}}>{{$parent->name}}</option>
                                @endif    
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Sub Category:</strong>
                        <select id="subCategory" multiple="multiple" name="subCategory[]" class="form-control">
                            <option value="">--- Select sub category ---</option>
                            @foreach($category as $subcategory)
                                @if($subcategory->isparent == 'no')
                                    <option value="{{$subcategory->name}}"  {{Str::contains($product->categories, $subcategory->name) ? 'selected' : ''}}>{{$subcategory->name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Status:</strong>
                    <select id="subCategory" name="status" class="form-control">
                        <option value="">--- Select status ---</option>
                        <option value="active" {{ $product->status == "active" ? 'selected' : '' }} >Active</option>
                        <option value="inactive" {{ $product->status == "inactive" ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection