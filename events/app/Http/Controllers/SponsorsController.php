<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request; //Handling http request from lumen
use App\Models\Sponsors; //SPONSORS MODEL
use App\Traits\ApiResponser; //Standard API response
use DB; // can be use if not using eloquent, you can use DB component in lumen
use Illuminate\Http\Response;


Class SponsorsController extends Controller {
    use ApiResponser;

    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function getSponsors(){
        $sponsors = Sponsors::all();
        return $this -> successResponse($sponsors);
    }
    
    // ADD FUNCTION
    public function add(Request $request){
        
        $rules = [
            'sponsors_name' => 'required|max:50',
        ];

        $this->validate($request,$rules);
        $sponsors = Sponsors::create($request->all());
        return $this -> successResponse($sponsors, Response::HTTP_CREATED);
    }

    public function show($id){

        $sponsors = Sponsors::findOrFail($id);
        return $this -> successResponse($sponsors);
    }

     // UPDATE FUNCTION
     public function updateSponsors(Request $request, $id)
     {
        $rules = [
            'sponsors_name' => 'required|max:50',
        ];

         $this->validate($request,$rules);
        //  $userjob = UserJob::findOrFail($request->jobid);
         $sponsors = Sponsors::where('sponsors_id', $id)->firstOrFail();
         $sponsors->fill($request->all());
         
        //  IF NO CHANGE HAPPENED
         if ($sponsors->isClean()){
            return $this->errorResponse('At least one value must change', Response::HTTP_UNPROCESSABLE_ENTITY);
         }
         $sponsors->save();
         return $this -> successResponse($sponsors);
     } 
    //  DELETE FUNCTION
     public function delete($id) {
        $sponsors = Sponsors::findOrFail($id);
        $sponsors->delete();
        return $this -> successResponse($sponsors);

    }
    
}


