<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SliderCategory extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function Sliders()
    {
    	return $this -> belongsToMany('App\Models\Slider');
    }
}
