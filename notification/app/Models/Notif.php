<?php

    namespace App\Models;
    use Illuminate\Database\Eloquent\Model;

    class Notif extends Model{
        protected $table = 'notification_tbl';
        protected $fillable = [
            'title','message','timestamp','sender_id', 'recipient_id'
        ];

        public $timestamps = false;
        protected $primaryKey = 'notif_id';
    }

