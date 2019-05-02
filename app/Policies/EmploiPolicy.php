<?php

namespace App\Policies;

use App\User;
use App\Emploi;
use Illuminate\Auth\Access\HandlesAuthorization;

class EmploiPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the emploi.
     *
     * @param  \App\User  $user
     * @param  \App\Emploi  $emploi
     * @return mixed
     */
    public function view(User $user, Emploi $emploi)
    {
        return $user->type =='recruteur';
    }

    /**
     * Determine whether the user can create emplois.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the emploi.
     *
     * @param  \App\User  $user
     * @param  \App\Emploi  $emploi
     * @return mixed
     */
    public function update(User $user, Emploi $emploi)
    {
        //
    }

    /**
     * Determine whether the user can delete the emploi.
     *
     * @param  \App\User  $user
     * @param  \App\Emploi  $emploi
     * @return mixed
     */
    public function delete(User $user, Emploi $emploi)
    {
        //
    }

    /**
     * Determine whether the user can restore the emploi.
     *
     * @param  \App\User  $user
     * @param  \App\Emploi  $emploi
     * @return mixed
     */
    public function restore(User $user, Emploi $emploi)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the emploi.
     *
     * @param  \App\User  $user
     * @param  \App\Emploi  $emploi
     * @return mixed
     */
    public function forceDelete(User $user, Emploi $emploi)
    {
        //
    }
}
