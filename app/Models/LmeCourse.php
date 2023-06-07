<?php

namespace App\Models;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class LmeCourse
{
    public static function getLmeCourse()
    {

        return Cache::remember("lmeCourse", 60*60*24, function(){

            $endpoint = 'latest';
            $access_key = 'ta8t7ubsse17n70h3s35uh31b209ldlj31btt8hu5wq503565i8fp9509215';
            $response = Http::get('https://metals-api.com/api/'. $endpoint .'?access_key='.$access_key.'');

            if ($response->status() !== 200) {
                return '0.00';
            }

            $lmeCourse = $response->json('rates', '0.00');

            if (empty($lmeCourse)) {
                return '0.00';
            }

            return $lmeCourse;
        });
    }
}
