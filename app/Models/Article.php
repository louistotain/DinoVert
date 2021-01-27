<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['title','description','slug','url_picture','articlescategs_id'];

    public function articlescategs(){
        return $this->belongsTo('App\Models\Articlescateg');
    }

    public function tags(){
        return $this->belongsToMany('App\Models\Tag');
    }
}
