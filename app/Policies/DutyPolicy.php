<?php

namespace App\Policies;

use App\Models\Duty;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DutyPolicy
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
        return false;
    }

    /**
     * Determine whether the user can view a team duties
     * @param \App\Models\User $user
     * @param \App\Models\Duty $duty
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewTeamDuties(User $user, Duty $duty)
    {
        //user can view team duties if
        //he or she belongs to the team
        return $duty->team->id == $user->currentTeam->id;
    }


    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Duty  $duty
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Duty $duty)
    {
        //
        $user->currentTeam->id===$duty->{$this->getForeignKey()};
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Duty  $duty
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Duty $duty)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Duty  $duty
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Duty $duty)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Duty  $duty
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Duty $duty)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Duty  $duty
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Duty $duty)
    {
        //
    }
}
