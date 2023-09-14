<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $fillable = ['alt', 'name', 'url'];
    
    public function cars(){
        return $this->morphedByManu(Car::class, 'imageable');
    }
    public function authors(){
        return $this->morphedByManu(Author::class, 'imageable');
    }
    public function locations(){
        return $this->morphedByManu(Location::class, 'imageable');
    }
    public function posts(){
        return $this->morphedByManu(Post::class, 'imageable');
    }
}
