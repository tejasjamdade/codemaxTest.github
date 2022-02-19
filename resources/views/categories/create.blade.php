@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb mt-30">
            <div class="pull-left">
                <h2>Add New Category</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="/categories" title="Go back"> <i class="fas fa-backward "></i> Back</a>
            </div>
        </div>
    </div>

    <form action="/categories" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" class="form-control" placeholder="Name" required/>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Is parent category:</strong>
                        <select name="isparent" id="isparent" class="form-control" required>
                            <option value="">--- Select is parent category ---</option>
                            <option value="yes" >Yes</option>
                            <option value="no" >No</option>
                        </select>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group" id="parentCategory" >
                        <strong>Parent Category:</strong>
                        <select name="parentCategory" class="form-control">
                            <option value="">--- Select parent category ---</option>
                            @foreach($category as $parent)
                                <option value="{{$parent->name}}" >{{$parent->name}}</option>
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
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script>
    $('document').ready(function () {
    $('#parentCategory').hide();
    $('select[name="parentCategory"]').attr("required",false);
        $("#isparent").change(function () {
            var data = $(this).val();
            if (data == "yes") {
                $('#parentCategory').hide();
                $('select[name="parentCategory"]').attr("required",false);
            } else {
                $('#parentCategory').show();
                $('select[name="parentCategory"]').attr("required",true);
            }
        });
    });
</script>