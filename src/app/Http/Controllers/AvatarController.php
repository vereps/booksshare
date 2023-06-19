<?php

namespace App\Http\Controllers;

use App\Http\Requests\AvatarUploadRequest;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class AvatarController extends Controller
{
    public function upload(AvatarUploadRequest $request)
    {
        $file = $request->file('avatar');
        $filename = $file->store();

        $user = $request->user();
        $user->avatar_filename = $filename;
        $user->save();

        return ['status' => 'ok'];
    }

    public function getAvatar(string $id)
    {
        $user = User::find($id);
        if (!$user || !$user->avatar_filename)
            return response(['error' => 'not_found'], 404);

        return Storage::download($user->avatar_filename);
    }
}
