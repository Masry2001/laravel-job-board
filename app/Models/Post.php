<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    use HasFactory;

    use HasUuids; // this trait will automatically generate UUIDs for the model
    protected $table = 'posts';
    protected $primaryKey = 'id';
    //protected $keyType = 'int';
    protected $keyType = 'string';

    //public $incrementing = true;
    public $incrementing = false;

    // UUID => string, incrementing = false,

    protected $fillable = [
        'title',
        'body',
        'author',
        'published',
    ];

    protected $guarded = [
        'id',
    ];




    public function comments()
    {
        return $this->hasMany(Comment::class, 'post_id', 'id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post_tag', 'post_id', 'tag_id', 'id', 'id')->withTimestamps();
    }
}
