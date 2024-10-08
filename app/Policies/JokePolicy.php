<?php

namespace App\Policies;

use App\Helpers\Enums\UserRole;
use App\Models\Joke;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class JokePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return !$user->is_restricted;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Joke $joke): bool
    {
        return !$user->is_restricted;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return !$user->is_restricted;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Joke $joke): bool
    {
        return $joke->user_id === $user->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Joke $joke): bool
    {
        return !$user->is_restricted && ($user->is_admin || $joke->user_id === $user->user_id);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Joke $joke): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Joke $joke): bool
    {
        //
    }
}
