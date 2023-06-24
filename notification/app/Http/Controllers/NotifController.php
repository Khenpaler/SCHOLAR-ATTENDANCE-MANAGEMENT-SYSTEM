<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request; //Handling http request from lumen
use App\Models\Notif; //My Model
use App\Models\Receipt; //My Model
use App\Models\Sender; //My Model
use App\Traits\ApiResponser; //Standard API response
use DB; // can be use if not using eloquent, you can use DB component in lumen
use Illuminate\Http\Response;


Class NotifController extends Controller {
    use ApiResponser;

    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }
    public function getNotif()
    {
        //Eloquent Style
        $notif = Notif::all();
        return $this -> successResponse($notif); 

    }
    
    // ADD FUNCTION
    public function add(Request $request){
        
        $rules = [
            'title' => 'required|max:50',
            'message' => 'required|max:50',
            'sender_id' => 'required|numeric|min:1|not_in:0',
            'recipient_id' => 'required|numeric|min:1|not_in:0',
            'timestamp' => 'required|max:50',   
        ];

        $this->validate($request,$rules);
        // $receipt = Receipt::findOrFail($request->jobid);
        // $sender = Sender::findOrFail($request->jobid);
        $notif = Notif::create($request->all());
        return $this -> successResponse($notif, Response::HTTP_CREATED);
    }

    public function show($id){

        $notif = Notif::findOrFail($id);
        return $this -> successResponse($notif);       
    }

     // UPDATE FUNCTION
     public function updateUser(Request $request, $id)
     {
        $rules = [
            'title' => 'required|max:50',
            'message' => 'required|max:50',
            'sender_id' => 'required|numeric|min:1|not_in:0',
            'recipient_id' => 'required|numeric|min:1|not_in:0',
        ];

         $this->validate($request,$rules);
         $notif = Notif::where('notif_id', $id)->firstOrFail();
         $notif->fill($request->all());

        //  IF NO CHANGE HAPPENED
         if ($notif->isClean()){
            return $this->errorResponse('At least one value must change', Response::HTTP_UNPROCESSABLE_ENTITY);
         }
         $notif->save();
         return $this -> successResponse($notif);
     }
    //  DELETE FUNCTION
     public function deleteUser($id) {
        $notif = Notif::findOrFail($id);
        $notif->delete();
        return $this -> successResponse($notif);

    }
    
}


