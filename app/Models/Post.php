<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
   protected $fillable=['user_id','title']; 

    public function user(){

    	return $this->belongsTo(User::class)->withDefault([
            'name'=>'gust user'
    	]);
    }

    public function tags(){
    	return $this->belongsToMany(Tag::class)
    	->withTimestamps()
    	->withPivot('status')
    	;
    }
}
