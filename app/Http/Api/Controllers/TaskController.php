<?php

namespace App\Http\Api\Controllers;

use App\Http\Api\DTOs\TaskDTOs\StoreTaskDTO;
use App\Http\Api\DTOs\TaskDTOs\UpdateTaskDTO;
use App\Http\Api\Requests\StoreTaskRequest;
use App\Http\Api\Requests\UpdateTaskRequest;
use App\Http\Api\Services\TaskService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    public function  __construct(private readonly  TaskService $taskService)
    {

    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->taskService->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $storeTaskRequest)
    {
        $newTaskData = new StoreTaskDTO(... $storeTaskRequest->validated());
        return $this->taskService->store($newTaskData);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        return $this->taskService->show($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $updateTaskRequest)
    {
        $updateTaskData = new UpdateTaskDTO(... $updateTaskRequest->validated());
        return $this->taskService->update($updateTaskData);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        return $this->taskService->destroy($id);
    }
}
