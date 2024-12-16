<?php

namespace App\Http\Api\DTOs\TaskDTOs;

class  UpdateTaskDTO
{
    public function __construct(
        public int  $id,
        public ?string $title,
        public ?string $description,
        public ?int    $completed
    )
    {


    }


    public function toArray(): array
    {
        return  [
          'title' => $this->title,
          'description' => $this->description,
          'completed' => $this->completed
        ];
    }
}
