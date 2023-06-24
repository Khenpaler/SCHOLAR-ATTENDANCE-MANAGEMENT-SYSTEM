<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request; //Handling http request from lumen
use App\Models\Event; //Event Model
use App\Models\Sponsors; //Sponsors Model
use App\Models\Venue; //Venue Model
use App\Traits\ApiResponser; //Standard API response
use DB; // can be use if not using eloquent, you can use DB component in lumen
use Illuminate\Http\Response;


Class EventController extends Controller {
    use ApiResponser;

    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function getEvent(){
        $event = Event::all();
        return $this -> successResponse($event);
    }
    
    // ADD FUNCTION
    public function add(Request $request){
        
        $rules = [
            'event_name' => 'required|max:50',
            'event_description' => 'required|max:50',
            'event_date'=>'required',
            'sponsors_id' => 'required|numeric|min:1|not_in:0',
            'venue_id' => 'required|numeric|min:1|not_in:0',
        ];

        $this->validate($request,$rules);
        $sponsors = Sponsors::findOrFail($request->sponsors_id);
        $venue = Venue::findOrFail($request->venue_id);
        $event = Event::create($request->all());
        return $this -> successResponse($event, Response::HTTP_CREATED);
    }

    public function show($id){

        $event = Event::findOrFail($id);
        return $this -> successResponse($event);
    }

     // UPDATE FUNCTION
     public function updateEvent(Request $request, $id)
     {
        $rules = [
            'event_name' => 'required|max:50',
            'event_description' => 'required|max:50',
            'event_date'=>'required',
            'sponsors_id' => 'required|numeric|min:1|not_in:0',
            'venue_id' => 'required|numeric|min:1|not_in:0',
        ];

         $this->validate($request,$rules);
         $event = Event::where('event_id', $id)->firstOrFail();
         $sponsors = Sponsors::findOrFail($request->sponsors_id);
         $venue = Venue::findOrFail($request->venue_id);
         $event->fill($request->all());
         
        //  IF NO CHANGE HAPPENED
         if ($event->isClean()){
            return $this->errorResponse('At least one value must change', Response::HTTP_UNPROCESSABLE_ENTITY);
         }
         $event->save();
         return $this -> successResponse($event);
     } 
    //  DELETE FUNCTION
     public function delete($id) {
        $event = Event::findOrFail($id);
        $event->delete();
        return $this -> successResponse($event);

    }
    
}


