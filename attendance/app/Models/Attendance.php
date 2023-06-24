<?php

    namespace App\Models;
    use Illuminate\Database\Eloquent\Model;

    class Attendance extends Model{

        protected $table = 'attendance_tbl';

        protected $fillable = [
             'scholars_id', 'event_id' ,'record_date', 'record_status'
        ];

        public $timestamps = false;
        protected $primaryKey = 'attendance_id';
    }

