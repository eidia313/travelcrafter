@extends('backend.layouts.app')
@section('pageTitle', 'FAQ')
@section('addButton')
    <a href="{{route('faq.create')}}" class="btn btn-default">Add New</a>
@endsection

@section('content')
    <div class="table-container">
        @if(count($faqs) > 0)
            <table class="table dash-table">
                <thead>
                <tr>
                    <th>Question</th>
                    <th class="actions"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($faqs as $faq)
                    <tr>
                        <td>{{$faq->question}}</td>
                        <td>
                            <ul class="action">
                                <li>
                                    <a href="{{route('faq.edit', $faq->id)}}">
                                        <i class="tc-edit"></i>
                                    </a>
                                </li>
                                <li>
                                    <a data-url="{{route('faq.destroy', $faq->id)}}" data-name="{{$faq->question}}" href="#" class="delete-this" data-toggle="modal" data-target="#exampleModal">
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
                <p>There are no data available. <a href="{{route('faq.create')}}">Create One</a> Now!</p>
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
<!-- {{$faqs->where('status', 'published')->pluck('name')}} -->
@endsection
