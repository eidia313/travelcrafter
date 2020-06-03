@extends('backend.layouts.app')
@section('pageTitle', 'Leisure Activity')
@section('addButton')
    <a href="{{route('leisure.create')}}" class="btn btn-default">Add New</a>
@endsection

@section('content')
    <div class="table-container">
        @if(count($places) > 0)
            <table class="table dash-table">
                <thead>
                <tr>
                    <th>Place Name</th>
                    <th>Country</th>
                    <th>City</th>
                    <th class="actions"></th>
                </tr>

                </thead>
                <tbody>
                @foreach($places as $place)
                    <tr>
                        <td>{{$place->name}}</td>
                        <td>{{$place->country_id ? $place->country->name : 'undefined'}}</td>
                        <td>{{$place->city_id ? $place->city->name : 'undefined'}}</td>
                        <td>
                            <ul class="action">
                                <li>
                                    <a href="{{route('leisure.edit', $place->id)}}">
                                        <i class="tc-edit"></i>
                                    </a>
                                </li>
                                <li>
                                  <a data-url="{{route('leisure.destroy', $place->id)}}" data-name="{{$place->name}}" href="#" class="delete-this" data-toggle="modal" data-target="#exampleModal">
                                    <i class="tc-delete"></i>
                                  </a>
                                </li>
                            </ul>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <div class="col-12">
                {{$places->links()}}
            </div>
        @else
            <div class="content__nodata">
                <p>There are no data available. <a href="{{route('leisure.create')}}">Create One</a> Now!</p>
            </div>
        @endif
    </div>

@endsection
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
