@extends('backend.layouts.app')
@section('pageTitle', 'Services')
@section('addButton')
  <a href="{{route('service.create')}}" class="btn btn-default">Add New</a>
@endsection

@section('content')
<div class="table-container">
  @if(count($services) > 0)
  <table class="table dash-table">
    <thead>
      <tr>
        <th>Title</th>
        <th>Is in Homepage?</th>
        <th class="actions"></th>
      </tr>
    </thead>
    <tbody>
      @foreach($services as $service)
      <tr>
        <td>{{$service->title}}</td>
        <td>{{$service->isHomePage == 1 ? "Yes" : "No"}}</td>
        <td>
          <ul class="action">
            <li>
              <a href="{{route('service.edit', $service->id)}}">
                <i class="tc-edit"></i>
              </a>
            </li>
            <li>
              <a data-url="{{route('service.destroy', $service->id)}}" data-name="{{$service->title}}" href="#" class="delete-this" data-toggle="modal" data-target="#exampleModal">
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
      <p>There are no data available. <a href="{{route('service.create')}}">Create One</a> Now!</p>
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
  <!-- {{$services->where('status', 'published')->pluck('name')}} -->
@endsection
