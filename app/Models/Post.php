<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Image;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['slug', 'title'];
    public function images()
    {
        return $this->morphToMany(Image::class, 'imageable');
    }

}
