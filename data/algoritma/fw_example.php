<?php


include('fw.class.php');
$fw1 = new FloydWarshall($graph1, $nodes1);

$sp = $fw1->get_path(0, $jlss1);

echo 'Rute Terdekat<br>Dari <strong>' . $lokasi[$_GET['gedungfrom']] . '</strong> Ke <strong>' . $nodes1[$jlss1] . '</strong>';
echo '<br><br>Dengan Jarak Tempuh<br>';
$jl = count($sp);
$r = 1;
$n = $fw1->get_distance(0, $jlss);
echo '<strong>' . (round($n, 2)) . ' meter</strong>';

echo "<br><br>Path<br>";
foreach ($sp as $key => $value) {
    $nama = $nodes1[$value];
    $ck = mysqli_fetch_array(mysqli_query($connect, "SELECT * from tabel_gedung where nama_gedung='$nama'"));
    echo '<strong>' . $nodes1[$value] . '</strong>';
    if ($r == $jl) { } else {
        echo ' &rarr; ';
    }
    $r++;
}
