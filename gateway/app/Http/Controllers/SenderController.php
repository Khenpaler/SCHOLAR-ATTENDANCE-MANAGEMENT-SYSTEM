<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Traits\ApiResponser;
use App\Services\SenderService;


class SenderController extends Controller
{
    use ApiResponser;

    public $SenderService;

    public function __construct(SenderService $SenderService)
    {
        $this->SenderService = $SenderService;
    }

    public function getSender()
    {
        return $this->successResponse($this->SenderService->obtainSender());
    }

    public function add(Request $request)
    {
        return $this->successResponse($this->SenderService->createSender($request->all(), Response::HTTP_CREATED));

    }

    public function show($id)
    {
        return $this->successResponse($this->SenderService->showSender($id));
    }
    public function update(Request $request, $id)
    {
        return $this->successResponse($this->SenderService->updateSender($request->all(),$id));    
    }
    public function delete($id)
    {
        return $this->successResponse($this->SenderService->deleteSender($id));
    }


}
