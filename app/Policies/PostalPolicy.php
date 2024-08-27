<?php

namespace App\Policies;

use App\Models\Postal;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostalPolicy
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
        return $user->can('List postals');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Postal  $postal
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Postal $postal)
    {
        return $user->can('View postal')
            && (
                $postal->owner_id === $user->id
                ||
                $postal->users()->where('users.id', $user->id)->count()
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
        return $user->can('Create postal');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Postal  $postal
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Postal $postal)
    {
        return $user->can('Update postal')
            && (
                $postal->owner_id === $user->id
                ||
                $postal->users()->where('users.id', $user->id)
                    ->where('role', config('system.projects.affectations.roles.can_manage'))
                    ->count()
            );
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Postal  $postal
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Postal $postal)
    {
        return $user->can('Delete postal');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Postal  $postal
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Postal $postal)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Postal  $postal
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Postal $postal)
    {
        //
    }
}
