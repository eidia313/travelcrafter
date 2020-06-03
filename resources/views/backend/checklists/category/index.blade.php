@extends('backend.layouts.app')
@section('pageTitle', 'Categories')
@section('addButton')
    <a href="{{route('category.create')}}" class="btn btn-default">Add New</a>
@endsection

@section('content')
    <div class="table-container">
        @if(count($categories) > 0)
            <table class="table dash-table">
                <thead>
                <tr>
                    <th>Category Name</th>
                    <th class="actions"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{$category->name}}</td>
                        <td>
                            <ul class="action">
                                <li>
                                    <a href="{{route('category.edit', $category->id)}}">
                                        <i class="tc-edit"></i>
                                    </a>
                                </li>
                                <li>
                                    <form action="{{route('category.destroy',$category->id)}}"
                                          method="POST">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token"
                                               value="{{ csrf_token() }}">
                                        <button type="submit"
                                                class="btn btn-sm btn-danger glyphicon glyphicon-remove"
                                                onclick="return confirm('Are you sure you want to delete this item?');"></button>
                                    </form>
                                </li>
                            </ul>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <div class="col-12">
                {{$categories->links()}}
            </div>
        @else
            <div class="content__nodata">
                <p>There are no data available. <a href="{{route('category.create')}}">Create One</a> Now!</p>
            </div>
        @endif
    </div>

@endsection
