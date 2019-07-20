<?php

namespace App\Policies;

use App\OwnedBooks;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BookPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @param User|null $user
     * @param OwnedBooks $ownedBooks
     * @return bool
     */
    public function delete(?User $user, OwnedBooks $ownedBooks)
    {
        return $ownedBooks->owner_id == $user->id;
    }
}
