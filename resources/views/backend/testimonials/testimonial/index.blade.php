@extends('backend.layouts.app')
@section('pageTitle', 'Testimonials')
@section('addButton')
  <a href="{{route('testimonial.create')}}" class="btn btn-default">Add New</a>
@endsection

@section('content')
<div class="table-container">
  @include('partials.messages')
  @if(count($testimonials) > 0)
  <table class="table dash-table">
    <thead>
      <tr>
        <th>Client Name</th>
        <th>Testimonial</th>
        <th class="actions"></th>
      </tr>
    </thead>
    <tbody>
      @foreach($testimonials as $t)
      <tr>
        <td>{{$t->client_name}}</td>
        <td>{{str_limit($t->client_message, $limit = 90, $end = '...')}}</td>
        <td>
          <ul class="action">
            <li>
              <a href="{{route('testimonial.edit', $t->id)}}">
                <i class="tc-edit"></i>
              </a>
            </li>
            <li>
              <a data-url="{{route('testimonial.destroy', $t->id)}}" data-name="{{$t->client_name}}" href="#" class="delete-this" data-toggle="modal" data-target="#exampleModal">
                <i class="tc-delete"></i>
              </a>
              <!-- <form action="{{route('testimonial.destroy',$t->id)}}"
                    method="POST">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token"
                       value="{{ csrf_token() }}">
                <button type="submit"
                        class="btn btn-sm btn-danger glyphicon glyphicon-remove"
                        onclick="return confirm('Are you sure you want to delete this item?');"></button>
              </form> -->
            </li>
          </ul>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
    <div class="col-12">
      {{$testimonials->links()}}
    </div>
  @else
    <div class="content__nodata">
      <p>There are no data available. <a href="{{route('testimonial.create')}}">Create One</a> Now!</p>
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
