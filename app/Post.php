<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title', 'body', 'user_id','category_id','photo_id',
    ];


    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }

    public function photo()
    {
        return $this->belongsTo('App\Photo','photo_id','id');
    }

    public function category()
    {
        return $this->belongsTo('App\Category','category_id','id');
    }


    public function getPhotoIDAttribute($photo_id)
    {
        if($photo_id)
        {
            return $photo_id; // TODO: before show in view
        }
        else return "0";


    }
}
