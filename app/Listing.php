<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    protected $fillable = [
        'title','description', 'price', 'square_feet','lot_size',
        'bedroom','garage', 'main_thumbnail','extra_thumbnail_1',
        'extra_thumbnail_2','extra_thumbnail_3','extra_thumbnail_4',
        'extra_thumbnail_5','extra_thumbnail_6','realtor_id','is_published'
    ];


public function realtor(){

    return $this->hasOne(Realtor::class);
}

}
