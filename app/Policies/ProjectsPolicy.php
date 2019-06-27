<?php

namespace App\Policies;

use App\Project;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Nullable;

class ProjectsPolicy
{
    use HandlesAuthorization;

    public function update(User $user, Project $project){
 
        return $user->is($project->owner) || $project->members->contains($user);
    }
}
