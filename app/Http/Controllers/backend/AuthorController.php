<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthorCreateRequest;
use App\Http\Requests\AuthorUpdateRequest;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        $author = Author::OrderBy('name', 'asc')->get();
        return view('backend.author.index', compact('author'));
    } // End Method

    public function create(AuthorCreateRequest $request)
    {

        $data = $request->validated();

         Author::create($data);


        session()->flash('success', 'Author Created Successfully.');

        return redirect()->route('admin.author.all');
    } // End Method
    public function update(AuthorUpdateRequest $request, $author)
    {

        $author = Author::findOrFail($author);

        $data = $request->validated();


        $author->update($data);


        session()->flash('success', 'Author berhasil diperbarui.');


        return redirect()->route('admin.author.all');
    }



    public function delete($id)
    {
        $author = Author::findOrFail($id);
        $author->delete();

        return redirect()->route('admin.author.all');
    } // end method
}
