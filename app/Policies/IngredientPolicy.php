<?php

namespace App\Policies;

use App\Models\Ingredient;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class IngredientPolicy
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
        return $user->can('List ingredients');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Ingredient  $ingredient
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Ingredient $ingredient)
    {
        return $user->can('View ingredient')
            && (
                $ingredient->owner_id === $user->id
                ||
                $ingredient->users()->where('users.id', $user->id)->count()
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
        return $user->can('Create ingredient');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Ingredient  $ingredient
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Ingredient $ingredient)
    {
        return $user->can('Update ingredient')
            && (
                $ingredient->owner_id === $user->id
                ||
                $ingredient->users()->where('users.id', $user->id)
                    ->where('role', config('system.projects.affectations.roles.can_manage'))
                    ->count()
            );
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Ingredient  $ingredient
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Ingredient $ingredient)
    {
        return $ingredient->can('Delete ingredient');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Ingredient  $ingredient
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Ingredient $ingredient)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Ingredient  $ingredient
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Ingredient $ingredient)
    {
        //
    }
}
