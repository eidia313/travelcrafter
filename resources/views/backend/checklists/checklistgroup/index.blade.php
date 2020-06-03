@extends('backend.layouts.app')
@section('pageTitle', 'Groups')
@section('addButton')
  <a href="{{route('groups.create')}}" class="btn btn-default">Add New</a>
@endsection

@section('content')
  <div class="table-container">
    @if(count($groups) > 0)
      <table class="table dash-table">
        <thead>
        <tr>
          <th>Group Name</th>
          <th>Packages Assigned to</th>
          <th class="actions"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($groups as $group)
          <tr>
            <td>{{$group->name}}</td>
            <td>
              <?php
                if(count($group->packages) > 0){
                $pArr = array();
                foreach($group->packages as $p){
                  $pArr[] = '<a href="'.url("admin/packages/package").'/'.$p->id.'/edit" target="_blank">'.$p->title.'</a>';
                  }
                echo implode(', ', $pArr);
              }else{
                echo "-";
              }
              ?>
            </td>
            <td>
              <ul class="action">
                <li>
                  <a href="{{route('groups.edit', $group->id)}}">
                    <i class="tc-edit"></i>
                  </a>
                </li>
                <li>
                  <a data-url="{{route('groups.destroy', $group->id)}}" data-name="{{$group->name}}" href="#" class="delete-this" data-toggle="modal" data-target="#exampleModal">
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
        {{$groups->links()}}
      </div>
    @else
      <div class="content__nodata">
        <p>There are no data available. <a href="{{route('groups.create')}}">Create One</a> Now!</p>
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
