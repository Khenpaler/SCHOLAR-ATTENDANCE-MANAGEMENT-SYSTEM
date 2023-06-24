<?php

    namespace App\Models;
    use Illuminate\Database\Eloquent\Model;
    class School extends Model{
        
        protected $table = 'school_tbl';
        protected $fillable = [
            'school_name'
        ];

        public $timestamps = false;
        protected $primaryKey = 'school_id';

    }

