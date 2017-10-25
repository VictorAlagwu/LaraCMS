<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentReply extends Model
{
    //
    protected $fillable = [
    	'body',
    	'email',
    	'author'
    ];

    public function comment(){
    	return $this->belongsTo('App\Comment');
    }
}
