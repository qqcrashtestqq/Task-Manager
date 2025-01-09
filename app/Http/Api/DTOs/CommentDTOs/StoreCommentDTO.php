<?php

namespace App\Http\Api\DTOs\CommentDTOs;


class StoreCommentDTO
{
    public function __construct(
        public string $comment,
        public int    $user_id,
        public int    $task_id,
        public ?int   $parent_id = null,
    )
    {


    }



    public function toArray(): array
    {
        return  [
            'comment' => $this->comment,
            'user_id' => $this->user_id,
            'task_id' => $this->task_id,
            'parent_id' => $this->parent_id,
        ];
    }


}
