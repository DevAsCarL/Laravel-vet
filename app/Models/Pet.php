<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;

    protected $fillable =['id','user_id','name','description'];



    public function user(){
        return $this->belongsTo(User::class);
    }

    public function date(){
        return $this->hasOne(Date::class);
    }

    public function image(){
        return $this->morphOne(Image::class,'imageable');
    }
}
