<?php

    namespace App\Models;
    use Illuminate\Database\Eloquent\Model;

    class Receipt extends Model{
        protected $table = 'recipient_tbl';
        protected $fillable = [
            'name','email'
        ];

        public $timestamps = false;
        protected $primaryKey = 'recipient_id';
    }

