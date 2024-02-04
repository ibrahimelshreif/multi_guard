<?php

namespace Src\Domain\Location\Policies;

use Src\Domain\Location\Entities\Locationclients;
use Src\Domain\User\Entities\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class LocationclientsPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \Src\Domain\User\Entities\User  $user
     * @param  \Src\Domain\User\Entities\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \Src\Domain\User\Entities\User  $user
     * @param  \Src\Domain\Location\Entities\Locationclients  $locationclients
     * @return mixed
     */
    public function view(User $user, Locationclients $locationclients)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \Src\Domain\User\Entities\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \Src\Domain\User\Entities\User  $user
     * @param  \Src\Domain\Location\Entities\Locationclients  $locationclients
     * @return mixed
     */
    public function update(User $user, Locationclients $locationclients)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \Src\Domain\User\Entities\User  $user
     * @param  \Src\Domain\Location\Entities\Locationclients  $locationclients
     * @return mixed
     */
    public function delete(User $user, Locationclients $locationclients)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \Src\Domain\User\Entities\User  $user
     * @param  \Src\Domain\Location\Entities\Locationclients  $locationclients
     * @return mixed
     */
    public function restore(User $user, Locationclients $locationclients)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \Src\Domain\User\Entities\User  $user
     * @param  \Src\Domain\Location\Entities\Locationclients  $locationclients
     * @return mixed
     */
    public function forceDelete(User $user, Locationclients $locationclients)
    {
        //
    }
}
