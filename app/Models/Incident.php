<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Incident extends Model
{
    public function plates()
    {
        return $this->belongsToMany(Plate::class);
    }

    public function violations()
    {
        return $this->belongsToMany(Violation::class);
    }

    public function videos()
    {
        return $this->hasMany(Video::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}