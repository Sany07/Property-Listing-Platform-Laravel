<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Realtor extends Model
{
    protected $fillable = [
        'name','address', 'email', 'contact_number'

    ];


    public function listing(){

        return $this->belongsTo(listing::class);
    }

    public function realtor(){

        return $this->belongsTo(Realtor::class);
    }
}
