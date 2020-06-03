@extends('backend.layouts.app')
@section('pageTitle', 'Welfare')
@section('addButton')
  <a href="{{route('welfare.create')}}" class="btn btn-default">Add New</a>
@endsection

@section('content')
<div class="table-container">
  @if(count($welfares) > 0)
  <table class="table dash-table">
    <thead>
      <tr>
        <th colspan="2">Welfare</th>
        <th>Sponsor</th>
        <th class="actions"></th>
      </tr>
    </thead>
    <tbody>
      @foreach($welfares as $welfare)
      <tr>
        <td width="90">
          <img src="{{URL::to('storage/images/'.$welfare->image)}}" alt="{{$welfare->title}}" width="50">
          </td>
        <td>{{$welfare->title}}</td>
        <td>{{$welfare->sponsor}}</td>
        <td>
          <ul class="action">
            <li>
              <a href="{{route('welfare.edit', $welfare->id)}}">
                <i class="tc-edit"></i>
              </a>
            </li>
            <li>
              <a data-url="{{route('welfare.destroy', $welfare->id)}}" data-name="{{$welfare->name}}" href="#" class="delete-this" data-toggle="modal" data-target="#exampleModal">
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
      <p>There are no data available. <a href="{{route('welfare.create')}}">Create One</a> Now!</p>
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
  <!-- {{$welfares->where('status', 'published')->pluck('name')}} -->
@endsection
