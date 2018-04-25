<?php

namespace App;

use App\articles;

use Illuminate\Database\Eloquent\Model;

class articles extends Model
{
      public static function search_user($username)
    {
      return static::where('user_id', $username)->get();
    }

}
