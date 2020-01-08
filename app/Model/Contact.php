<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contacts';
    protected $fillable = ['firstName', 'lastName', 'email', 'country_id', "user_id"];

    public function country() {
        return $this->belongsTo('App\Model\Country');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }

}
