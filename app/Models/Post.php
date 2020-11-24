<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function categoris()
    {
    	return $this -> belongsToMany('App\Models\Category');
    }

    public function Author()
    {
    	return $this -> belongsTo('App\Models\User');
    }
}
