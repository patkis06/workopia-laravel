<?php

namespace App\Policies;

use App\Models\Job;
use App\Models\User;

class JobPolicy
{

    /**
     * Determine if the given job can be updated by the user.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Job   $job
     * @return bool
     */
    public function update(User $user, Job $job)
    {
        return $user->id === $job->user_id;
    }

    /**
     * Determine if the given job can be deleted by the user.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Job   $job
     * @return bool
     */
    public function delete(User $user, Job $job)
    {
        return $user->id === $job->user_id;
    }
}
