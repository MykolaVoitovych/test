<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'text'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function mismatch(User $user)
    {
        if ($this->trashed()) {
            return null;
        }
        return !!$this->users->firstWhere('id', $user->id);
    }
}
