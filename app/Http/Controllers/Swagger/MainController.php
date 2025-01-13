<?php

namespace App\Http\Controllers\Swagger;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * @OA\Info(
 * title= "Document for API Project",
 *  version = "1.0",
 * ),
 * @OA\PathItem(
 *  path="/api/"
 * ),
 *  User methods
 * @OA\Post(
 *     path="api/users/create",
 *     summary="create user",
 *     tags={"User CRUD"},
 *
 *     @OA\RequestBody(
 *      @OA\JsonContent(
 *          allOf = {
 *              @OA\Schema(
 *                  @OA\Property(property="name", type="string", example="Alex"),
 *                  @OA\Property(property="email", type="string", example="alex@gmail.com"),
 *                  @OA\Property(property="password", type="string", example="123456789"),
 *
 *              )
 *          }
 *      )
 *
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="create done",
 *          @OA\JsonContent(
 *
 *              @OA\Property(property="name", type="string", example="Alex"),
 *              @OA\Property(property="email", type="string", example="alex@gmail.com"),
 *              @OA\Property(property="password", type="string", example="hash passord"),
 *              @OA\Property(property="createAdd", type="string", example= "2025-01-13T12:59:48.000000Z"),
 *              @OA\Property(property="updateAdd", type="string", example= "2025-01-13T12:59:48.000000Z"),
 *              @OA\Property(property="id", type="int", example= 1),
 *              @OA\Property(property="role", type="object", example= ["id", "name"]),
 *          )
 *     ),
 * ),
 *
 *
 *
 *
 *
 *
 *
 * */
class MainController extends Controller
{
    //
}
