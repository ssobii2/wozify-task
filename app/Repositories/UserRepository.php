<?php

namespace App\Repositories;

use App\Models\User;

/**
 * Class UserRepository
 *
 * @package App\Repositories
 */
class UserRepository
{
    /**
     * @var User
     */
    protected User $user;

    /**
     * UserRepository constructor.
     *
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Search for users based on the provided query.
     *
     * @param string $query
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function search($query)
    {
        return $this->user->where('name', 'like', "%{$query}%")
            ->orWhere('email', 'like', "%{$query}%")
            ->get();
    }
}
