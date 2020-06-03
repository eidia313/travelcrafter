<?php

namespace App\Http\Controllers\Checklist;

use App\Checklists\CheckListCategory;
use App\Checklists\Equipment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Session;

class CheckListCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = CheckListCategory::latest()->paginate(12);

        return view('backend.checklists.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.checklists.category.create');
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
            'name' => 'required|max:191|unique:check_list_categories,name',
        ]);

        $category=new CheckListCategory();

        $category->name = $request->name;

        $category->save();

        Session::flash('success', 'New Category Has Been Added!');
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
        return redirect()->route('category.index');
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
        $category = CheckListCategory::findOrFail($id);

        return view('backend.checklists.category.edit',compact('category'));
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
            'name' => 'required|max:191|unique:check_list_categories,name,'.$id,
        ]);

        $category= CheckListCategory::findOrFail($id);

        $category->name = $request->name;

        $category->save();

        Session::flash('success', 'Category Has Been Updated!');
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
        $category= CheckListCategory::findOrFail($id);

        Equipment::where('category_id',$category->id)->update(['category_id' => null]);


        $category->delete();

        Session::flash('success', 'Category Has Been Deleted!');
        return redirect()->route('category.index');
    }
}
