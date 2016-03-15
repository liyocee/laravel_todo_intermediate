<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Repositories\TaskRepository;

class TaskController extends Controller
{

    /**
    * The task repository instance
    * @var TaskRepository
    */
    protected $tasks;
    /**
    * Create a new controller instance and authentication middleware to give access only to authenticated users
    *
    * @param TaskRepository $tasks
    * @return void
    */
    public function __construct(TaskRepository $tasks){
        $this->middleware('auth');
        $this->tasks = $tasks;
    }

    /**
      *  List all tasks
      * @param Request $request
      * @return Response
    */
    public function index(Request $request){
        return view('tasks.index',[
            'tasks'=>$this->tasks->forUser($request->user())
        ]);
    }

    /**
    Add new task

    */
    public function store(Request $request){
        $this->validate($request, [
            'name'=>'required|max:255']
        );

        // create the task
        $request->user()->tasks()->create([
            'name'=>$request->name
        ]);
        return redirect('/tasks');
    }

    /**
    * Delete a task
    * @param Request $request
    * @param Task $task
    * @return Response
    */
    public function destory(Request $request, Task $task){
        $this->authorize('destroy', $task);
        $task->delete();
        return redirect('/tasks');
    }
}
