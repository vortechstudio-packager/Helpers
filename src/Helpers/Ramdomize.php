<?php

namespace Vortechstudio\Helpers\Helpers;

use Illuminate\Support\Str;

trait Ramdomize
{
    public function randomColor()
    {
        $color = collect(['primary', 'secondary', 'success', 'info', 'warning', 'danger', 'dark', 'light']);

        return $color->random();
    }

    public function ramdomStringAlpha(int $length = 10, bool $upper = false): string
    {
        $chars = 'abcdefghijklmnopqrstuvwxyz';
        $size = strlen($chars);
        $rand_str = '';
        for ($x = 0; $x < $length; $x++) {
            $rand_str .= $chars[random_int(0, $size - 1)];
        }

        if ($upper) {
            return Str::upper($rand_str);
        } else {
            return $rand_str;
        }
    }

    public function randomNumerique(int $length = 10): string
    {
        $chars = '0123456789';
        $var_size = strlen($chars);
        $random_str = '';
        for ($x = 0; $x < $length; $x++) {
            $random_str .= $chars[random_int(0, $var_size - 1)];
        }

        return $random_str;
    }

    public function randomFloat(int $st_num = 0, int $end_num = 1, int $mul = 1000000): float|bool|int
    {
        if ($st_num > $end_num) {
            return false;
        }

        return mt_rand($st_num * $mul, $end_num * $mul) / $mul;
    }
}
