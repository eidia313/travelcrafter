<?php

namespace App\Http\Controllers\Pages;

use App\Pages\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Validator;

class PageController extends Controller
{
    protected $status = ['published' => 'Published', 'draft' => 'Draft', 'featured' => 'Featured'];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pages = Page::paginate(10);
        return view('backend.pages.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $status = $this->status;
        return view('backend.pages.create', compact('status'));

    }

    /**
     * Store a newly created resource in storage_old.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $rules = [
            'title'              =>  'required|unique:pages,title|max:255'
        ];

        $requestData = $request->all();
        $validator = Validator::make($requestData, $rules);

        if($validator->fails()){
            return redirect()->route('pages.create')->withErrors($validator)->withInput();
        }

        $requestData['slug'] = str_slug($request->title);

        //Handle File Upload
        $file = image_upload('image', $request);

        $requestData['image'] = $file;

        $page = Page::create($requestData);

        if($page){
            return redirect('admin/pages')->with('success', 'Page has been created successfully!!');
        }else{
            return redirect()->route('pages.create')->withInput();
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
        //
        $page = Page::findOrFail($id);
        $status = $this->status;
        return view('backend.pages.edit', compact('page', 'status'));
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
        //
        $rules = [
            'title'              =>  'required|max:255|unique:pages,title,'.$id
        ];

        $requestData = $request->all();
        $validator = Validator::make($requestData, $rules);

        $page = Page::find($id);

        if($validator->fails()){
            return redirect()->route('pages.edit', [$page->id])->withErrors($validator)->withInput();
        }

        $requestData['slug'] = str_slug($request->title);
        
        if(!empty($request['image'])){
            $requestData['image'] = image_upload('image', $request);
        }


        $update = $page->update($requestData);

        if($update){
            return redirect('admin/pages')->with('success', 'Page has been updated successfully!!');
        }else{
            return redirect()->route('pages.edit', [$page->id])->withInput();
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
        $page = Page::find($id);
        //Delete File using Laravel Storage.
        Storage::disk('public')->delete('images/'.$page->image);
        $page->delete();

        return redirect()->route('pages.index')->with('success', 'Page has been deleted Successfully!!');
    }
}
