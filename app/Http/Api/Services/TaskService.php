<?php

namespace App\Http\Api\Services;

use App\Http\Api\DTOs\TaskDTOs\StoreTaskDTO;
use App\Http\Api\DTOs\TaskDTOs\UpdateTaskDTO;
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

}
