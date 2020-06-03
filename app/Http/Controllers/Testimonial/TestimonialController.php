<?php

namespace App\Http\Controllers\Testimonial;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Testimonial\Testimonial;

use Session;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $status = ['published' => 'Published', 'draft' => 'Draft', 'featured' => 'Featured'];
   // protected $rating = ['1'=>'1Star', '2'=>'2Star', '3'=>'3Star', '4'=>'4Star', '5'=>'5Star'];

    public function __construct(Testimonial $testimonial){
      $this->testimonial = $testimonial;
    }

    public function index()
    {
      $testimonials = $this->testimonial->orderBy('id', 'desc')->paginate(12);
      return view('backend.testimonials.testimonial.index')->with(compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $status =   $this->status;
       // $rating =   $this->rating;
        return view('backend.testimonials.testimonial.create', compact('status'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate
        $this->validate($request, [
            'client_name' => 'required|max:191',
            'video' => 'required',
            'client_message' => 'required',
            'client_location' => 'max:191',
        ]);

        $testimonial = new Testimonial();
        $testimonial->client_name = $request->client_name;
        $testimonial->client_message = $request->client_message;
        $testimonial->client_location = $request->client_location;
        $testimonial->video = $request->video;
        $testimonial->status = $request->status;

        $testimonial->save();

        Session::flash('success', 'Testimonial Was Added!');
        return redirect()->route('testimonial.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $testimonial = Testimonial::findOrFail($id);
        $status =   $this->status;
        return view('backend.testimonials.testimonial.edit',compact('testimonial','status'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //validate
        $this->validate($request, [
            'client_name' => 'required|max:191',
            'client_message' => 'required',
            'client_location' => 'max:191',
        ]);

        $testimonial = Testimonial::findOrFail($id);
        $testimonial->client_name = $request->client_name;
        $testimonial->client_message = $request->client_message;
        $testimonial->client_location = $request->client_location;
        $testimonial->video = $request->video;
        $testimonial->status = $request->status;
        $testimonial->save();

        Session::flash('success', 'Testimonial Was Updated!');
        return redirect()->route('testimonial.edit',$testimonial->id);
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
        $testimonial = Testimonial::findOrFail($id);

        $testimonial->delete();


        Session::flash('success', 'Testimonial Was Deleted!');
        return redirect()->route('testimonial.index');
    }
}
