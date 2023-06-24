<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request; //Handling http request from lumen
use App\Models\Sender; //My Model
use App\Traits\ApiResponser; //Standard API response
use DB; // can be use if not using eloquent, you can use DB component in lumen
use Illuminate\Http\Response;


Class SenderController extends Controller {
    use ApiResponser;

    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }
    public function getSender()
    {
        //Eloquent Style
        $sender = Sender::all();
        return $this -> successResponse($sender); 

    }
    
    // ADD FUNCTION
    public function add(Request $request){
        
        $rules = [
            'name' => 'required|max:50',
        ];

        $this->validate($request,$rules);
        //$userjob = UserJob::findOrFail($request->jobid);
        $sender = Sender::create($request->all());
        return $this -> successResponse($sender, Response::HTTP_CREATED);
    }

    public function show($id){

        $sender = Sender::findOrFail($id);
        return $this -> successResponse($sender);       
    }

     // UPDATE FUNCTION
     public function updateUser(Request $request, $id)
     {
        $rules = [
            'name' => 'required|max:50',
        ];

         $this->validate($request,$rules);
         $sender = Sender::where('sender_id', $id)->firstOrFail();
         $sender->fill($request->all());

        //  IF NO CHANGE HAPPENED
         if ($sender->isClean()){
            return $this->errorResponse('At least one value must change', Response::HTTP_UNPROCESSABLE_ENTITY);
         }
         $sender->save();
         return $this -> successResponse($sender);
     }
    //  DELETE FUNCTION
     public function deleteUser($id) {
        $sender = Sender::findOrFail($id);
        $sender->delete();
        return $this -> successResponse($sender);

    }
    
}


