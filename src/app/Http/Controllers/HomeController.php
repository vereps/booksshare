<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Home;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function list()
    {
        $books = Book::where('is_active', 1)
        ->orderBy('updated_at')
        ->take(3)
        ->get();
        $user = User::all()->first();
        return view('home')
            ->with(['books' => $books])
            ->with(['user' => $user]);
    }


    public function find($id)
    {
        return "Found user $id";
    }

    public function create($id)
    {
        return "Create user $id";
    }

    public function update($id)
    {
        return "Update user $id";
    }

    public function delete($id)
    {
        return "Delete user $id";
    }
}
