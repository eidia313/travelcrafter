@extends('backend.layouts.app')
@section('pageTitle', 'All Trips')

@section('content')
    <div class="table-container">
        @if(count($trips) > 0)
            <table class="table dash-table">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Destination</th>
                    <th>Email</th>
                    <th>Phone</th>

                    <th class="actions"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($trips as $trip)
                    <tr>
                        <td>{{$trip->full_name}}</td>
                        <td>{{$trip->destination->name}}</td>
                        <td>{{ $trip->email }}</td>
                        <td>{{ $trip->phone }}</td>
                        <td>
                            <ul class="action">
                                <li>
                                    <a  href="{{route('admin.trip',$trip->id)}}" type="button"  >
                                        view
                                    </a>
                                </li>
                                <li>
                                    <form action="{{route('admin.delete-trip',$trip->id)}}" method="POST" class="delete-this">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit"   onclick="return confirm('Are you sure you want to delete this item?');">
                                            <i class="tc-delete"></i>
                                        </button>
                                    </form>
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

@endsection
