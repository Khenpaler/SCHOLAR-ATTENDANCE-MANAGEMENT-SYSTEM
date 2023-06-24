<?php

    namespace App\Models;
    use Illuminate\Database\Eloquent\Model;
    class Courses extends Model{

        protected $table = 'courses_tbl';
        protected $fillable = [
            'courses_name'   
        ];

        public $timestamps = false;
        protected $primaryKey = 'courses_id';

    }

