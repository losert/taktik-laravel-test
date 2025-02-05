<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['title', 'description', 'completed'];

    // One-to-Many: Task má mnoho komentářů
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // Many-to-Many: Task má mnoho tagů
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    // Polymorfní vztah: Task může mít přílohy
    public function attachments()
    {
        return $this->morphMany(Attachment::class, 'attachable');
    }
}
