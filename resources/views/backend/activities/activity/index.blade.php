@extends('backend.layouts.app')
@section('pageTitle', 'Activity')
@section('addButton')
  <a href="{{route('activity.create')}}" class="btn btn-default">Add New</a>
@endsection

@section('content')
<div class="table-container">
  @if(count($activities) > 0)
  <table class="table dash-table">
    <thead>
      <tr>
        <th colspan="2">Activity</th>
        <th class="actions"></th>
      </tr>
    </thead>
    <tbody>
      @foreach($activities as $activity)
      <tr>
        <td width="90">
          <img src="{{URL::to('storage/images/'.$activity->image)}}" alt="{{$activity->name}}" width="50">
          </td>
        <td>{{$activity->name}}</td>
        <td>
          <ul class="action">
            <li>
              <a href="{{route('activity.edit', $activity->id)}}">
                <i class="tc-edit"></i>
              </a>
            </li>
            <li>
              <a data-url="{{route('activity.destroy', $activity->id)}}" data-name="{{$activity->name}}" href="#" class="delete-this" data-toggle="modal" data-target="#exampleModal">
                <i class="tc-delete"></i>
              </a>
            </li>
          </ul>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  @else
    <div class="content__nodata">
      <p>There are no data available. <a href="{{route('activity.create')}}">Create One</a> Now!</p>
    </div>
  @endif
</div>
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
  <!-- {{$activities->where('status', 'published')->pluck('name')}} -->
@endsection
