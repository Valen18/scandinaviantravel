<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Image;
class Location extends Model
{
    use HasFactory;
    protected $fillable = ['name'];
    public function images()
    {
        return $this->morphToMany(Image::class, 'imageable');
    }

}
