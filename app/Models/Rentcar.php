<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Rentcar extends Model
{
    protected $fillable = [
        'author',
        'user_id',
        'car_id',
        'key',
        'event',
        'destination',
        'start_time',
        'finish_time',
    ];

    public static function generateRandomString($length)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';

        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }
}
