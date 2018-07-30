<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public function category()
    {
        return $this->belongsTo('\App\Category');
    }
}


//Rinaldi Sudrajat:
//https://www.udemy.com/flutters-beginners-course/?couponCode=VOIDREALMS1000
//
//https://www.udemy.com/flutter-intermediate/?couponCode=VOIDREALMS1000
//
//https://www.udemy.com/flutter-advanced-course/?couponCode=VOIDREALMS1000
