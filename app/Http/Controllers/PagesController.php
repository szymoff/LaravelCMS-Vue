<?php

namespace App\Http\Controllers;
use App\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
    public function create() {
        return view('pages.create');
    }

    public function show($id) {
        $page = Page::find($id);
        return view('pages.show')->with('page', $page);;
    }

    public function edit($id) {
        $page = Page::find($id);
        return view('pages.edit', compact('page'));
    }

    

    public function save(Request $request){
        //dd($request->all());
        $page = new Page();
        $page->title = $request->input('title');
        $page->meta_title = $request->input('meta_title');
        $page->meta_description = $request->input('meta_description');
        $page->content = $request->input('content');
        $page->save();
    }

    public function index() {
        $pages = DB::table('pages')->paginate(15);

        return view('pages.index', ['pages' => $pages]);
    }

    public function update(Request $request, Page $page){
        // $request->validate([
        //   'title'=>'required',
        //   'meta_title'=> 'required',
        //   'meta_description' => 'required',
        //   'content' => 'required'
        // ]);
        $page->title = $request->title;
        $page->meta_title = $request->meta_title;
        $page->meta_description = $request->meta_description;
        $page->content = $request->content;
        $page->save();
  
        return redirect('/pages')->with('success', 'Page has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Page  $Page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Page $page)
    {
        $page->delete();
        $request->session()->flash('message', 'Successfully deleted the Page!');
        return redirect('/pages')->with('success', 'Page has been deleted');
    }

}
