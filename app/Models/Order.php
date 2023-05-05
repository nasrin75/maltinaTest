<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'product_id',
        'option_id',
        'price',
    ];

    public static $statusMap = [
        0 => 'waiting',
        1 => 'preparation',
        2 => 'ready',
        3 => 'delivered',
        4 => 'canceled', // I add this option because when cancel order need it to separate this orders
    ];

    public function getStatusAttribute()
    {
        return Arr::get(self::$statusMap, $this->attributes['status'], 'waiting');
    }

    public static function getStatusIdByName($name)
    {
        return Arr::get(array_flip(self::$statusMap), $name, $name);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
