@extends('backend.layouts.app')
@section('pageTitle', 'Create Category')
@section('content')

@include('partials.messages')

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">

                <form method="post" action="{{route('category.store')}}">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" value="{{ old('name') }}" class="form-control"
                                    placeholder="Category Name" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary ">Submit</button>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>


    </div>
</div>
@endsection
