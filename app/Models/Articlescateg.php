<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articlescateg extends Model
{
    use HasFactory;

    protected $fillable = ['name','slug'];

    public function articles(){
        return $this->HasMany('App\Models\Articles');
    }
}
