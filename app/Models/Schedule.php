<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    protected $appends = ['schedule'];


    public function date(){
        return $this->belongsTo(Date::class);
    }

    public function getScheduleAttribute()
    {
        return "{$this->start} - {$this->end}";
    }

}
