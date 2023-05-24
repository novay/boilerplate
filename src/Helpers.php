<?php 

if (! function_exists('appName')) {
    function appName() {
        return env('APP_NAME') . ' v' . env('APP_VERSION');
    }
}

if (!function_exists('me')) {
    function me($guard = null) {
        if (!is_null($guard) && auth()->guard($guard)->check()) {
            return auth()->guard($guard)->user();
        } elseif (auth()->check()) {
            return auth()->user();
        }
        
        return false;
    }
}

if (! function_exists('generateNumber')) {
    function generateNumber($model) {
        $number = mt_rand(10000000, 99999999);
        if(numberExists($number, $model)):
            return generateNumber($model);
        endif;

        return $number;
    }
}

if (! function_exists('numberExists')) {
    function numberExists($number, $model) {
        return $model::where('id', $number)->exists();
    }
}

if (!function_exists('tanggal')) {
    function tanggal($date, $time=false) {
        $hari_array = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
        $bulan_array = [1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April', 5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus', 9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'];

        $hr = date('w', strtotime($date));
        $hari = $hari_array[$hr];
        $tanggal = date('j', strtotime($date));
        $bl = date('n', strtotime($date));
        $bulan = $bulan_array[$bl];
        $tahun = date('Y', strtotime($date));

        if($time):
            $jam = date('H:i:s', strtotime($date) + 60 * 60 * 8);

            return "$hari, $tanggal $bulan $tahun $jam";
        endif;

        return "$hari, $tanggal $bulan $tahun";
    }
}