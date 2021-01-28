<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['title','description','slug','url_picture','articlescategs_id'];

    public function setNameAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function articlescategs(){
        return $this->belongsTo('App\Models\Articlescateg');
    }

    public function tags(){
        return $this->belongsToMany('App\Models\Tag');
    }
}
