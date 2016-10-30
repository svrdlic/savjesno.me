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

    public function uploads()
    {
        return $this->hasMany(Upload::class);
    }

    public function getFirstImageUrl()
    {
        $image = $this->uploads()->where('is_video', 0)->first();

        return $image->storage_filename;
    }

    public function countImages()
    {
        return $this->uploads()->where('is_video', 0)->count();

    }
}