<?php

    namespace App\Models;
    use Illuminate\Database\Eloquent\Model;

    class Venue extends Model{
        protected $table = 'venue_tbl';
        protected $fillable = [
            'venue_name', 'venue_description', 'venue_location', 'venue_capacity'
        ];

        public $timestamps = false;
        protected $primaryKey = 'venue_id';
    }

