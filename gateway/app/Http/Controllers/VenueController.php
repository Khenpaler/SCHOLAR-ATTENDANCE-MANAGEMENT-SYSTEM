<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Traits\ApiResponser;
use App\Services\VenueService;


class VenueController extends Controller
{
    use ApiResponser;

    public $VenueService;

    public function __construct(VenueService $VenueService)
    {
        $this->VenueService = $VenueService;
    }

    public function getVenue()
    {
        return $this->successResponse($this->VenueService->obtainVenue());
    }

    public function add(Request $request)
    {
        return $this->successResponse($this->VenueService->createVenue($request->all(), Response::HTTP_CREATED));

    }

    public function show($id)
    {
        return $this->successResponse($this->VenueService->showVenue($id));
    }
    public function update(Request $request, $id)
    {
        return $this->successResponse($this->VenueService->updateVenue($request->all(),$id));    
    }
    public function delete($id)
    {
        return $this->successResponse($this->VenueService->deleteVenue($id));
    }


}
