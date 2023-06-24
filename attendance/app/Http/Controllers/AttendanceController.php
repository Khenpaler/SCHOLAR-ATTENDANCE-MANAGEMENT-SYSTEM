<?php

namespace App\Http\Controllers;
use App\Models\Attendance;
use Scholars\App\Models\Scholars;
use Illuminate\Http\Response;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;


Class AttendanceController extends Controller {
    use ApiResponser;

    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    // Get attendance
    public function getAttendance(){
        $attendance = Attendance::all();
        return $this -> successResponse($attendance);
    }

    // get specific attendance

    public function show($id){
        $attendance =  Attendance::findOrFail($id);
        return $this->successResponse($attendance);
    }

    // add attendance

    public function add(Request $request){
        $rules = [
            'record_date' => 'required|max:50',
            'record_status' => 'in:Present,Absent,Late',
        ];

        $this->validate($request,$rules);
        $attendance = Attendance::create($request->all());
        return $this -> successResponse($attendance, Response::HTTP_CREATED);
    }

    // update attendance
    public function updateAttendance(Request $request, $id){
        $rules = [
            'record_date' => 'required|max:50',
            'record_status' => 'in:Present,Absent,Late',
        ];

        $this->validate($request,$rules);
         $attendance = Attendance::where('attendance_id', $id)->firstOrFail();
         $attendance->fill($request->all());

         //  IF NO CHANGE HAPPENED
         if ($attendance->isClean()){
            return $this->errorResponse('At least one value must change', Response::HTTP_UNPROCESSABLE_ENTITY);
         }
         $attendance->save();
         return $this -> successResponse($attendance);
    }

    // delete attendance
    public function delete($id){
        $attendance = Attendance::findOrFail($id);
        $attendance->delete();
        return $this -> successResponse($attendance);
    }
}


