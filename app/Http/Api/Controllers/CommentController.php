<?php

namespace App\Http\Api\Controllers;

use App\Http\Api\DTOs\CommentDTOs\StoreCommentDTO;
use App\Http\Api\DTOs\CommentDTOs\UpdateCommentDTO;
use App\Http\Api\Requests\StoreCommentRequest;
use App\Http\Api\Requests\UpdateCommentRequest;
use App\Http\Api\Services\CommentService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct(private readonly CommentService $commentService) {}


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->commentService->index();
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
    public function store(StoreCommentRequest $storeCommentRequest)
    {
        $newCommentData = new StoreCommentDTO(... $storeCommentRequest->validated());
        return $this->commentService->store($newCommentData);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $commitId)
    {
        return $this->commentService->show($commitId);
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
    public function update(UpdateCommentRequest $updateCommentRequest)
    {
        $updateCommentData = new UpdateCommentDTO(... $updateCommentRequest->validated());
        return $this->commentService->update($updateCommentData);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $commentId)
    {
        return $this->commentService->destroy($commentId);
    }
}
