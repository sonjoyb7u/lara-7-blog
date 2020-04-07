<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Post extends Model
{
    //
    protected $table = 'posts';

    protected $fillable = [
        'user_id', 'cat_id', 'title', 'desc', 'image', 'status',
    ];

    public function category() {
        return $this->belongsTo(Category::class, 'cat_id', 'id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'cat_id', 'id');

    }

}
