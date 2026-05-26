<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'title',
        'description',
        'level',
        'gradient',
        'tag',
    ];

    public function sections()
    {
        return $this->hasMany(CourseSection::class)->orderBy('order');
    }

    public function files()
    {
        return $this->hasMany(CourseFile::class)->orderBy('order');
    }

    public function pdfs()
    {
        return $this->hasMany(CourseFile::class)->where('type', 'pdf')->orderBy('order');
    }

    public function images()
    {
        return $this->hasMany(CourseFile::class)->where('type', 'image')->orderBy('order');
    }

    public function videos()
    {
        return $this->hasMany(CourseFile::class)->where('type', 'video_url')->orderBy('order');
    }
}
