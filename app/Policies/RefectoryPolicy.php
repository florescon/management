<?php

namespace App\Policies;

use App\Models\Refectory;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RefectoryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return $user->can('List refectories');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Refectory  $refectory
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Refectory $refectory)
    {
        return $user->can('View refectory')
            && (
                $refectory->owner_id === $user->id
                ||
                $refectory->users()->where('users.id', $user->id)->count()
            );
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->can('Create refectory');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Refectory  $refectory
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Refectory $refectory)
    {
        return $user->can('Update refectory')
            && (
                $refectory->owner_id === $user->id
                ||
                $refectory->users()->where('users.id', $user->id)
                    ->where('role', config('system.projects.affectations.roles.can_manage'))
                    ->count()
            );
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Refectory  $refectory
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Refectory $refectory)
    {
        return $user->can('Delete refectory');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Refectory  $refectory
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Refectory $refectory)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Refectory  $refectory
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Refectory $refectory)
    {
        //
    }
}
