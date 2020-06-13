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
                            <a data-url="{{route('equipments.destroy',$equipment->id)}}"
                                data-name="{{$equipment->name}}" href="#" class="delete-this" data-toggle="modal"
                                data-target="#exampleModal">
                                <i class="tc-delete"></i>
                            </a>
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
@include('backend.components.modal')
@section('js')
<script type="text/javascript">
    $(document).ready(function() {
      $(document).on('click', '.delete-this', function(e) {
          e.preventDefault();
          $('.data-name').text($(this).data('name'));
          $('#delete-form').attr('action', $(this).data('url'));
          $('#delete-modal').modal({backdrop: 'static', keyboard: false});
      });
  } );
</script>
@endsection
