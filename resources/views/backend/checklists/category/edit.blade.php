@extends('backend.layouts.app')
@section('pageTitle', 'Edit Category')
@section('content')

@include('partials.messages')

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">

                <form method="post" action="{{route('category.update',$category->id)}}">
                    @csrf

                    <input type="hidden" name="_method" value="PUT">

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" value="{{$category->name}}" class="form-control"
                                    placeholder="Category Name" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary ">Update</button>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>


    </div>
</div>
@endsection
