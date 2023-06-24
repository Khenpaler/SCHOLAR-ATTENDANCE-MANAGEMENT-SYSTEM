<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Traits\ApiResponser;
use App\Services\NotifService;


class NotifController extends Controller
{
    use ApiResponser;

    public $NotifService;

    public function __construct(NotifService $NotifService)
    {
        $this->NotifService = $NotifService;
    }

    public function getNotif()
    {
        return $this->successResponse($this->NotifService->obtainNotif());
    }

    public function add(Request $request)
    {
        return $this->successResponse($this->NotifService->createNotif($request->all(), Response::HTTP_CREATED));

    }

    public function show($id)
    {
        return $this->successResponse($this->NotifService->showNotif($id));
    }
    public function update(Request $request, $id)
    {
        return $this->successResponse($this->NotifService->updateNotif($request->all(),$id));    
    }
    public function delete($id)
    {
        return $this->successResponse($this->NotifService->deleteNotif($id));
    }


}
