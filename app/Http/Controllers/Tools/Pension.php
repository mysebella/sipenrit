<?php

namespace App\Http\Controllers\Tools;

use App\Http\Controllers\Controller;
use Carbon\Carbon;

class Pension extends Controller
{

    protected static $perwira = [
        "Jenderal",
        "Letnan Jenderal",
        "Mayor Jenderal",
        "Brigadir Jenderal",
        "Kolonel",
        "Letnan Kolonel",
        "Mayor",
        "Kapten",
        "Letnan Satu",
        "Letnan Dua"
    ];

    protected static $bintara = [
        "Pembantu Letnan Satu",
        "Pembantu Letnan Dua",
        "Sersan Mayor",
        "Sersan Kepala",
        "Sersan Satu",
        "Sersan Dua",
        "Kopral Kepala",
        "Kopral Satu",
        "Kopral Dua",
        "Prajurit Kepala",
        "Prajurit Satu",
        "Prajurit Dua"
    ];

    public static function date($year, $pangkat)
    {
        foreach (self::$bintara as $bintara) {
            if ($bintara == $pangkat) {
                $pensionDate = $year + 53;
                return $pensionDate;
            }
        }

        foreach (self::$perwira as $perwira) {
            if ($perwira == $pangkat) {
                $pensionDate = $year + 58;
                return $pensionDate;
            }
        }
    }
}
