<?php


include('fw.class.php');

// $graph = array(array(0,50 ,200),
//                array(50,0,50),
//                array(50,0,50));
//               array(6,1,1,0));
//               array(0,0,10,0,0,4),
//               array(0,0,17,20,0,0));
//$nodes = array("a", "b", "c", "d");
//print_r($graph);
$fw = new FloydWarshall($graph, $nodes);
//$fw->print_path(0,2);
// echo "<br>";
if (empty($_GET['kode'])) {
    // $fw->print_graph();
    // $fw->print_dist();
    // $fw->print_pred();
}


$sp = $fw->get_path(0, $jlss);

$n = $fw->get_distance(0, $jlss);
echo 'Rute Terdekat Dari <strong>' . $lokasi[$_GET['gedungfrom']] . '</strong> Ke <strong>' . $nodes[$jlss] . '</strong> Adalah: <strong>' . (round($n, 2)) . '</strong> meter <strong>';
$jl = count($sp);
$r = 1;
echo "
    <section class=timeline>
      <ul>";
foreach ($sp as $key => $value) {
    $nama = $nodes[$value];
    $ck = mysqli_fetch_array(mysqli_query($connect, "SELECT * from tabel_gedung where nama_gedung='$nama'"));
    // echo "<li>
    //         <div class='content'>
    //             <h2>
    //                 <time>
    // $nodes[$value]</time>
    //             </h2>
    //             <p>$ck[keterangan]</p>
    //         </div>";
    echo $nodes[$value];
    if ($r == $jl) { } else {
        echo ' => ';
    }
    $r++;
}

echo '</ul></section>';

    
    //echo " km</strong>";
