<?php /** @noinspection ALL */

namespace App\Http\Controllers;

use App\Project;
use App\Task;

class ProjectTasksController extends Controller
{

    public function store(Project $project){

        $this->authorize('update', $project);

        request()->validate(['body' => 'required']);

        $project->addTask(request('body'));

        return redirect($project->path());
    }

    // Update the task

    /**
     * @param Project $project
     * @param Task $task
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(Project $project, Task $task){

        // AUTHORIZE
        $this->authorize('update', $task->project);

        // VALIDATE
        // UPDATE
        $task->update(request()->validate(['body' => 'required']));

        // CHECKING FOR TASK COMPLETED OR NOT
        $method = request('completed') ? 'complete' : 'incomplete';

        $task->$method();

        return redirect($project->path());
    }
}
