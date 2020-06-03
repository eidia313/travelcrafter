@extends('backend.layouts.app')
@section('pageTitle', 'Packages')
@section('addButton')
  <a href="{{route('package.create')}}" class="btn btn-default">Add New</a>
@endsection

@section('content')
<div class="table-container">
  @if(count($packages) > 0)
  <table class="table dash-table">
    <thead>
      <tr>
        <th>Name</th>
        <th class="actions"></th>
      </tr>
    </thead>
    <tbody>
      @foreach($packages as $package)
      <tr>
        <td>{{$package->title}}</td>
        <td>
          <ul class="action">
            <li data-toggle="tooltip" data-placement="top" title="Add Gallery Image">
              <a href="{{route('gallery.index',$package->id)}}">
                <i class="tc-photo"></i>
              </a>
            </li>
            <li data-toggle="tooltip" data-placement="top" title="Edit">
              <a href="{{route('package.edit', $package->id)}}">
                <i class="tc-edit"></i>
              </a>
            </li>
            <li data-toggle="tooltip" data-placement="top" title="Delete">
              <a data-url="{{route('package.destroy', $package->id)}}" data-name="{{$package->title}}" href="#" class="delete-this" data-toggle="modal" data-target="#exampleModal">
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
      <p>There are no data available. <a href="{{route('package.create')}}">Create One</a> Now!</p>
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
  <!-- {{$packages->where('status', 'published')->pluck('name')}} -->
@endsection
