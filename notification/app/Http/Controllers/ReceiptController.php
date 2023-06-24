<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request; //Handling http request from lumen
use App\Models\Receipt; //My Model
use App\Traits\ApiResponser; //Standard API response
use DB; // can be use if not using eloquent, you can use DB component in lumen
use Illuminate\Http\Response;


Class ReceiptController extends Controller {
    use ApiResponser;

    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }
    public function getReceipt()
    {
        //Eloquent Style
        $receipt = Receipt::all();
        return $this -> successResponse($receipt); 

    }
    
    // ADD FUNCTION
    public function add(Request $request){
        
        $rules = [
            'name' => 'required|max:50',
            'email' => 'required|max:50',
        ];

        $this->validate($request,$rules);
        //$userjob = UserJob::findOrFail($request->jobid);
        $receipt = Receipt::create($request->all());
        return $this -> successResponse($receipt, Response::HTTP_CREATED);
    }

    public function show($id){

        $receipt = Receipt::findOrFail($id);
        return $this -> successResponse($receipt);       
    }

     // UPDATE FUNCTION
     public function updateUser(Request $request, $id)
     {
        $rules = [
            'name' => 'required|max:50',
            'email' => 'required|max:50',
        ];

         $this->validate($request,$rules);
         $receipt = Receipt::where('recipient_id', $id)->firstOrFail();
         $receipt->fill($request->all());

        //  IF NO CHANGE HAPPENED
         if ($receipt->isClean()){
            return $this->errorResponse('At least one value must change', Response::HTTP_UNPROCESSABLE_ENTITY);
         }
         $receipt->save();
         return $this -> successResponse($receipt);
     }
    //  DELETE FUNCTION
     public function deleteUser($id) {
        $receipt = Receipt::findOrFail($id);
        $receipt->delete();
        return $this -> successResponse($receipt);

    }
    
}


