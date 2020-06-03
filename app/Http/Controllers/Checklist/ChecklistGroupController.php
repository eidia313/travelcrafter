<?php

namespace App\Http\Controllers\Checklist;

use App\Checklists\CheckListCategory;
use App\Checklists\CheckListGroup;
use App\Checklists\Equipment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Session;

class CheckListGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $groups= CheckListGroup::latest()->paginate(12);
        return view('backend.checklists.checklistgroup.index', compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categories = CheckListCategory::latest()->get();
        $equipments = Equipment::with('category')->get();
        // print($categories);
        return view('backend.checklists.checklistgroup.create',compact('categories', 'equipments'));
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
            'name' => 'required|max:191|unique:check_list_groups,name',
            'equipments' => 'required'
        ]);


        //generating the slug
        $slug = str_slug($request->name, '-');
        $equip = $request->equipments;
        $eqip = json_encode($equip);
        $group=new CheckListGroup();

        $group->name = $request->name;
        $group->slug= $slug;
        $group->equipments= $eqip;
        // foreach($equip as $key => $value){
        //   print_r($key);
        //   for($i=0; $i<count($value); $i++){
        //     print_r($value[$i]);
        //   }
        // }
        $group->save();
        // $group->categories()->attach($request->category_id);

        Session::flash('success', 'New Checklist Group Was Added!');
        return redirect()->route('groups.index');
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
        return redirect()->route('groups.index');
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
        $group = CheckListGroup::findOrFail($id);

        //retrieving only id and converting to array
        $categories = CheckListCategory::latest()->get();
        $equipments = Equipment::with('category')->get();

        return view('backend.checklists.checklistgroup.edit',compact('group','equipments','categories'));
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
        //validate
        $this->validate($request, [
            'name' => 'required|max:191|unique:check_list_groups,name,'.$id,
        ]);


        //generating the slug
        $slug = str_slug($request->name, '-');

        $group=CheckListGroup::findOrFail($id);
        $equip = $request->equipments;
        $eqip = json_encode($equip);
        $group->name = $request->name;
        $group->equipments= $eqip;
        $group->slug= $slug;

        $group->save();
        // $group->categories()->sync($request->category_id);;

        Session::flash('success', 'Checklist Group Was Updated!');
        return redirect()->route('groups.index');

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
        $group=CheckListGroup::findOrFail($id);
        $group->delete();


        Session::flash('success', 'Checklist Group Has Been Deleted!');

        return redirect()->route('groups.index');
    }
}
