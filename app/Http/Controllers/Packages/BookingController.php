<?php

namespace App\Http\Controllers\Packages;

use App\Packages\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $bookings = Booking::orderBy('id', 'desc')->paginate(10);
        return view('backend.packages.inquiries.index', compact('bookings'));
    }

    /**
     * Show the form for showing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $booking = Booking::findOrFail($id);
        return response($booking);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $booking = Booking::find($id);
        $booking->delete();

        return redirect()->route('booking.index')->with('success', 'Inquiry Successfully Deleted!');
    }
}
