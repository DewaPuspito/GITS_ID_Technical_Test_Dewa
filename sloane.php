<?php
function sloaneOEIS($n) {
    $sequence = [];          // array untuk mengumpulkan item
    $current = 1;            // item pertama adalah 1
    $sequence[] = $current;  // tambahkan item pertama ke array

    for ($i = 1; $i < $n; $i++) {
        $current += $i;      // hitung item berikutnya
        $sequence[] = $current; // lalu masukkan ke array
    }

    return implode('-', $sequence); // penggabungan dengan tanda '-'
}

$input = 7;
echo sloaneOEIS($input);
?>