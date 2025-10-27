<?php
function highestPalindrome($s, $k) {
    $chars = str_split($s); // Pecah string menjadi array karakter
    $n = strlen($s);

     // Validasi khusus untuk string dengan panjang 1
    if ($n == 1) {
        return "-1";  // String dengan panjang 1 tidak perlu diubah
    }

    // Buat string menjadi palindrome dengan jumlah perubahan minimum
    $changes = array_fill(0, $n, 0);
    for ($left = 0, $right = $n - 1; $left < $right; $left++, $right--) {
        if ($chars[$left] != $chars[$right]) {
            $bigger = max($chars[$left], $chars[$right]);
            $chars[$left] = $bigger;
            $chars[$right] = $bigger;
            $changes[$left] = 1;
            $k--;
        }
    }
    // Tingkatkan palindrome menjadi angka terbesar
    for ($left = 0, $right = $n - 1; $left <= $right; $left++, $right--) {
        if ($left == $right) { // Karakter di tengah (untuk string dengan panjang ganjil
            if ($k > 0) {
                $chars[$left] = '9';
                $k--;
            }
        } else {
            if ($chars[$left] != '9') {
                // Jika salah satu karakter sudah diubah sebelumnya, hanya butuh 1 langkah
                if ($changes[$left] == 1 && $k > 0) {
                    $chars[$left] = '9';
                    $chars[$right] = '9';
                    $k--;
                }
                // Jika belum diubah, butuh 2 langkah
                elseif ($changes[$left] == 0 && $k >= 2) {
                    $chars[$left] = '9';
                    $chars[$right] = '9';
                    $k -= 2;
                }
            }
        }
    }

    // Validasi apakah string hasil adalah palindrome dan valid
    if (!isPalindrome($chars) || $k < 0) {
        return "-1";
    }

    return implode("", $chars);
}

// Fungsi untuk memeriksa apakah array karakter adalah palindrome
function isPalindrome($chars) {
    $n = count($chars);
    for ($i = 0; $i < $n / 2; $i++) {
        if ($chars[$i] != $chars[$n - $i - 1]) {
            return false;
        }
    }
    return true;
}

echo highestPalindrome("3943", 1) . "\n";
echo highestPalindrome("932239", 2) . "\n";
?>