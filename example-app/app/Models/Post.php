<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Photo;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $table = 'posts';

    protected $fillable = [
      'title',
      'content',
      'is_admin'
    ];

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public function photos() {
        return $this->morphMany(Photo::class, 'imageable');
    }
}
