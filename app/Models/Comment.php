<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;
use App\Models\User;

class Comment extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'text',
    ];
   
    //Relations
    // One Comment - One User
    public function user() 
    {
        return $this->belongsTo(User::class);
    }
    // One comments - One Post 
    public function post() 
    {
        return $this->belongsTo(Post::class);
    }
    
}
