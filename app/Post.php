<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 
use App\Category;
use App\User;

class Post extends Model
{
   use SoftDeletes;
 protected $guarded=[];

 //relation between post & category
 public function category(){
 	return $this->belongsTo( Category::class, 'category_id')->withTrashed();
 }
 public function user(){
   return $this->belongsTo(User::class, 'added_by')->withTrashed();
 }
}
