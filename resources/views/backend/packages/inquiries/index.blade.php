@extends('backend.layouts.app')
@section('pageTitle', 'Booking Inquiries')

@section('content')
    <div class="table-container">
        @if(count($bookings) > 0)
            <table class="table dash-table">
                <thead>
                <tr>
                    <th>Package Name</th>
                    <th>Booking Made By</th>
                    <th>Trip Start Date</th>
                    <th class="actions"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($bookings as $booking)
                    <tr>
                        <td>{{$booking->package}}</td>
                        <td>{{$booking->full_name}}</td>
                        <td>{{$booking->trip_start_date}}</td>
                        <td>
                            <ul class="action">
                                <li>
                                    <a data-url="{{route('booking.show', $booking->id)}}" data-id="{{$booking->id}}" href="#" class="view" data-toggle="modal" data-target="#viewModal">
                                        <i class="tc-view"></i>
                                        View
                                    </a>
                                </li>
                                <li>
                                    <a data-url="{{route('booking.destroy', $booking->id)}}" data-name="Booking made by {{$booking->full_name}}" href="#" class="delete-this" data-toggle="modal" data-target="#delete-modal">
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
                <p>There are no data available.</p>
            </div>
        @endif
    </div>
    @include('backend.components.modal')
@section('js')
    <script type="text/javascript">
        $(document).ready(function() {
            $(document).on('click', '.view', function(e) {
                e.preventDefault();
                id = $(this).data('id');
                bookingUrl = "{{ route('booking.show', [isset($booking) ? $booking->id : '']) }}";
                $.ajax({
                    type: 'GET',
                    url: bookingUrl,
                    success:function (data) {
                        $('#viewModal .modal-body').append(
                            '<ul><li><strong>Package: </strong>'+data.package+'</li>'+
                                '<li><strong>Trip Start Date: </strong>'+data.trip_start_date+'</li>'+
                                '<li><strong>Trip End Date: </strong>'+data.trip_end_date+'</li>'+
                                '<li><strong>Number of People: </strong>'+data.people_num+'</li>'+
                                '<li><strong>Full Name: </strong>'+data.full_name+'</li>'+
                                '<li><strong>Date of Birth: </strong>'+data.dob+'</li>'+
                                '<li><strong>Country: </strong>'+data.country+'</li>'+
                                '<li><strong>City: </strong>'+data.city+'</li>'+
                                '<li><strong>Email: </strong>'+data.email+'</li>'+
                                '<li><strong>Phone Number: </strong>'+data.phone_num+'</li>'+
                                '<li><strong>Mobile Number: </strong>'+data.mobile_num+'</li>'+
                                '<li><strong>Emergency Contact Name: </strong>'+data.emergency_contact_name+'</li>'+
                                '<li><strong>Relationship: </strong>'+data.relationship+'</li>'+
                                '<li><strong>Emergency Phone Number: </strong>'+data.emergency_phone+'</li>'+
                                '<li><strong>Mailing Address: </strong>'+data.mailing_address+'</li>'+
                            '</ul>'
                        );
                    }
                })

            });

            $(document).on('click', '.delete-this', function(e) {
                e.preventDefault();
                $('.data-name').text($(this).data('name'));
                $('#delete-form').attr('action', $(this).data('url'));
                $('#delete-modal').modal({backdrop: 'static', keyboard: false});
            });
        } );
    </script>
@endsection
<!-- {{$bookings->where('status', 'published')->pluck('name')}} -->
@endsection
