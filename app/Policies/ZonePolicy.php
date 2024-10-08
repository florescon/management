<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Zone;
use Illuminate\Auth\Access\HandlesAuthorization;

class ZonePolicy
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
        return $user->can('List zones');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Zone  $zone
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Zone $zone)
    {
        return $user->can('View zone')
            && (
                $zone->owner_id === $user->id
                ||
                $zone->users()->where('users.id', $user->id)->count()
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
        return $user->can('Create zone');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Zone  $zone
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Zone $zone)
    {
        return $user->can('Update zone')
            && (
                $zone->owner_id === $user->id
                ||
                $zone->users()->where('users.id', $user->id)
                    ->where('role', config('system.projects.affectations.roles.can_manage'))
                    ->count()
            );
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Zone  $zone
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Zone $zone)
    {
        return $user->can('Delete zone');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Zone  $zone
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Zone $zone)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Zone  $zone
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Zone $zone)
    {
        //
    }
}
