<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Support\Str;

class Publication extends Model
{
    use HasFactory;

    protected $casts = [
        'created_at' => 'datetime:d-m-Y'
    ];
    /** owner user */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    /** get the comments of the publication with status APROVADO */
    public function comments()
    {
        return $this->hasMany(Comment::class, 'publication_id', 'id')
        ->where('status', 'APROVADO');
    }

    public function getExcerptAttribute()
    {
        return strip_tags(Str::words($this->content, 30));
    }
}
