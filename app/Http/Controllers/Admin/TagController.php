<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.tags.index')->only('index');
        $this->middleware('can:admin.tags.create')->only('create','store');
        $this->middleware('can:admin.tags.edit')->only('edit','update');
        $this->middleware('can:admin.tags.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$tags=Tag::all();
        return view('admin.tags.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $colors = 
        [
            'red'=>'Red color',
            'blue'=>'Blue color',
            'green'=>'Green color',
            'indigo'=>'Indigo color',
            'purple'=>'Purple color',
            'pink'=>'Pink color',
            'yellow'=>'Yellow color',
        ];
        return view('admin.tags.create',compact('colors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name'=>'required',
            'slug'=> 'required|unique:tags',
            'color'=> 'required',
        ]);
        $tags = Tag::create($request->all());
        return redirect()->route('admin.tags.edit',$tags)->with('info','Tag created successfully!');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        $colors = 
        [
            'red'=>'Red color',
            'blue'=>'Blue color',
            'green'=>'Green color',
            'indigo'=>'Indigo color',
            'purple'=>'Purple color',
            'pink'=>'Pink color',
            'yellow'=>'Yellow color',
        ];
        return view('admin.tags.edit',compact('tag','colors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'name'=>'required',
            'slug'=> "required|unique:tags,slug,$tag->id",
            'color'=>'required',
        ]);
        $tag->update($request->all());

        return redirect()->route('admin.tags.edit',$tag)->with('info','Tag updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        //
        $tag->delete();
        return redirect()->route('admin.tags.index',$tag)->with('info','Tag deleted successfully!');
    }
}
