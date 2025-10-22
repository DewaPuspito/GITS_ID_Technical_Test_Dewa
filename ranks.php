<?php
function denseRanking($scores, $playerScores) {

    // Memastikan skor unik dan mengurutkannya
    $uniqueScores = array_values(array_unique($scores));
    
    $rankings = [];
    
    foreach ($playerScores as $score) {
        // Dimulai dari skor terendah
        $i = count($uniqueScores) - 1;
        // Mengurangi indeks jika skor pemain lebih besar atau sama dengan skor
        while ($i >= 0 && $score >= $uniqueScores[$i]) {
            $i--;
        }
        // Peringkat = posisi setelah indeks +1
        $rankings[] = $i + 2;
    }
    
    return $rankings;
}

// Contoh Input
$scores = [100, 100, 50, 40, 40, 20, 10];
$playerScores = [5, 25, 50, 120];

$result = denseRanking($scores, $playerScores);
echo implode(' ', $result);
?>
