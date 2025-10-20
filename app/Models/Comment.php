<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Comment extends Model
{
    use HasFactory;
    use HasUuids; // this trait will automatically generate UUIDs for the model
    protected $table = 'comments';

    protected $primaryKey = 'id';
    //protected $keyType = 'int';
    protected $keyType = 'string';

    //public $incrementing = true;
    public $incrementing = false;
    protected $fillable = ['post_id', 'author', 'content'];
    protected $guarded = ['id'];

    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id', 'id');
    }
}
