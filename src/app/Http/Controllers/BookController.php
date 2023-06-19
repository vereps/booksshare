<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Http\Controllers\HomeController;
use App\Http\Requests\BookCreateRequest;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    public function list(Request $request)
    {
        $books = Book::all();
        return $books;

        // return view('book/books', ['books' => $books]);
    }

    public function listUsersBooks($id)
    {
        $user = User::find($id);
        if (isset($user)) {
            $userName = $user->name;
            $userId = $user->id;
            $books = $user->books;
            $book = Book::where('user_id', $userId)->first();
            if (isset($book)) {
                return view('book/books')
                    ->with(['books' => $books])
                    ->with(['userName' => $userName]);
            } else {
                return back();
            };
        } else {
            return redirect()->action([HomeController::class, 'list']);
        };
    }

    public function listLanguagesBooks($id)
    {
        $language = Language::find($id);
        if (isset($language)) {
            $languageName = $language->name;
            $languageId = $language->id;
            $books = $language->books;
            $book = Book::where('language_id', $languageId)->first();
            if (isset($book)) {
                return ("$books, $languageName");
            } else {
                return back();
            };
        } else {
            return redirect()->action([HomeController::class, 'list']);
        };
    }

    public function listAllCompleted()
    {
        $books = Book::completed()->get();
        return $books;
    }

    public function find($id)
    {
        // $this->authorize('book', Book::find($id));

        $book = Book::find($id);
        // return view('book/book', ['book' => $book]);
        return $book;
    }

    // public function create($id)
    // {
    //     return "Create book $id";
    // }

    public function create(BookCreateRequest $request)
    {
        $input = $request->all();
        $book = new Book($input);

        $book->save();
    }
    // public function create(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'name' => 'required|min:10',
    //         'is_active' => 'required|boolean',
    //         'created_at' => 'nullable|date_format:Y-m-d H:i:s',
    //     ]);

    //     if ($validator->fails()) {
    //         return response($validator->errors());
    //     }

    //     $input = $request->all();
    //     Book::create($input);
    // }

    public function update($id, BookCreateRequest $request)
    {
        $fieldToUpdate = $request->all();
        // $updatingUser = $request->user();

        $book = Book::find($id);
        $book->name = $fieldToUpdate['name'];
        $book->description = $fieldToUpdate['description'];
        $book->language = $fieldToUpdate['language'];
        $book->created_at = $fieldToUpdate['created_at'];
        $book->is_active = $fieldToUpdate['is_active'];
        // $book->last_updated_user_id = $updatingUser->id;
        $book->save();

        // Book::where('is_active', $id)
        //     ->update([
        //         'name' => $fieldToUpdate['name'],
        //         'created_at' => $fieldToUpdate['created_at'],
        //         'last_updated_user_id' =>  $updatingUser->id,
        //     ]);


        // Book::where('id', $id)
        //     ->update(['is_active' => 1]);
        // return redirect()->action([HomeController::class, 'list']);
    }

    public function delete($id)
    {
        Book::where('id', $id)->delete();
        // return redirect()->action([HomeController::class, 'list']);
    }
}
