<?php

namespace App\Http\Api\Services;

use App\Http\Api\DTOs\TaskDTOs\StoreTaskDTO;
use App\Http\Api\DTOs\TaskDTOs\UpdateTaskDTO;
use App\Http\Api\Requests\SearchTaskRequest;
use App\Models\Task;

class TaskService
{

//    todo создание логики комментарием и ответам на комментарии
    public function index()
    {
        $allTasks = Task::select('id', 'title', 'description', 'completed', 'user_id')
            ->with('user:id,name,email')
            ->get();

        foreach ($allTasks as $task) {
            unset($task->user_id);
        }

        return response()->json($allTasks);
    }


    public function store(StoreTaskDTO $storeTaskDto)
    {
        return Task::create($storeTaskDto->toArray());

    }

    public function update(UpdateTaskDTO $updateTaskDTO)
    {
        $updateTaskData = Task::findOrFail($updateTaskDTO->id);
        $updateTaskData->update($updateTaskDTO->toArray());
        return $updateTaskData;
    }


    public function show(int $id)
    {

        $task = Task::select('title', 'description', 'user_id')
            ->with('user:id,name,email')
            ->findOrFail($id);

        unset($task->user_id);

        return response()->json($task);
    }


    public function destroy(int $id)
    {
        return Task::destroy($id);
    }


    public function search(SearchTaskRequest $searchTaskRequest)
    {
        $search = $searchTaskRequest->input('search');

        if ($search) {
            $tasks = Task::where('user_id', auth()->id())
                ->where('title', 'LIKE', '%' . $search . '%')
                ->get();
        } else {
            $tasks = Task::where('user_id', auth()->id())->get();
        }
        return $tasks;
    }
}
