<?php

    namespace App\Models;
    use Illuminate\Database\Eloquent\Model;

    class Event extends Model{
        protected $table = 'event_tbl';
        protected $fillable = [
            'event_name','event_description','event_date','sponsors_id', 'venue_id'
        ];

        public $timestamps = false;
        protected $primaryKey = 'event_id';
    }

