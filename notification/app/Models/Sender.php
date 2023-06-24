<?php

    namespace App\Models;
    use Illuminate\Database\Eloquent\Model;

    class Sender extends Model{
        protected $table = 'sender_tbl';
        protected $fillable = [
            'name'
        ];

        public $timestamps = false;
        protected $primaryKey = 'sender_id';
    }

