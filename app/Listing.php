<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    protected $fillable = [
        'title','description', 'price', 'square_feet','lot_size',
        'bedroom','bathroom','garage','city','country', 'thumbnail_0','thumbnail_1',
        'thumbnail_2','thumbnail_3','thumbnail_4',
        'thumbnail_5','thumbnail_6','realtor_id','is_published'
    ];


    public function realtor(){

    return $this->belongsTo(Realtor::class);
    }

}
