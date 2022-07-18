<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Date extends Model
{
    use HasFactory;

    protected $fillable = ['reserved_at','service_id','pet_id','user_id','schedule_id','client_id','title','description'];
    
    protected $hidden =['reserved_at'];

    protected $appends =['start'];

    public function getStartAttribute()
    {
        return $this->attributes['reserved_at'];
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function pet(){
        return $this->hasOne(Pet::class);
    }

    public function service(){
        return $this->belongsTo(Service::class);
    }

    public function schedule(){
        return $this->hasOne(Schedule::class);
    }
   
}
