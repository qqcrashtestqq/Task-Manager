<?php

namespace App\Http\Api\Services;

use App\Http\Api\DTOs\CommentDTOs\StoreCommentDTO;
use App\Models\Comment;

class CommentService
{


    public function index()
    {

    }

    public function store(StoreCommentDTO $storeCommentDTO)
    {
        return Comment::create($storeCommentDTO->toArray());

    }


    public function update()
    {

    }


    public function destroy()
    {

    }

}
