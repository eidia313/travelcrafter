@extends('backend.layouts.app')
@section('pageTitle', 'Difficulty')
@section('addButton')
  <a href="{{route('difficulty.create')}}" class="btn btn-default">Add New</a>
@endsection

@section('content')
<div class="table-container">
  @if(count($difficulties) > 0)
  <table class="table dash-table">
    <thead>
      <tr>
        <th>Difficulty</th>
        <th class="actions"></th>
      </tr>
    </thead>
    <tbody>
      @foreach($difficulties as $difficulty)
      <tr>
        <td>{{$difficulty->name}}</td>
        <td>
          <ul class="action">
            <li>
              <a href="{{route('difficulty.edit', $difficulty->id)}}">
                <i class="tc-edit"></i>
              </a>
            </li>
            <li>
              <a data-url="{{route('difficulty.destroy', $difficulty->id)}}" data-name="{{$difficulty->name}}" href="#" class="delete-this" data-toggle="modal" data-target="#exampleModal">
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
      <p>There are no data available. <a href="{{route('difficulty.create')}}">Create One</a> Now!</p>
    </div>
  @endif
</div>
@include('backend.components.modal')
@endsection
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
