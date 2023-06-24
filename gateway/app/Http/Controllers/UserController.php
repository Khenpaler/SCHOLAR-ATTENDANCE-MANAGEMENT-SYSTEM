<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Traits\ApiResponser;
use App\Services\UserService;


class UserController extends Controller
{
    use ApiResponser;

    public $UserService;

    public function __construct(UserService $UserService)
    {
        $this->UserService = $UserService;
    }

    public function getUser()
    {
        return $this->successResponse($this->UserService->obtainUser());
    }

    public function add(Request $request)
    {
        return $this->successResponse($this->UserService->createUser($request->all(), Response::HTTP_CREATED));

    }

    public function show($id)
    {
        return $this->successResponse($this->UserService->showUser($id));
    }
    public function update(Request $request, $id)
    {
        return $this->successResponse($this->UserService->updateUser($request->all(),$id));    
    }
    public function delete($id)
    {
        return $this->successResponse($this->UserService->deleteUser($id));
    }


}
