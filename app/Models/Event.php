<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['title',  'description', 'body', 'slug', 'start_event'];

    protected $dates = ['start_event'];

    public function photos()
    {
        return $this->hasMany(Photo::class); //event_id
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
