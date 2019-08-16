<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'content'
    ];

    public static function valid()
    {
        return array(
            'content' => 'required',
        );
    }

    public function comments()
    {
        return $this->hasMany('App\Comment', 'article_id');
    }

    public function users()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function images()
    {
        return $this->hasOne('App\Image', 'article_id');
    }
}
