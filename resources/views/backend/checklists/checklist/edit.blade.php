@extends('backend.layouts.app')
@section('pageTitle', 'Edit Equipment')
@section('content')

    @include('partials.messages')

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">

                    <form method="post" action="{{route('equipments.update',$equipment->id)}}">
                        @csrf
                        <input type="hidden" name="_method" value="PUT">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" value="{{$equipment->name }}" class="form-control" placeholder="Category Name" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Category</label>
                                    <select name="category_id" class="form-control" required>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}" {{ $equipment->category_id == $category->id ? 'selected' : '' }}>{{$category->name}}</option>
                                        @endforeach
                                    </select>
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
