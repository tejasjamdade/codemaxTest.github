@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb mt-30">
            <div class="pull-left">
                <h2>Add New Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="/products" title="Go back"> <i class="fas fa-backward "></i> Back</a>
            </div>
        </div>
    </div>

    <form action="/products" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" class="form-control" placeholder="Name" required/>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Description:</strong>
                    <input type="text" class="form-control" style="height:50px" name="description"
                        placeholder="description" required/>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Image:</strong>
                    <input type="file" name="image" class="form-control" id="image" required>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Parent Category:</strong>
                        <select id="parentCategory" name="parentCategory" class="form-control" required>
                            <option value="">--- Select parent category ---</option>
                            @foreach($category as $parent)
                                @if($parent->isparent == 'yes')
                                    <option value="{{$parent->name}}" >{{$parent->name}}</option>
                                @endif    
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Sub Category:</strong>
                        <select id="subCategory"  multiple="multiple" name="subCategory[]" class="form-control" required>
                            <option value="">--- Select sub category ---</option>
                            @foreach($category as $subcategory)
                                @if($subcategory->isparent == 'no')
                                    <option value="{{$subcategory->name}}" >{{$subcategory->name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Status:</strong>
                    <select id="status" name="status" class="form-control" required>
                        <option value="">--- Select status ---</option>
                        <option value="active" >Active</option>
                        <option value="inactive" >Inactive</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
@endsection