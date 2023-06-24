<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request; //Handling http request from lumen
use App\Models\Venue; //Venue MODEL
use App\Traits\ApiResponser; //Standard API response
use DB; // can be use if not using eloquent, you can use DB component in lumen
use Illuminate\Http\Response;


Class VenueController extends Controller {
    use ApiResponser;

    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function getVenue(){
        $venue = Venue::all();
        return $this -> successResponse($venue);
    }
    
    // ADD FUNCTION
    public function add(Request $request){
        
        $rules = [
            'venue_name' => 'required|max:50',
            'venue_description' => 'required|max:50',
            'venue_location' => 'required|max:50',
            'venue_capacity' => 'required|numeric|min:1|not_in:0',

        ];

        $this->validate($request,$rules);
        $venue = Venue::create($request->all());
        return $this -> successResponse($venue, Response::HTTP_CREATED);
    }

    public function show($id){

        $venue = Venue::findOrFail($id);
        return $this -> successResponse($venue);
    }

     // UPDATE FUNCTION
     public function updateVenue(Request $request, $id)
     {
        $rules = [
            'venue_name' => 'required|max:50',
            'venue_description' => 'required|max:50',
            'venue_location' => 'required|max:50',
            'venue_capacity' => 'required|numeric|min:1|not_in:0',
        ];

         $this->validate($request,$rules);
        //  $userjob = UserJob::findOrFail($request->jobid);
         $venue = Venue::where('venue_id', $id)->firstOrFail();
         $venue->fill($request->all());
         
        //  IF NO CHANGE HAPPENED
         if ($venue->isClean()){
            return $this->errorResponse('At least one value must change', Response::HTTP_UNPROCESSABLE_ENTITY);
         }
         $venue->save();
         return $this -> successResponse($venue);
     } 
    //  DELETE FUNCTION
     public function delete($id) {
        $venue = Venue::findOrFail($id);
        $venue->delete();
        return $this -> successResponse($venue);

    }
    
}


