<?php
//perintah floyd warshall
if (empty($_GET['gedungfrom'])) {
  echo "Harap Pilih Lokasi Anda";
} else {
  $ckgedungfrom = mysqli_fetch_array(mysqli_query($connect, "SELECT * from tabel_gedung where id_gedung='$_GET[gedungfrom]'"));
  $lokasi1[$ckgedungfrom['id_gedung']] = $ckgedungfrom['nama_gedung'];

  echo "<table class='table table-condensed' style='text-align:center;margin-top:20px'>
      <hr>
				<div style='text-align:center'>Algortima Floyd Warshall</div>
			<hr>
			<thead>
			<tr style='font-size:16px'>
        <th style='text-align:center'>Pintu Keluar Utara</th>
        <th style='text-align:center'>Pintu Keluar BNI</th>
        <th style='text-align:center'>Pintu Keluar Selatan</th>
			</tr>
			</thead>
			<tbody style='font-size:14px'>
        <td>";

  // Gerbang Utara
  $data1 = mysqli_query($connect, "SELECT * from tabel_gedung ");
  while ($hasil1 = mysqli_fetch_array($data1)) {
    if ('GD-057' == $hasil1['id_gedung']) {
      # code...
    } else {
      $lokasi1[$hasil1['id_gedung']] = $hasil1['nama_gedung'];
    }
  }
  $ckgedungto1 = mysqli_fetch_array(mysqli_query($connect, "SELECT * from tabel_gedung where id_gedung='GD-057'"));
  $lokasi1[$ckgedungto1['id_gedung']] = $ckgedungto1['nama_gedung'];

  // Pembentukan Node Dan Graf Floyd warshall
  foreach ($lokasi1 as $key => $value) {
    $n1 = 0;
    foreach ($lokasi1 as $key1 => $value1) {
      $kode = $key1 . '<>' . $key;
      $kode1 = $key . '<>' . $key1;
      $dt1 = mysqli_fetch_array(mysqli_query($connect, "SELECT * from tabel_node where kode_gedung='$kode' or kode_gedung='$kode1'"));
      if (empty($dt1['jarak'])) {
        $dataf1 = 0;
        $graph1[$n1][] = 0;
      } else {
        $dataf1 = $dt1['jarak'];
        $graph1[$n1][] = $dt1['jarak'];
      }
      $n1++;
    }
    $nodes1[] = $value;
  }
  $jlss1 = count($lokasi1) - 1;
  $start_fw1 = microtime_float();
  include('fw.class.php');
  $fw1 = new FloydWarshall($graph1, $nodes1);
  $sp1 = $fw1->get_path(0, $jlss1);

  echo 'Rute Terdekat<br>Dari <strong>' . $lokasi1[$_GET['gedungfrom']] . '</strong> Ke <strong>' . $nodes1[$jlss1] . '</strong>';
  echo '<br><br>Dengan Jarak Tempuh<br>';
  $jl1 = count($sp1);
  $r1 = 1;
  $n1 = $fw1->get_distance(0, $jlss1);
  echo '<strong>' . (round($n1, 2)) . ' meter</strong>';

  echo "<br><br>Path<br>";
  foreach ($sp1 as $key1 => $value1) {
    $nama1 = $nodes1[$value1];
    $ck1 = mysqli_fetch_array(mysqli_query($connect, "SELECT * from tabel_gedung where nama_gedung='$nama1'"));
    echo '<strong>' . $nodes1[$value1] . '</strong>';
    if ($r1 == $jl1) { } else {
      echo ' &rarr; ';
    }
    $r1++;
  }
  // include('fw_example.php');
  $stop_fw1 = microtime_float();
  $time_fw1 = $stop_fw1 - $start_fw1;
  echo "<br><br>Waktu Eksekusi<br><strong>$time_fw1</strong> Detik\n</td>";


  // Gerbang Keluar BNI
  echo "<td>";
  $ckgedungfrom = mysqli_fetch_array(mysqli_query($connect, "SELECT * from tabel_gedung where id_gedung='$_GET[gedungfrom]'"));
  $lokasi2[$ckgedungfrom['id_gedung']] = $ckgedungfrom['nama_gedung'];

  $data2 = mysqli_query($connect, "SELECT * from tabel_gedung ");
  while ($hasil2 = mysqli_fetch_array($data2)) {
    if ('GD-058' == $hasil2['id_gedung']) { } else {
      $lokasi2[$hasil2['id_gedung']] = $hasil2['nama_gedung'];
    }
  }
  $ckgedungto2 = mysqli_fetch_array(mysqli_query($connect, "SELECT * from tabel_gedung where id_gedung='GD-058'"));
  $lokasi2[$ckgedungto2['id_gedung']] = $ckgedungto2['nama_gedung'];


  // Pembentukan Node Dan Graf Floyd warshall
  foreach ($lokasi2 as $key2 => $value2) {
    $n2 = 0;
    foreach ($lokasi2 as $key3 => $value3) {
      $kode2 = $key3 . '<>' . $key2;
      $kode3 = $key2 . '<>' . $key3;
      $dt2 = mysqli_fetch_array(mysqli_query($connect, "SELECT * from tabel_node where kode_gedung='$kode2' or kode_gedung='$kode3'"));
      if (empty($dt2['jarak'])) {
        $dataf2 = 0;
        $graph2[$n2][] = 0;
      } else {
        $dataf2 = $dt2['jarak'];
        $graph2[$n2][] = $dt2['jarak'];
      }
      $n2++;
    }
    $nodes2[] = $value2;
  }
  $jlss2 = count($lokasi2) - 1;
  $start_fw2 = microtime_float();
  $fw2 = new FloydWarshall($graph2, $nodes2);

  $sp2 = $fw2->get_path(0, $jlss2);

  echo 'Rute Terdekat<br>Dari <strong>' . $lokasi2[$_GET['gedungfrom']] . '</strong> Ke <strong>' . $nodes2[$jlss2] . '</strong>';
  echo '<br><br>Dengan Jarak Tempuh<br>';
  $jl2 = count($sp2);
  $r2 = 1;
  $n2 = $fw2->get_distance(0, $jlss2);
  echo '<strong>' . (round($n2, 2)) . ' meter</strong>';

  echo "<br><br>Path<br>";
  foreach ($sp2 as $key2 => $value2) {
    $nama2 = $nodes2[$value2];
    $ck2 = mysqli_fetch_array(mysqli_query($connect, "SELECT * from tabel_gedung where nama_gedung='$nama2'"));
    echo '<strong>' . $nodes2[$value2] . '</strong>';
    if ($r2 == $jl2) { } else {
      echo ' &rarr; ';
    }
    $r2++;
  }
  $stop_fw2 = microtime_float();
  $time_fw2 = $stop_fw2 - $start_fw2;
  echo "<br><br>Waktu Eksekusi<br><strong>$time_fw2</strong> Detik\n</td>";


  // Gerbang Keluar SELATAN
  echo "<td>";
  $ckgedungfrom = mysqli_fetch_array(mysqli_query($connect, "SELECT * from tabel_gedung where id_gedung='$_GET[gedungfrom]'"));
  $lokasi3[$ckgedungfrom['id_gedung']] = $ckgedungfrom['nama_gedung'];

  $data3 = mysqli_query($connect, "SELECT * from tabel_gedung ");
  while ($hasil3 = mysqli_fetch_array($data3)) {
    if ('GD-059' == $hasil3['id_gedung']) { } else {
      $lokasi3[$hasil3['id_gedung']] = $hasil3['nama_gedung'];
    }
  }
  $ckgedungto3 = mysqli_fetch_array(mysqli_query($connect, "SELECT * from tabel_gedung where id_gedung='GD-059'"));
  $lokasi3[$ckgedungto3['id_gedung']] = $ckgedungto3['nama_gedung'];


  // Pembentukan Node Dan Graf Floyd warshall
  foreach ($lokasi3 as $key4 => $value4) {
    $n3 = 0;
    foreach ($lokasi3 as $key5 => $value5) {
      $kode4 = $key5 . '<>' . $key4;
      $kode5 = $key4 . '<>' . $key5;
      $dt3 = mysqli_fetch_array(mysqli_query($connect, "SELECT * from tabel_node where kode_gedung='$kode4' or kode_gedung='$kode5'"));
      if (empty($dt3['jarak'])) {
        $dataf3 = 0;
        $graph3[$n3][] = 0;
      } else {
        $dataf3 = $dt3['jarak'];
        $graph3[$n3][] = $dt3['jarak'];
      }
      $n3++;
    }
    $nodes3[] = $value4;
  }
  $jlss3 = count($lokasi3) - 1;
  $start_fw3 = microtime_float();
  $fw3 = new FloydWarshall($graph3, $nodes3);

  $sp3 = $fw3->get_path(0, $jlss3);

  echo 'Rute Terdekat<br>Dari <strong>' . $lokasi3[$_GET['gedungfrom']] . '</strong> Ke <strong>' . $nodes3[$jlss3] . '</strong>';
  echo '<br><br>Dengan Jarak Tempuh<br>';
  $jl3 = count($sp3);
  $r3 = 1;
  $n3 = $fw3->get_distance(0, $jlss3);
  echo '<strong>' . (round($n3, 2)) . ' meter</strong>';

  echo "<br><br>Path<br>";
  foreach ($sp3 as $key3 => $value3) {
    $nama3 = $nodes3[$value3];
    $ck3 = mysqli_fetch_array(mysqli_query($connect, "SELECT * from tabel_gedung where nama_gedung='$nama3'"));
    echo '<strong>' . $nodes3[$value3] . '</strong>';
    if ($r3 == $jl3) { } else {
      echo ' &rarr; ';
    }
    $r3++;
  }
  $stop_fw3 = microtime_float();
  $time_fw3 = $stop_fw3 - $start_fw3;
  echo "<br><br>Waktu Eksekusi<br><strong>$time_fw3</strong> Detik\n</td></table>";
  if ($n1 < $n2 && $n1 < $n3) {
    // $tercepat = $n1;
    echo "<hr>
          <div style='text-align:center'>Jalur Evakuasi Tercepat ke <strong>Gerbang Utara</strong></div>
          <div style='text-align:center'>Dengan Jarak Tempuh <strong>" . (round($n1, 2)) . " meter</strong> </div>
        <hr>";
  } elseif ($n2 < $n1 && $n2 < $n3) {
    // $tercepat = $n2;
    echo "<hr>
          <div style='text-align:center'>Jalur Evakuasi Tercepat ke <strong>Gerbang BNI</strong></div>
          <div style='text-align:center'>Dengan Jarak Tempuh <strong>" . (round($n2, 2)) . " meter</strong> </div>
        <hr>";
  } elseif ($n3 < $n1 && $n3 < $n2) {
    // $tercepat = $n3;
    echo "<hr>
          <div style='text-align:center'>Jalur Evakuasi Tercepat ke <strong>Gerbang Selatan</strong></div>
          <div style='text-align:center'>Dengan Jarak Tempuh <strong>" . (round($n3, 2)) . " meter</strong> </div>
        <hr>";
  }
}
