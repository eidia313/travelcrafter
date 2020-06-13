@extends('backend.layouts.app')
@section('pageTitle', 'Pages')
@section('addButton')
<a href="{{route('pages.create')}}" class="btn btn-default">Add New</a>
@endsection

@section('content')
<div class="table-container">
    @if(count($pages) > 0)
    <table class="table dash-table">
        <thead>
            <tr>
                <th colspan="2">Page</th>
                <th class="actions">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pages as $page)
            <tr>
                <td colspan="2">{{$page->title}}</td>
                <td>
                    <ul class="action">
                        <li>
                            <a href="{{route('pages.edit', $page->id)}}">
                                <i class="tc-edit"></i>
                            </a>
                        </li>
                        <li>
                            <a data-url="{{route('pages.destroy', $page->id)}}" data-name="{{$page->name}}" href="#"
                                class="delete-this" data-toggle="modal" data-target="#exampleModal">
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
        <p>There are no data available. <a href="{{route('pages.create')}}">Create One</a> Now!</p>
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
<!-- {{$pages->where('status', 'published')->pluck('name')}} -->
@endsection
