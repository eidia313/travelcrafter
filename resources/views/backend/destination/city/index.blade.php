@extends('backend.layouts.app')
@section('pageTitle', 'City')
@section('addButton')
  <a href="{{route('city.create')}}" class="btn btn-default">Add New</a>
@endsection

@section('content')
<div class="table-container">
  @if(count($cities) > 0)
  <table class="table dash-table">
    <thead>
      <tr>
        <th>City</th>
        <th>Country</th>
        <th class="actions"></th>
      </tr>
    </thead>
    <tbody>
      @foreach($cities as $city)
      <tr>
        <td>{{$city->name}}</td>
        <td>{{$city->country->name}}</td>
        <td>
          <ul class="action">
            <li>
              <a href="{{route('city.edit', $city->id)}}">
                <i class="tc-edit"></i>
              </a>
            </li>
            <li>
              <a data-url="{{route('city.destroy', $city->id)}}" data-name="{{$city->name}}" href="#" class="delete-this" data-toggle="modal" data-target="#exampleModal">
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
      <p>There are no data available. <a href="{{route('city.create')}}">Create One</a> Now!</p>
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
  <!-- {{$cities->where('status', 'published')->pluck('name')}} -->
@endsection
