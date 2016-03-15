<?php

namespace App\Policies;
use App\User;
use App\Task;
use Illuminate\Auth\Access\HandlesAuthorization;

class TaskPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
    * Determines if a particular user can delete a task
    * @param User $user
    * @param Task $task
    * @return bool
    */
    public function destory(User $user, Task $task){
        return $user->id == $task->user_id;
    }
}
