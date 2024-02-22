<?php

namespace Vortechstudio\Helpers\Helpers;

use Illuminate\Support\Str;

trait Generator
{
    public function password(int $length = 10): string
    {
        $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789&-_';
        $var_size = strlen($chars);
        $random_str = '';
        for ($x = 0; $x < $length; $x++) {
            $random_str .= $chars[random_int(0, $var_size - 1)];
        }

        return $random_str;
    }

    public function reference(int $length = 8)
    {
        return Str::upper(Str::random($length));
    }

    public function float(float|int $min, float|int $max): float|int
    {
        return $min + random_int(0, 99) / mt_getrandmax() * ($max - $min);
    }
}
