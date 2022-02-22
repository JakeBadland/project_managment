<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use App\Models\Task;

class TaskController extends Controller
{

    public function index(int $projectId)
    {
        $this->isAuth();

        $tasks = Task::getProjectTasks($projectId);

        return view('task.list', [
            'tasks'         => $tasks,
            'project_id'    => $projectId
        ]);
    }

    public function create(int $projectId)
    {
        $this->isAuth();

        return view('task.create', [
            'project_id' => $projectId
        ]);
    }

    public function save(Request $request)
    {
        $this->isAuth();

        $data = $request->all();

        if ($request->file){
            $fileName = uniqid() . '_' . $request->file->getClientOriginalName();
            $request->file->move(public_path('uploads'), $fileName);
            $data['file_name'] = $fileName;
        }

        $data['user_id'] = Auth::user()->id;
        $data['status'] = Task::STATUS_NEW;

        Task::create($data);

        return redirect()->intended('/project/read/' . $data['project_id']);
    }

    public function read(int $taskId)
    {
        $this->isAuth();

        $task = Task::where('id', $taskId)->first();

        return view('task.show', [
            'task' => $task
        ]);
    }

    public function update(Request $request, int $taskId)
    {
        $this->isAuth();

        $userId = Auth::user()->id;

        $task = Task::where('id', $taskId)->first();
        if (!$request->all()){
            return view('task.update', [
                'task' => $task
            ]);
        }

        if ($task->user_id !== $userId){
            Session::flash('error', 'You are not owner of this task');
            return redirect()->intended('/task/' . $task->project_id);
        }

        $request->validate(['name' => 'required']);

        $data = $request->all();
        unset($data['_token']);

        if ($request->file){
            $fileName = uniqid() . '_' . $request->file->getClientOriginalName();
            $request->file->move(public_path('uploads'), $fileName);
            $data['file_name'] = $fileName;
        }

        Task::whereId($taskId)->update($data);
        $task = Task::where('id', $taskId)->first();

        return view('task.update', [
            'task' => $task
        ]);
    }

    public function delete(int $taskId)
    {
        $this->isAuth();

        $task = Task::where('id', $taskId)->first();

        if ($task->user_id !== Auth::user()->id){
            Session::flash('error', 'You are not owner of this project');
            return redirect()->intended('/project');
        }

        Task::where('id', $taskId)->delete();
        return redirect()->intended('/task/' . $task->project_id);
    }

    private function isAuth()
    {
        //TODO Add user roles and permissions
        if (!Auth::user()){
            redirect()->intended('/')->send();
        }
    }
}
