<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Traits\ApiResponser;
use App\Services\ScholarsService;


class ScholarsController extends Controller
{
    use ApiResponser;

    public $ScholarsService;

    public function __construct(ScholarsService $ScholarsService)
    {
        $this->ScholarsService = $ScholarsService;
    }

    public function getScholars()
    {
        return $this->successResponse($this->ScholarsService->obtainScholars());
    }

    public function add(Request $request)
    {
        return $this->successResponse($this->ScholarsService->createScholars($request->all(), Response::HTTP_CREATED));

    }

    public function show($id)
    {
        return $this->successResponse($this->ScholarsService->showScholars($id));
    }
    public function update(Request $request, $id)
    {
        return $this->successResponse($this->ScholarsService->updateScholars($request->all(),$id));    
    }
    public function delete($id)
    {
        return $this->successResponse($this->ScholarsService->deleteScholars($id));
    }

    

}