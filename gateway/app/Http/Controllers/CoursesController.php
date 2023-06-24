<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Traits\ApiResponser;
use App\Services\CoursesService;


class CoursesController extends Controller
{
    use ApiResponser;

    public $CoursesService;

    public function __construct(CoursesService $CoursesService)
    {
        $this->CoursesService = $CoursesService;
    }

    public function getCourses()
    {
        return $this->successResponse($this->CoursesService->obtainCourses());
    }

    public function add(Request $request)
    {
        return $this->successResponse($this->CoursesService->createCourses($request->all(), Response::HTTP_CREATED));

    }

    public function show($id)
    {
        return $this->successResponse($this->CoursesService->showCourses($id));
    }
    public function update(Request $request, $id)
    {
        return $this->successResponse($this->CoursesService->updateCourses($request->all(),$id));    
    }
    public function delete($id)
    {
        return $this->successResponse($this->CoursesService->deleteCourses($id));
    }

    

}


