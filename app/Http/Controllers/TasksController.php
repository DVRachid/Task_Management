<?php

namespace App\Http\Controllers;

use App\Models\Tasks;
use App\Http\Requests\StoreTasksRequest;
use App\Http\Requests\UpdateTasksRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Tasks::paginate(8);
        return Inertia::render(
            'Index',
            [
                "tasks" => $tasks->map(function ($task) {
                    return [
                        "id" => $task->id,
                        "title" => $task->title,
                        "description" => $task->description,
                        "status" => $task->status,
                        "datedue" => $task->datedue
                    ];
                    
                }),
                "pagination" => [
                    "total" => $tasks->total(),
                    "per_page" => $tasks->perPage(),
                    "current_page" => $tasks->currentPage(),
                    "last_page" => $tasks->lastPage(),
                    "prev_page_url" => $tasks->previousPageUrl(),
                    "next_page_url" => $tasks->nextPageUrl(),
                ],
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render("Create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTasksRequest $request)
    {
        $rules = [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|string',
            'datedue' => 'required|date|after:today',
        ];


        $validate = $request->validate($rules);
        Tasks::create($validate);
        return Redirect::route("tasks.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Tasks $tasks)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tasks $tasks)
    {


        return Inertia::render("Edit", [
            "task" => $tasks
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTasksRequest $request, Tasks $tasks)
    {
        $rules = [
            'title' => 'required|max:255',
            'description' => 'nullable',
            'status' => 'required',
            'datedue' => 'required|after:today',
        ];


        $validate = $request->validate($rules);
        $tasks->update($validate);
        return Redirect::route("tasks.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tasks $tasks)
    {
        $tasks->delete();
        return Redirect::route('tasks.index');
    }

    public function filterByStatus($status)
    {
        
        $filteredTasks = Tasks::where('status', $status)->get();

        return Inertia::render('Filter', ['tasks' => $filteredTasks->map(function ($task) {
            return [
                "id" => $task->id,
                "title" => $task->title,
                "description" => $task->description,
                "status" => $task->status,
                "datedue" => $task->datedue
            ];
        }),]);
    }

    public function sort()
   {
    $tasks = Tasks::orderBy('datedue')->get();
   

    return Inertia::render('Sort', ['tasks' =>$tasks->map(function ($task) {
        return [
            "id" => $task->id,
            "title" => $task->title,
            "description" => $task->description,
            "status" => $task->status,
            "datedue" => $task->datedue
        ];
    }),]);
   
}

}
