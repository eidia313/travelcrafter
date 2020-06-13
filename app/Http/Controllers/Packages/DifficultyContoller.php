<?php

namespace App\Http\Controllers\Packages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Packages\Difficulty;


class DifficultyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(Difficulty $difficulty)
    {
        $this->difficulty = $difficulty;
    }

    public function index()
    {
        $difficulties = $this->difficulty->orderBy('id', 'desc')->get();
        return view('backend.packages.difficulty.index')->with(compact('difficulties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.packages.difficulty.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:difficulty',
            'image' => 'required|image|mimes:png,jpg,jpeg|dimensions:min_width=100,min_height=100'
        ]);

        //File Handle
        $file = image_upload('image', $request);

        $difficulty = new Difficulty();
        $difficulty->name = $request->name;
        $difficulty->desc = $request->desc;
        $difficulty->image = $file;

        $difficulty->save();

        return redirect()->route('difficulty.index')->with('success', 'Diffulty successfully created!!');
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
        $difficulty = $this->difficulty->find($id);

        return view('backend.packages.difficulty.edit')->with(compact('difficulty'));
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
        //
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
    }
}