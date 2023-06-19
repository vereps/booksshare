<?php

namespace App\Http\Controllers;

use App\Models\Language;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function list()
    {
        // $results = User::all();
        // return view('user', ['results'=>$results]);

        // return User::all();

        $users = User::all();
        return $users;
    }

    public function listLanguagesUsers($id)
    {
        $language = Language::find($id);
        if (isset($language)) {
            $languageName = $language->name;
            $languageId = $language->id;
            $users = $language->users;
            $user = User::where('language_id', $languageId)->first();
            if (isset($user)) {
                return ("$users, $languageName");
            } else {
                return back();
            };
        } else {
            return redirect()->action([HomeController::class, 'list']);
        };
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
