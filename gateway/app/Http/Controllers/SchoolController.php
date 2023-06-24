<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Traits\ApiResponser;
use App\Services\SchoolService;


class SchoolController extends Controller
{
    use ApiResponser;

    public $SchoolService;

    public function __construct(SchoolService $SchoolService)
    {
        $this->SchoolService = $SchoolService;
    }

    public function getSchool()
    {
        return $this->successResponse($this->SchoolService->obtainSchool());
    }

    public function add(Request $request)
    {
        return $this->successResponse($this->SchoolService->createSchool($request->all(), Response::HTTP_CREATED));

    }

    public function show($id)
    {
        return $this->successResponse($this->SchoolService->showSchool($id));
    }
    public function update(Request $request, $id)
    {
        return $this->successResponse($this->SchoolService->updateSchool($request->all(),$id));    
    }
    public function delete($id)
    {
        return $this->successResponse($this->SchoolService->deleteSchool($id));
    }

    

}


