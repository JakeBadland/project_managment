<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

use App\Models\Project;
use App\Models\Task;

class ProjectController extends Controller
{

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $this->isAuth();

        $projects = Project::where('user_id', Auth::user()->id)->get();

        return view('project.index', [
            'projects' => $projects
        ]);
    }

    /**
     * @param Request $request
     * @return View|RedirectResponse
     */
    public function create(Request $request)
    {
        $this->isAuth();

        $data = $request->all();

        if (!$data){
            return view('project.create');
        }

        $data['user_id'] = Auth::user()->id;

        Project::create($data);

        return redirect()->intended('/project');
    }

    /**
     * @param int $projectId
     * @return Application|Factory|View
     */
    public function read(int $projectId)
    {
        $this->isAuth();

        //TODO check for is_private

        $project = Project::where('id', $projectId)->first();
        $tasksCount = Task::where('project_id', $projectId)->count();

        return view('project.show', [
            'project'       => $project,
            'tasks_count'   => $tasksCount
        ]);
    }

    /**
     * @param Request $request
     * @param int $projectId
     * @return Application|Factory|View|RedirectResponse
     */
    public function update(Request $request, int $projectId)
    {
        $this->isAuth();

        $project = Project::where('id', $projectId)->first();
        if (!$request->all()){
            return view('project.update', [
                'project' => $project
            ]);
        }

        if ($project->user_id !== Auth::user()->id){
            Session::flash('error', 'You are not owner of this project');
            return redirect()->intended('/project');
        }

        $request->validate(['name' => 'required',]);

        $data = $request->all();
        unset($data['_token']);
        Project::whereId($projectId)->update($data);
        $project = Project::where('id', $projectId)->first();

        return view('project.update', [
            'project' => $project
        ]);
    }

    /**
     * @param int $projectId
     * @return RedirectResponse
     */
    public function delete(int $projectId)
    {
        $this->isAuth();

        $project = Project::where('id', $projectId)->first();

        if ($project->user_id !== Auth::user()->id){
            Session::flash('error', 'You are not owner of this project');
            return redirect()->intended('/project');
        }

        Project::where('id', $projectId)->delete();
        return redirect()->intended('/project');
    }

    private function isAuth()
    {
        //TODO Add user roles and permissions
        if (!Auth::user()){
            redirect()->intended('/')->send();
        }
    }

}
