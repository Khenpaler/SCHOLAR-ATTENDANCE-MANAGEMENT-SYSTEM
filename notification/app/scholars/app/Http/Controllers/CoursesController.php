<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use Illuminate\Http\Response;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;


Class CoursesController extends Controller {
    use ApiResponser;

    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function getCourses(){
        $courses = Courses::all();
        return $this -> successResponse($courses);
    }
    
    // ADD FUNCTION
    public function add(Request $request){
        
        $rules = [ 
            'courses_name' => 'required|max:50',
        ];

        $this->validate($request,$rules);
        $courses = Courses::create($request->all());
        return $this -> successResponse($courses, Response::HTTP_CREATED);
    }

    public function show($id){

        $courses = Courses::findOrFail($id);
        return $this -> successResponse($courses);
    }

     // UPDATE FUNCTION
     public function updateCourses(Request $request, $id)
     {
        $rules = [
            'courses_name' => 'required|max:50',
        ];

         $this->validate($request,$rules);
         $courses = Courses::where('courses_id', $id)->firstOrFail();
         $courses->fill($request->all());
         
        //  IF NO CHANGE HAPPENED
         if ($courses->isClean()){
            return $this->errorResponse('At least one value must change', Response::HTTP_UNPROCESSABLE_ENTITY);
         }
         $courses->save();
         return $this -> successResponse($courses);
     } 
    //  DELETE FUNCTION
     public function delete($id) {
        $courses = Courses::findOrFail($id);
        $courses->delete();
        return $this -> successResponse($courses);

    }

}


