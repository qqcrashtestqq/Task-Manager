<?php

namespace App\Http\Api\Services;

use App\Http\Api\DTOs\TaskDTOs\StoreTaskDTO;
use App\Http\Api\DTOs\TaskDTOs\UpdateTaskDTO;
use App\Http\Api\Requests\SearchTaskRequest;
use App\Models\Task;

class TaskService
{

    public function index()
    {
        return Task::get();
    }


    public function store(StoreTaskDTO $storeTaskDto)
    {
        return  Task::create($storeTaskDto->toArray());

    }

    public function  update(UpdateTaskDTO $updateTaskDTO)
    {
        $updateTaskData = Task::findOrFail($updateTaskDTO->id);
        $updateTaskData->update($updateTaskDTO->toArray());
        return $updateTaskData;
    }


    public function  show(int $id)
    {
        return Task::findOrFail($id);
    }


    public function destroy(int $id)
    {
        return Task::destroy($id);
    }


    public function search(SearchTaskRequest $searchTaskRequest)
    {
        $search = $searchTaskRequest->input('search');

        if($search)
        {
            $tasks = Task::where('user_id', auth()->id())
            ->where('title', 'LIKE', '%'. $search . '%')
            ->get();
        } else
        {
            $tasks =  Task::where('user_id', auth()->id())->get();
        }
        return response()->json($tasks);
    }
}
