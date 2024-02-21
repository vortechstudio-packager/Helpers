<?php

namespace Vortechstudio\Helpers\Helpers;

use Carbon\Carbon;
use Illuminate\Support\Str;

trait Format
{
    public function eur(string $value): string
    {
        return number_format($value, 2, ',', ' ') . " €";
    }

    public function size(int $bytes): string
    {
        $kb = 1024;
        $mb = $kb * 1024;
        $gb = $mb * 1024;
        $tb = $gb * 1024;

        if (($bytes >= 0) && ($bytes < $kb)) {
            return $bytes . ' B';

        } elseif (($bytes >= $kb) && ($bytes < $mb)) {
            return ceil($bytes / $kb) . ' KB';

        } elseif (($bytes >= $mb) && ($bytes < $gb)) {
            return ceil($bytes / $mb) . ' MB';

        } elseif (($bytes >= $gb) && ($bytes < $tb)) {
            return ceil($bytes / $gb) . ' GB';

        } elseif ($bytes >= $tb) {
            return ceil($bytes / $tb) . ' TB';
        } else {
            return $bytes . ' B';
        }
    }

    public function dateFrench($date, $hours = false): string
    {
        if($hours) {
            return Carbon::createFromTimestamp(strtotime($date))->isoFormat('LLLL');
        } else {
            return Carbon::createFromTimestamp(strtotime($date))->isoFormat('LL');
        }
    }

    public function isoToEmoji(string $code): string
    {
        return implode(
            '',
            array_map(
                fn ($letter) => mb_chr(ord($letter) % 32 + 0x1F1E5),
                str_split($code)
            )
        );
    }

    public function textForSlugify(string $string): string
    {
        $firstLetter = Str::substr($string, 0, 1);
        if ($firstLetter == 'a' || $firstLetter == 'e' || $firstLetter == 'i' || $firstLetter == 'o' || $firstLetter == 'u' || $firstLetter == 'y' || $firstLetter == 'A' || $firstLetter == 'E' || $firstLetter == 'I' || $firstLetter == 'O' || $firstLetter == 'U' || $firstLetter == 'Y') {
            return 'd\''.$string;
        } else {
            return 'de '.$string;
        }
    }

    public function minToHours(string $minutes): string
    {
        $hours = floor($minutes / 60);
        $min = $minutes - ($hours * 60);

        return \Carbon\Carbon::createFromTimeString($hours.':'.$min.':00')->format('H:i');
    }

    public function hoursToMinutes(string $hours): string
    {
        return floor($hours * 60);
    }
}
