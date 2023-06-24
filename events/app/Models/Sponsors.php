<?php

    namespace App\Models;
    use Illuminate\Database\Eloquent\Model;

    class Sponsors extends Model{
        protected $table = 'sponsors_tbl';
        protected $fillable = [
            'sponsors_name'
        ];

        public $timestamps = false;
        protected $primaryKey = 'sponsors_id';
    }

