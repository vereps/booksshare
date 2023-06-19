<?php

namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function list(Request $request)
    {
        $languages = Language::all();
        return $languages;
    }
    public function find($id)
    {
        $language = Language::find($id);
        $languageName = $language->name;
        return $language;
    }
}
