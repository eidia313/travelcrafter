@extends('backend.layouts.app')
@section('pageTitle', 'Equipments')
@section('addButton')
  <a href="{{route('equipments.create')}}" class="btn btn-default">Add New</a>
@endsection

@section('content')
  <div class="table-container">
    @if(count($equipments) > 0)
      <table class="table dash-table">
        <thead>
        <tr>
          <th>Equipment Name</th>
          <th>Category</th>
          <th class="actions"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($equipments as $equipment)
          <tr>
            <td>{{$equipment->name}}</td>
            <td>{{$equipment->category_id ? $equipment->category->name : 'undefined'}}</td>
            <td>
              <ul class="action">
                <li>
                  <a href="{{route('equipments.edit', $equipment->id)}}">
                    <i class="tc-edit"></i>
                  </a>
                </li>
                <li>
                  <form action="{{route('equipments.destroy',$equipment->id)}}"
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
        {{$equipments->links()}}
      </div>
    @else
      <div class="content__nodata">
        <p>There are no data available. <a href="{{route('equipments.create')}}">Create One</a> Now!</p>
      </div>
    @endif
  </div>

@endsection
