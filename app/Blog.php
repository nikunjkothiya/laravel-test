<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $guarded = [];
    protected $table = "blogs";
   
    public function user() {
        return $this->belongsTo('App\User');
    }
}
