@extends('backend.layouts.app')
@section('pageTitle', 'Teams')
@section('addButton')
  <a href="{{route('team.create')}}" class="btn btn-default">Add New</a>
@endsection

@section('content')
<div class="table-container">
  @if(count($teams) > 0)
  <table class="table dash-table">
    <thead>
      <tr>
        <th >Name</th>
        <th >Designation</th>
        <th class="actions"></th>
      </tr>
    </thead>
    <tbody>
      @foreach($teams as $team)
      <tr>
        <td>{{$team->name}}</td>
        <td>{{$team->designation}}</td>
        <td>
          <ul class="action">
            <li>
              <a href="{{route('team.edit', $team->id)}}">
                <i class="tc-edit"></i>
              </a>
            </li>
            <li>
              <a data-url="{{route('team.destroy', $team->id)}}" data-name="{{$team->name}}" href="#" class="delete-this" data-toggle="modal" data-target="#exampleModal">
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
      <p>There are no data available. <a href="{{route('team.create')}}">Create One</a> Now!</p>
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
  <!-- {{$teams->where('status', 'published')->pluck('name')}} -->
@endsection
