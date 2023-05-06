<?php 

if (! function_exists('app_name')) {
    function app_name() {
        return env('APP_NAME') . ' v' . env('APP_VERSION');
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

if(!function_exists('tanggal')) {
    function tanggal($waktu) {
        $hari_array = [
            'Minggu',
            'Senin',
            'Selasa',
            'Rabu',
            'Kamis',
            'Jumat',
            'Sabtu'
        ];

        $hr = date('w', strtotime($waktu));
        $hari = $hari_array[$hr];
        $tanggal = date('j', strtotime($waktu));
        $bulan_array = array(
            1 => 'Januari',
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember',
        );
        $bl = date('n', strtotime($waktu));
        $bulan = $bulan_array[$bl];
        $tahun = date('Y', strtotime($waktu));
        $jam = date('H:i:s', strtotime($waktu)+60*60*8);

        return "$hari, $tanggal $bulan $tahun";
    }
}