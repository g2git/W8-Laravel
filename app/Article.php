<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
      public function Comments()
  {
      return $this->hasMany('App\Comment');
  }

    public function user()
  {
      return $this->belongsTo('App\User');
  }

}
