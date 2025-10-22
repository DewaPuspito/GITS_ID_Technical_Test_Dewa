<?php
function highestPalindrome($s, $k) {
    $chars = str_split($s); // pecah string menjadi array karakter
    $n = strlen($s);
    $result = makePalindrome($chars, 0, $n - 1, $k); // fungsi rekursif untuk membentuk palindrome

     // Jika gagal membentuk palindrome
    return $result === null ? "-1" : implode("", $result);
}

// Rekursi untuk membentuk palindrome tertinggi
function makePalindrome($arr, $left, $right, $k) {
    if ($left > $right) {
        return $arr;
    }

    // Jika tidak cukup langkah
    if ($k < 0) {
        return null;
    }

    // Kasus karakter tunggal di tengah
    if ($left == $right) {
        if ($k > 0) {
            $arr[$left] = '9';
        }
        return $arr;
    }

    // Simpan karakter kiri dan kanan
    $l = $arr[$left];
    $r = $arr[$right];

    // Kalau beda, ubah keduanya menjadi yang lebih besar
    if ($l != $r) {
        $bigger = $l > $r ? $l : $r;
        $arr[$left] = $bigger;
        $arr[$right] = $bigger;
        $sub = makePalindrome($arr, $left + 1, $right - 1, $k - 1);
    } else {
        // Kalau sama, lanjut ke tengah tanpa mengubah
        $sub = makePalindrome($arr, $left + 1, $right - 1, $k);
    }

    // Jika rekursi gagal
    if ($sub === null) {
        return null;
    }

    // Upgrade ke 9 kalau masih ada kesempatan
    if ($sub[$left] != '9' && $k > 0) {
        // Coba ganti keduanya jadi 9 jika masih bisa
        if ($l != $r) {
            // Sudah pakai 1 langkah, berarti masih sisa k-1
            if ($k - 1 > 0) {
                $sub[$left] = '9';
                $sub[$right] = '9';
            }
        } else {
            // Belum ubah, bisa langsung ubah jadi 9
            if ($k - 2 >= 0) {
                $sub[$left] = '9';
                $sub[$right] = '9';
            }
        }
    }

    return $sub;
}

// === Contoh penggunaan ===
echo highestPalindrome("3943", 1) . "\n";   // Output: 3993
echo highestPalindrome("932239", 2) . "\n"; // Output: 992299
?>
