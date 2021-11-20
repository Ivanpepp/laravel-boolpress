<?php

namespace App\Models;
use App\User;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable =['title', 'author', 'content', 'url','date','category_id'];

      //
      public function category(){
        return $this->belongsTo('App\Models\Category');
    }
 /*    public function author(){
      return $this->belongsTo('App\User','user_id');
  } */
/*   public function user(){
    return $this->belongsTo('App\User');
} */
  
}