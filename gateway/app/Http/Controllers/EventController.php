<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Traits\ApiResponser;
use App\Services\EventService;


class EventController extends Controller
{
    use ApiResponser;

    public $EventService;

    public function __construct(EventService $EventService)
    {
        $this->EventService = $EventService;
    }

    public function getEvent()
    {
        return $this->successResponse($this->EventService->obtainEvent());
    }

    public function add(Request $request)
    {
        return $this->successResponse($this->EventService->createEvent($request->all(), Response::HTTP_CREATED));

    }

    public function show($id)
    {
        return $this->successResponse($this->EventService->showEvent($id));
    }
    public function update(Request $request, $id)
    {
        return $this->successResponse($this->EventService->updateEvent($request->all(),$id));    
    }
    public function delete($id)
    {
        return $this->successResponse($this->EventService->deleteEvent($id));
    }


}
