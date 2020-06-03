@extends('backend.layouts.app')
@section('pageTitle', 'Region')
@section('addButton')
  <a href="{{route('region.create')}}" class="btn btn-default">Add New</a>
@endsection

@section('content')
<div class="table-container">
  @if(count($regions) > 0)
  <table class="table dash-table">
    <thead>
      <tr>
        <th>Region</th>
        <th>Country</th>
        <th class="actions"></th>
      </tr>
    </thead>
    <tbody>
      @foreach($regions as $region)
      <tr>
        <td>{{$region->name}}</td>
        <td>{{$region->country->name}}</td>
        <td>
          <ul class="action">
            <li>
              <a href="{{route('region.edit', $region->id)}}">
                <i class="tc-edit"></i>
              </a>
            </li>
            <li>
              <a data-url="{{route('region.destroy', $region->id)}}" data-name="{{$region->name}}" href="#" class="delete-this" data-toggle="modal" data-target="#exampleModal">
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
      <p>There are no data available. <a href="{{route('region.create')}}">Create One</a> Now!</p>
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
  <!-- {{$regions->where('status', 'published')->pluck('name')}} -->
@endsection
