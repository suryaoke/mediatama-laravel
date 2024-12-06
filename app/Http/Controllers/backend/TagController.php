<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\TagCreateRequest;
use App\Http\Requests\TagUpdateRequest;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        $tag = Tag::OrderBy('name', 'asc')->get();
        return view('backend.tag.index', compact('tag'));
    } // End Method

    public function create(TagCreateRequest $request)
    {

        $data = $request->validated();

        Tag::create($data);


        session()->flash('success', 'Tag Created Successfully.');

        return redirect()->route('admin.tag.all');
    } // End Method
    public function update(TagUpdateRequest $request, $tag)
    {

        $tag = Tag::findOrFail($tag);

        $data = $request->validated();


        $tag->update($data);


        session()->flash('success', 'Tag berhasil diperbarui.');


        return redirect()->route('admin.tag.all');
    }



    public function delete($id)
    {
        $tag = Tag::findOrFail($id);
        $tag->delete();

        return redirect()->route('admin.tag.all');
    } // end method
}
