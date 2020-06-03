@extends('backend.layouts.app')
@section('pageTitle', 'Partners')
@section('addButton')
  <a href="{{route('clist.create')}}" class="btn btn-default">Add New</a>
@endsection
@section('content')
<div class="table-container">
  @if(count($partners) > 0)
  <table class="table dash-table">
    <thead>
      <tr>
        <th>Partners</th>
        <th class="actions"></th>
      </tr>
    </thead>
    <tbody>
      @foreach($partners as $partner)
      <tr>
        <td>{{$partner->name}}</td>
        <td>
          <ul class="action">
            <li>
              <a href="{{route('clist.edit', $partner->id)}}">
                <i class="tc-edit"></i>
              </a>
            </li>
            <li>
              <a data-url="{{route('clist.destroy', $partner->id)}}" data-name="{{$partner->name}}" href="#" class="delete-this" data-toggle="modal" data-target="#exampleModal">
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
      <p>There are no data available. <a href="{{route('clist.create')}}">Create One</a> Now!</p>
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
@endsection
