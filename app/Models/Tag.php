<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Tag extends Model
{
    //
    use HasFactory;
    use HasUuids; // this trait will automatically generate UUIDs for the model
    protected $table = 'tags';
    protected $primaryKey = 'id';
    //protected $keyType = 'int';
    protected $keyType = 'string';

    //public $incrementing = true;
    public $incrementing = false;
    protected $fillable = ['title'];
    protected $guarded = ['id'];



    public function posts()
    {
        return $this->belongsToMany(Post::class, 'post_tag', 'tag_id', 'post_id', 'id', 'id')->withTimestamps();
        ;
    }


}
