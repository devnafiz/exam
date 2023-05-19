<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'slug', 'description','image','user_id','price'
    ];
     protected $appends = ['image_url'];

     public function getImageUrlAttribute()
     {
     	if (empty($this->image)) {
     		return null;
     	}

       return url('/').Storage::url($this->image);

      }


    public function users(){

    	return $this->belongsTo(User::class);
    }

}
