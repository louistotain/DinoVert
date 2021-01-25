<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Propertiescateg extends Model
{
    use HasFactory;

    protected $fillable = ['name','slug'];

    public function properties(){
        return $this->HasMany('App\Models\Property');
    }
}
