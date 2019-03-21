<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Post;

class Category extends Model
{
    use SoftDeletes;
    protected $guarded =[];



//relationship between category & post
   public function post(){

    	return $this->hasMany(Post::class)->withTrashed();
    }

}
