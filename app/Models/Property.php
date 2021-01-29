<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = ['price','location','m²','pieces','state','year_construction',
                           'description','propertiescategs_id'];


    public function propertiescategs(){
        return $this->belongsTo('App\Models\Propertiescateg');
    }

    public function pictures(){
        return $this->belongsToMany('App\Models\Picture');
    }

}
