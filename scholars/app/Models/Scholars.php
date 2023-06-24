<?php

    namespace App\Models;
    use Illuminate\Database\Eloquent\Model;

    class Scholars extends Model{
        protected $table = 'scholars_tbl';
        protected $fillable = ['scholars_name', 'year_level', 'school_id', 'courses_id'];
        public $timestamps = false;
        protected $primaryKey = 'scholars_id';
        protected $hidden = [
            'password',
        ];
    }

