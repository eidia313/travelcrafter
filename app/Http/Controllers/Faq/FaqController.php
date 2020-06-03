<?php

namespace App\Http\Controllers\Faq;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Faq\Faq;
use Validator;


class FaqController extends Controller
{
    protected $status = ['published' => 'Published', 'draft' => 'Draft'];

    public function __construct(Faq $faq){
        $this->faq = $faq;
    }


    public function index()
    {
      $faqs = $this->faq->orderBy('id', 'desc')->get();
      return view('backend.faq.index')->with(compact('faqs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $status = $this->status;
      return view('backend.faq.create', compact('status'));
    }

    public function store(Request $request)
    {
      $rules = [
          'question'              =>  'required|unique:faq,question|max:255',
          'answer'  => 'required'
      ];

      $requestData = $request->all();
      $validator = Validator::make($requestData, $rules);
      if($validator->fails()){
          return redirect()->route('faq.create')->withErrors($validator)->withInput();
      }
      $faq = Faq::create($requestData);

      if($faq){
          return redirect('admin/faq')->with('success', 'FAQ has been created successfully!!');
      }else{
          return redirect()->route('faq.create')->withInput();
      }
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
      $faq = Faq::findOrFail($id);
      $status = $this->status;
      return view('backend.faq.edit', compact('faq', 'status'));
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
      $rules = [
          'question'              =>  'required|max:255|unique:faq,question,'.$id,
          'answer' => 'required'
      ];

      $requestData = $request->all();
      $validator = Validator::make($requestData, $rules);

      $faq = Faq::find($id);

      if($validator->fails()){
          return redirect()->route('faq.edit', [$faq->id])->withErrors($validator)->withInput();
      }


      $update = $faq->update($requestData);
      if($update){
          return redirect('admin/faq')->with('success', 'FAQ has been updated successfully!!');
      }else{
          return redirect()->route('faq.edit', [$faq->id])->withInput();
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $faq = Faq::find($id);
      $faq->delete();

      return redirect()->route('faq.index')->with('success', 'FAQ has been deleted Successfully!!');
    }
}
