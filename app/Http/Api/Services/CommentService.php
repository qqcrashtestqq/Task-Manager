<?php

namespace App\Http\Api\Services;

use App\Http\Api\DTOs\CommentDTOs\StoreCommentDTO;
use App\Models\Comment;

class CommentService
{


    public function index()
    {
        $AllComments = Comment::select('comment', 'user_id', 'task_id', 'parent_id')
            ->with([
                'user:id,name,email',
                'task:id,title,description'
            ])
            ->get();

        foreach ($AllComments as $comment)
        {
            unset($comment->user_id, $comment->task_id);
        }
        return response()->json($AllComments);
    }

    public function store(StoreCommentDTO $storeCommentDTO)
    {

        if ($storeCommentDTO->parent_id) {
            $parentComment = Comment::findOrFail($storeCommentDTO->parent_id);
            $storeCommentDTO->parent_id = $parentComment->id;
        }

        return Comment::create($storeCommentDTO->toArray());
    }


    public function update()
    {

    }


    public function destroy(int $commentId)
    {
        return Comment::destroy($commentId);
    }

}
