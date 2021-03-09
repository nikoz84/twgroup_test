<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class Comment extends Model
{
    use HasFactory;

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function scopeSearchByTerm($query, $term)
    {
        if (!$query) {
            return;
        }
        return $query->where('content', 'like', "%?%", $term);
    }

    public function scopeUserHasComment($query, $user_id, $publication_id)
    {
        if(!$query) {
            return;
        }

        return $this->select(DB::raw('count(*) as total'))
            ->where('publication_id', $publication_id)
            ->where('user_id', $user_id);
    }
}
