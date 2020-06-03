@extends('backend.layouts.app')
@section('pageTitle', 'Place Type')
@section('addButton')
  <a href="{{route('placetype.create')}}" class="btn btn-default">Add New</a>
@endsection

@section('content')
<div class="table-container">
  @if(count($placetype) > 0)
  <table class="table dash-table">
    <thead>
      <tr>
        <th>Place Type</th>
        <th class="actions"></th>
      </tr>
    </thead>
    <tbody>
      @foreach($placetype as $pt)
      <tr>
        <td>{{$pt->name}}</td>
        <td>
          <ul class="action">
            <li>
              <a href="{{route('placetype.edit', $pt->id)}}">
                <i class="tc-edit"></i>
              </a>
            </li>
            <li>
              <a data-url="{{route('placetype.destroy', $pt->id)}}" data-name="{{$pt->name}}" href="#" class="delete-this" data-toggle="modal" data-target="#exampleModal">
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
      <p>There are no data available. <a href="{{route('placetype.create')}}">Create One</a> Now!</p>
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
  <!-- {{$placetype->where('status', 'published')->pluck('name')}} -->
@endsection
