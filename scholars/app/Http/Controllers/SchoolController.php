<?php

namespace App\Http\Controllers;

use App\Models\School;
use Illuminate\Http\Response;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;

Class SchoolController extends Controller {
    use ApiResponser;

    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function getSchool(){
        $school = School::all();
        return $this -> successResponse($school);
    }
    
    // ADD FUNCTION
    public function add(Request $request){
        
        $rules = [
            'school_name' => 'required|max:50',
        ];

        $this->validate($request,$rules);
        // $userjob = UserJob::findOrFail($request->jobid);
        $school = School::create($request->all());
        return $this -> successResponse($school, Response::HTTP_CREATED);
    }

    public function show($id){

        $school = School::findOrFail($id);
        return $this -> successResponse($school);
    }

     // UPDATE FUNCTION
     public function updateSchool(Request $request, $id)
     {
        $rules = [
            'school_name' => 'required|max:50',
        ];

         $this->validate($request,$rules);
        //  $userjob = UserJob::findOrFail($request->jobid);
         $school = School::where('school_id', $id)->firstOrFail();
         $school->fill($request->all());
         
        //  IF NO CHANGE HAPPENED
         if ($school->isClean()){
            return $this->errorResponse('At least one value must change', Response::HTTP_UNPROCESSABLE_ENTITY);
         }
         $school->save();
         return $this -> successResponse($school);
     } 
    //  DELETE FUNCTION
     public function delete($id) {
        $school = School::findOrFail($id);
        $school->delete();
        return $this -> successResponse($school);

    }

}


