<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'title', 'description'];

    public function users(){

    	return $this->belongsTo(User::class,'user_id','id');
    }

    public function ratings()
    {
      return $this->hasMany(Rating::class);
    }
}
