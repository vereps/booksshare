<?php

namespace App\Http\Controllers;

use App\Http\Requests\CoverUploadRequest;
use App\Models\Book;
use Illuminate\Support\Facades\Storage;

class CoverController extends Controller
{
    public function upload(CoverUploadRequest $request)
    {
        $file = $request->file('cover');
        $filename = $file->store();

        $book = $request->book();
        $book->cover_filename = $filename;
        $book->save();

        return ['status' => 'ok'];
    }

    public function getCover(string $id)
    {
        $book = Book::find($id);
        if (!$book || !$book->cover_filename)
            return response(['error' => 'not_found'], 404);

        return Storage::download($book->cover_filename);
    }
}
