<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Traits\ApiResponser;
use App\Services\RoleService;


class RoleController extends Controller
{
    use ApiResponser;

    public $RoleService;

    public function __construct(RoleService $RoleService)
    {
        $this->RoleService = $RoleService;
    }

    public function getRole()
    {
        return $this->successResponse($this->RoleService->obtainRole());
    }

    public function add(Request $request)
    {
        return $this->successResponse($this->RoleService->createRole($request->all(), Response::HTTP_CREATED));

    }

    public function show($id)
    {
        return $this->successResponse($this->RoleService->showRole($id));
    }
    public function update(Request $request, $id)
    {
        return $this->successResponse($this->RoleService->updateRole($request->all(),$id));    
    }
    public function delete($id)
    {
        return $this->successResponse($this->RoleService->deleteRole($id));
    }


}
