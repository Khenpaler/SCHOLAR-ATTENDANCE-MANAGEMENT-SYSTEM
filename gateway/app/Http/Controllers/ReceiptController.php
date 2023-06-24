<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Traits\ApiResponser;
use App\Services\ReceiptService;


class ReceiptController extends Controller
{
    use ApiResponser;

    public $ReceiptService;

    public function __construct(ReceiptService $ReceiptService)
    {
        $this->ReceiptService = $ReceiptService;
    }

    public function getReceipt()
    {
        return $this->successResponse($this->ReceiptService->obtainReceipt());
    }

    public function add(Request $request)
    {
        return $this->successResponse($this->ReceiptService->createReceipt($request->all(), Response::HTTP_CREATED));

    }

    public function show($id)
    {
        return $this->successResponse($this->ReceiptService->showReceipt($id));
    }
    public function update(Request $request, $id)
    {
        return $this->successResponse($this->ReceiptService->updateReceipt($request->all(),$id));    
    }
    public function delete($id)
    {
        return $this->successResponse($this->ReceiptService->deleteReceipt($id));
    }


}
