<?php

namespace App\Services;

use UserRepository;

class UserParameterService
{
    public function __construct(private UserRepository $UserRepository)
    {
    }
    public function getUserName(string $id): string | null
    {
        $user = $this->UserRepository->getUser($id);

        if ($user !== null)
            return $user->name;
        else
            return null;
    }

    public function getUserEmail(string $id): string | null
    {
        $user = $this->UserRepository->getUser($id);

        if ($user !== null)
            return $user->email;
        else
            return null;
    }
}
