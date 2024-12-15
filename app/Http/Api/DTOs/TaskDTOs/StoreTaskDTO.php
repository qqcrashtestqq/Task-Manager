<?php

namespace App\Http\Api\DTOs\TaskDTOs;

class StoreTaskDTO
{
    public function __construct(
        public string $title,
        public string $description,
        public string $completed,
        public int    $user_id
    )
    {

    }


    function toArray(): array
    {
        return [
            'title' => $this->title,
            'description' => $this->description,
            'completed' => $this->completed,
            'user_id' => $this->user_id
        ];
    }

}
