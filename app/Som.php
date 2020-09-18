<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Som extends Model
{
    protected $fillable = [
        'realtor_id'

    ];


    public function realtor(){

        return $this->belongsTo(Realtor::class);
    }
}
