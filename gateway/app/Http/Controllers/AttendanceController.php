<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Traits\ApiResponser;
use App\Services\AttendanceService;


class AttendanceController extends Controller
{
    use ApiResponser;

    public $AttendanceService;

    public function __construct(AttendanceService $AttendanceService)
    {
        $this->AttendanceService = $AttendanceService;
    }

    public function getAttendance()
    {
        return $this->successResponse($this->AttendanceService->obtainAttendance());
    }

    public function add(Request $request)
    {
        return $this->successResponse($this->AttendanceService->createAttendance($request->all(), Response::HTTP_CREATED));

    }

    public function show($id)
    {
        return $this->successResponse($this->AttendanceService->showAttendance($id));
    }
    public function update(Request $request, $id)
    {
        return $this->successResponse($this->AttendanceService->updateAttendance($request->all(),$id));    
    }
    public function delete($id)
    {
        return $this->successResponse($this->AttendanceService->deleteAttendance($id));
    }


}
