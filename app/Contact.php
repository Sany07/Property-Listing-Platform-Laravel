<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contact extends Model
{
    protected $fillable = [
        'name', 'email', 'contact_number','description','listing_id','user_id'

    ];


    public function listing(){

    return $this->belongsTo(Listing::class);
    }

    public function user(){

    return $this->belongsTo(User::class);
    }
}
