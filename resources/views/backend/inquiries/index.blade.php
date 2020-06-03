@extends('backend.layouts.app')
@section('pageTitle', 'Contact Inquiries')

@section('content')
    <div class="table-container">
        @if(count($contacts) > 0)
            <table class="table dash-table">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Reason of Contact</th>
                    <th class="actions"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($contacts as $contact)
                    <tr>
                        <td>{{$contact->name}}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->subject }}</td>
                        <td>
                            <ul class="action">
                                <li>
                                    <a data-url="{{route('contact.destroy', $contact->id)}}" data-name="{{$contact->name}}" href="#" class="delete-this" data-toggle="modal" data-target="#exampleModal">
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
                <p>There are no data available. <a href="{{route('contact.create')}}">Create One</a> Now!</p>
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
<!-- {{$contacts->where('status', 'published')->pluck('name')}} -->
@endsection
