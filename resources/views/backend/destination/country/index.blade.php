@extends('backend.layouts.app')
@section('pageTitle', 'Country')
@section('addButton')
  <a href="{{route('country.create')}}" class="btn btn-default">Add New</a>
@endsection

@section('content')
@if(Session::has('error'))
<p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('error') }}</p>
@endif
<div class="table-container">
  @if(count($countries) > 0)
  <table class="table dash-table">
    <thead>
      <tr>
        <th>Country</th>
        <th class="actions"></th>
      </tr>
    </thead>
    <tbody>
      @foreach($countries as $country)
      <tr>
        <td>{{$country->name}}</td>
        <td>
          <ul class="action">
            <li>
              <a href="{{route('country.edit', $country->id)}}">
                <i class="tc-edit"></i>
              </a>
            </li>
            <li>
              <a data-url="{{route('country.destroy', $country->id)}}" data-name="{{$country->name}}" href="#" class="delete-this" data-toggle="modal" data-target="#exampleModal">
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
      <p>There are no data available. <a href="{{route('country.create')}}">Create One</a> Now!</p>
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
  <!-- {{$countries->where('status', 'published')->pluck('name')}} -->
@endsection
