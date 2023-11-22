<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Tags;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tag = Tags::get();
        return view('admin.tag.index',compact('tag'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tag.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|min:3'
        ]);

        $data['slug'] = Str::slug($data['name']);

        Tags::create($data);

        return redirect()->route('tag.index')->with('success','Tag berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tag = Tags::findorfail($id);
        return view('admin.tag.update',compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'name' => 'required|min:3'
        ]);

        $data['slug'] = Str::slug($data['name']);

        
        Tags::findorfail($id)->update($data);

        return redirect()->route('tag.index')->with('success','Tag berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tag = Tags::findorfail($id);
        $tag->delete();

        return redirect()->back()->with('success','Tag berhasil dihapus!');
    }
}
