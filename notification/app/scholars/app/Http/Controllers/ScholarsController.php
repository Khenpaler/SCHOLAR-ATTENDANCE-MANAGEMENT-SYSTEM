<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use App\Models\Scholars;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;

Class ScholarsController extends Controller {
    use ApiResponser;

    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    // Get scholars
    public function getScholars(){
        $scholars = Scholars::all();
        return $this -> successResponse($scholars);
    }

    // get specific scholars

    public function show($id){
        $scholars =  Scholars::findOrFail($id);
        return $this->successResponse($scholars);
    }

    // add scholars
    //scholars_username','scholars_password', 'scholars_name', 'year_level', 'school_id', 'courses_id

    public function add(Request $request){
        $rules = [
            'scholars_name'=>'required|max:50',
            'year_level' => 'required|in:1, 2, 3, 4, 5',
            'school_id' => 'required|numeric|min:1|not_in:0',
            'courses_id' => 'required|numeric|min:1|not_in:0',
        ];

        $this->validate($request,$rules);
        $scholars = Scholars::create($request->all());
        return $this -> successResponse($scholars, Response::HTTP_CREATED);
    }

    // update scholars
    public function updateScholars(Request $request, $id){
        $rules = [
            'scholars_name'=>'required|max:50',
            'year_level' => 'required|in:1, 2, 3, 4, 5',
            'school_id' => 'required|numeric|min:1|not_in:0',
            'courses_id' => 'required|numeric|min:1|not_in:0',
        ];

        $this->validate($request,$rules);
         $scholars = Scholars::where('scholars_id', $id)->firstOrFail();
        //  nako butang dre
         $scholars->fill($request->all());

         //  IF NO CHANGE HAPPENED
         if ($scholars->isClean()){
            return $this->errorResponse('At least one value must change', Response::HTTP_UNPROCESSABLE_ENTITY);
         }
         $scholars->save();
         return $this -> successResponse($scholars);
    }

    // delete scholars
    public function delete($id){
        $scholars = Scholars::findOrFail($id);
        $scholars->delete();
        return $this -> successResponse($scholars);
    }
}




