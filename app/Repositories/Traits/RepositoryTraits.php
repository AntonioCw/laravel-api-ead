<?php

namespace App\Repositories\Traits;

use App\Models\User;

trait RepositoryTraits
{
    private function getUserAuth(): User
    {
         return auth()->user();
    }
}
