<?php

namespace App\Http\Controllers\Checklist;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Checklists\Checklist;

class ChecklistController extends Controller
{
    protected $category = ['head-wear' => 'Head Wear', 'hand-wear' => 'Hand Wear', 'body-wear' => 'Body Wear', 'foot-wear' => 'Foot Wear', 'log-wear' => 'Log Wear', 'wash-kit' => 'Wash Kit', 'other' => 'Other', 'recommended' => 'Recommended', 'misc' => 'Miscellaneous'];


    public function __construct(Checklist $checklist){
      $this->checklist = $checklist;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $equipments = $this->checklist->all();
      return view('backend.checklists.checklist.index')->with(compact('equipments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = $this->category;
        return view('backend.checklists.checklist.create')->with(compact('category'));

    }

    /**
     * Store a newly created resource in storage_old.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, [
         'name' => 'required|unique:checklist'
         ]);

         $this->checklist->create([
           'name' => $request['name'],
           'category' => $request['category']
         ]);

         return redirect()->route('equipment.index')->with('success', 'Equipment Successfully Created!');

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
      $equipment = $this->checklist->find($id);
      $category= $this->category;
      return view('backend.checklists.checklist.edit')->with(compact('category', 'equipment'));
    }

    /**
     * Update the specified resource in storage_old.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      try{
        $equipment = $this->checklist->find($id);
        $equipment->name = $request['name'];

        $equipment->category = $request['category'];
        $equipment->save();
        return redirect()->route('equipment.index')->with('success', 'Equipment Successfully Updated!');
      }catch(\Exception $e){
        return redirect()->back()->with('error', 'Errors in field!');
      }
    }

    /**
     * Remove the specified resource from storage_old.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
