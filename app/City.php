<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'cities';
    protected $fillable = ['country_id','name','timezone'];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
