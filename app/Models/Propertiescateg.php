<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Propertiescateg extends Model
{
    use HasFactory;

    protected $fillable = ['name','slug'];

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function properties(){
        return $this->HasMany('App\Models\Property');
    }
}
