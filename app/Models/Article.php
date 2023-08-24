<?php

namespace App\Models;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;
    protected $fillable=['image_name','image_id','article_id'];
    public function images(){
        return $this->hasMany(Image::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
}
