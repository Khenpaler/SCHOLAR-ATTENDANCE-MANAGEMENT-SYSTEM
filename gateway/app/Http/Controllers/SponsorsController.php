<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Traits\ApiResponser;
use App\Services\SponsorsService;


class SponsorsController extends Controller
{
    use ApiResponser;

    public $SponsorsService;

    public function __construct(SponsorsService $SponsorsService)
    {
        $this->SponsorsService = $SponsorsService;
    }

    public function getSponsors()
    {
        return $this->successResponse($this->SponsorsService->obtainSponsors());
    }

    public function add(Request $request)
    {
        return $this->successResponse($this->SponsorsService->createSponsors($request->all(), Response::HTTP_CREATED));

    }

    public function show($id)
    {
        return $this->successResponse($this->SponsorsService->showSponsors($id));
    }
    public function update(Request $request, $id)
    {
        return $this->successResponse($this->SponsorsService->updateSponsors($request->all(),$id));    
    }
    public function delete($id)
    {
        return $this->successResponse($this->SponsorsService->deleteSponsors($id));
    }


}
