<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Product extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name',
        'custom_option',
        'price', // every product has same price
    ];
    public static $customOptionMap = [
        1 => 'size',
        2 => 'milk',
        3 => 'shots',
        4 => 'kind',
        5 => 'location',
        6 => 'normal',
    ];

    public function getCustomOptionAttribute()
    {
        if (empty($this->attributes['custom_option'])) {
            return 'normal';
        }
        return Arr::get(self::$customOptionMap, $this->attributes['custom_option'], 'size');
    }

    public static function getCustomOptionIdByName($name)
    {
        return Arr::get(array_flip(self::$customOptionMap), $name, $name);
    }
    public function setCustomOptionAttribute($value)
    {
        $this->attributes['custom_option'] = self::getCustomOptionIdByName($value);
    }

    public static function getCustomOptionNameByID($id)
    {
        return Arr::get(self::$customOptionMap, $id, $id);
    }

    //  product list
    //id= 1 name = Latte
    // id= 2 name =Cappuccino
    //id= 3 name = Espresso
    // id= 4 name =Tea
    //id= 5 name = Hot chocolate
    //id= 6 name = Cookie
    //id= 7 name = All
}
