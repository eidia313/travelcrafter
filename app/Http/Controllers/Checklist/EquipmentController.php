<?php

namespace App\Http\Controllers\Checklist;

use App\Checklists\CheckListCategory;
use App\Checklists\Equipment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Session;

class EquipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $equipments = Equipment::with('category')->latest()->paginate(12);

        return view('backend.checklists.checklist.index',compact('equipments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = CheckListCategory::latest()->get();

        return view('backend.checklists.checklist.create')->with(compact('category','categories'));
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
            'name' => 'required|max:191|unique:equipment,name',
            'category_id' => 'required',
        ]);

        $equipment=new Equipment();

        $equipment->name = $request->name;
        $equipment->category_id = $request->category_id;

        $equipment->save();

        Session::flash('success', 'New Equipment Has Been Added!');
        return redirect()->back();
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
        return redirect()->route('equipments.index');
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
        $equipment = Equipment::findOrFail($id);

        $categories = CheckListCategory::latest()->get();

        return view('backend.checklists.checklist.edit',compact('equipment','categories'));
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
            'name' => 'required|max:191|unique:equipment,name,'.$id,
            'category_id' => 'required',
        ]);

        $equipment=Equipment::findOrFail($id);

        $equipment->name = $request->name;
        $equipment->category_id = $request->category_id;

        $equipment->save();

        Session::flash('success', 'Equipment Has Been Updated!');
        return redirect()->back();
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
        $equipment= Equipment::findOrFail($id);


        $equipment->delete();

        Session::flash('success', 'Equipment Has Been Deleted!');

        return redirect()->route('equipments.index');
    }
}
