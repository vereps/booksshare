<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Http\Requests\StoreAuthorRequest;
use App\Http\Requests\UpdateAuthorRequest;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function list()
    {
        $authors = Author::all();
        return $authors;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAuthorRequest $request)
    {
        // $input = $request->all();
        // $author = new Author($input);

        // $author->save();

        $input = $request->all();
        Author::create($input);
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $id)
    {
        $author = Author::find($id);
        return $author;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Author $author)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAuthorRequest $request, Author $author)
    {
        //
    }

    /**
     * Remove the specified resource.
     */
    public function delete($id)
    {
        Author::where('id', $id)->delete();
    }
}
