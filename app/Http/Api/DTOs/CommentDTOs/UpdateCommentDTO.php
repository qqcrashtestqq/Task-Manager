<?php
namespace App\Http\Api\DTOs\CommentDTOs;


class UpdateCommentDTO
{
    public function __construct(
        public int $id,
        public string $comment
    )
    {

    }



    public function toArray(): array
    {
        return  [
            'comment' => $this->comment
        ];
    }
}
