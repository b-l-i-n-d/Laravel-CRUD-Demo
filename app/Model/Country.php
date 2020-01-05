<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'countries';
    protected $fillable = ['countryName'];

    public function contacts() {
        return $this->hasMany('App\Model\Contact');
    }
}
