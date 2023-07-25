<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use Illuminate\Http\Request;
use App\Http\Requests\PublisherCreateRequest;

class PublisherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function list(Request $request)
    {
        $publishers = Publisher::all();
        return $publishers;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(PublisherCreateRequest $request)
    {
        $input = $request->all();
        $publisher = new Publisher($input);
        $publisher->save();
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $publisher = Publisher::find($id);
        return $publisher;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function update($id, PublisherCreateRequest $request)
    {
        $fieldToUpdate = $request->all();
        $publisher = Publisher::find($id);
        $publisher->name = $fieldToUpdate['name'];
        $publisher->description = $fieldToUpdate['description'];
        $publisher->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        Publisher::where('id', $id)->delete();
    }
}
