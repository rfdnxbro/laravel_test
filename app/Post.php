<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable = ['title', 'content'];

    /**
     * ユーザーを取得
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
