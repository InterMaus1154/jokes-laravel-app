<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class UserPolicy
{

    /**
     * Check if user can view all users
     * @param User $user
     * @return bool
     */
    public function viewAll(User $user): bool
    {
        return !$user->is_restricted && $user->is_admin;
    }

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, User $model): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, User $model): bool
    {
        return !$user->is_restricted && ($user->is_admin || $user->user_id === $model->user_id);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, User $model): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, User $model): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, User $model): bool
    {
        //
    }

    /**
     * Determine whether the user can make a user verified
     */
    public function verifyUser(User $user): bool
    {
        return $user->is_admin && !$user->is_restricted;
    }

    /**
     * Only admin is able to restrict a user
     */
    public function restrictUser(User $user): bool
    {
        return $user->is_admin && !$user->is_restricted;
    }

    /**
     * Only admin is able to unrestrict a restricted user
     */
    public function unrestrictUser(User $user): bool
    {
        return $user->is_admin && !$user->is_restricted;
    }
}
