<?php

use App\Models\User;

class UserRepository {
    public function getUser($id): User | null {
        return User::find($id);
    }

    public function saveUser(User $user): void {
        $user->save();
    }

    public function deleteUser(User $user): void {
        $user->delete();
    }
}